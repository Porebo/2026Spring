import PyPDF2
import ollama
import tkinter as tk
from tkinter import filedialog, messagebox
import os
import threading
import logging
import traceback

# Setup logging
log_file_path = os.path.join(os.path.dirname(os.path.abspath(__file__)), 'app.log')
logging.basicConfig(
    filename=log_file_path,
    level=logging.DEBUG,
    format='%(asctime)s - %(levelname)s - %(message)s'
)

def extract_text_from_pdf(pdf_path):
    text = ""
    with open(pdf_path, 'rb') as file:
        reader = PyPDF2.PdfReader(file)
        for page in reader.pages:
            page_text = page.extract_text()
            if page_text:
                text += page_text + "\n"
    return text

def chunk_text(text, chunk_size=3000):
    return [text[i:i+chunk_size] for i in range(0, len(text), chunk_size)]

def summarize_text(text, status_callback=None):
    chunks = chunk_text(text)
    summaries = []

    for i, chunk in enumerate(chunks):
        if status_callback:
            status_callback(f"Status: Summarizing chunk {i+1}/{len(chunks)}...")
            
        logging.info(f"Sending chunk {i+1}/{len(chunks)} to model for summarization...")
        try:
            response = ollama.chat(
                model='phi3',
                messages=[{
                    'role': 'user',
                    'content': f"""You are an expert analyst.

Analyze the following text and produce a structured summary:

1. Main Purpose
2. Key Concepts
3. Important Details
4. Conclusions
5. Practical Implications (if any)

Be specific. Avoid generic statements.

Text:
{chunk}"""
                }]
            )
            summaries.append(response['message']['content'])
        except Exception as e:
            error_msg = f"Failed to summarize chunk {i+1}: {e}\n{traceback.format_exc()}"
            logging.error(error_msg)
            raise Exception(f"Summarization failed on chunk {i+1}. Please check app.log for details.\nOriginal error: {e}")

    if status_callback:
        status_callback("Status: Generating final summary...")

    combined = "\n\n".join(summaries)
    
    logging.info("Generating final structured summary...")
    try:
        final_response = ollama.chat(
            model='phi3',
            messages=[{
                'role': 'user',
                'content': f"""You are an expert analyst.

Take the following section summaries and produce a high-quality structured summary:

- Main Purpose
- Key Concepts
- Important Details
- Conclusions
- Practical Implications

Be specific and avoid generic statements.

Text:
{combined}"""
            }]
        )
        logging.info("Final summarization successful.")
        return final_response['message']['content']
    except Exception as e:
        error_msg = f"Failed to generate final summary: {e}\n{traceback.format_exc()}"
        logging.error(error_msg)
        raise Exception(f"Final summarization failed. Please check app.log for details.\nOriginal error: {e}")

class PDFSummarizerApp:
    def __init__(self, root):
        self.root = root
        self.root.title("Local PDF Summarizer")
        self.root.geometry("600x400")

        self.selected_files = []

        # UI Elements
        self.btn_select = tk.Button(root, text="Select PDF Files", command=self.select_files)
        self.btn_select.pack(pady=10)

        self.listbox_files = tk.Listbox(root, selectmode=tk.MULTIPLE, width=80, height=10)
        self.listbox_files.pack(pady=10)

        self.btn_process = tk.Button(root, text="Process", command=self.start_processing, state=tk.DISABLED)
        self.btn_process.pack(pady=10)

        self.status_label = tk.Label(root, text="Status: Waiting for files...")
        self.status_label.pack(pady=10)

    def select_files(self):
        file_paths = filedialog.askopenfilenames(
            title="Select PDF Files",
            filetypes=[("PDF Files", "*.pdf")]
        )
        if file_paths:
            self.selected_files = list(file_paths)
            self.listbox_files.delete(0, tk.END)
            for file_path in self.selected_files:
                self.listbox_files.insert(tk.END, file_path)
            self.btn_process.config(state=tk.NORMAL)
            self.status_label.config(text=f"Status: {len(self.selected_files)} file(s) selected.")

    def start_processing(self):
        self.btn_process.config(state=tk.DISABLED)
        self.btn_select.config(state=tk.DISABLED)
        self.status_label.config(text="Status: Processing...")
        
        # Run processing in a separate thread to keep GUI responsive
        threading.Thread(target=self.process_files, daemon=True).start()

    def process_files(self):
        try:
            for i, pdf_path in enumerate(self.selected_files):
                self.root.after(0, self.status_label.config, {'text': f"Status: Processing {i+1}/{len(self.selected_files)} - {os.path.basename(pdf_path)}..."})
                
                # Extract text
                raw_text = extract_text_from_pdf(pdf_path)
                
                if not raw_text.strip():
                    continue

                # Summarize
                def update_status(msg):
                    self.root.after(0, self.status_label.config, {'text': msg})
                
                summary = summarize_text(raw_text, status_callback=update_status)
                
                # Save to .md
                base_path, _ = os.path.splitext(pdf_path)
                md_path = f"{base_path}.md"
                
                with open(md_path, "w", encoding="utf-8") as md_file:
                    md_file.write(f"# Summary of {os.path.basename(pdf_path)}\n\n")
                    md_file.write(summary)
            
            self.root.after(0, self.status_label.config, {'text': "Status: Processing complete!"})
            logging.info("All files successfully processed.")
            self.root.after(0, messagebox.showinfo, "Success", "All files have been successfully processed and summaries saved.")
        except Exception as e:
            error_msg = f"Global Error: {e}\n{traceback.format_exc()}"
            logging.error(error_msg)
            self.root.after(0, self.status_label.config, {'text': "Status: Error occurred. Check app.log."})
            self.root.after(0, messagebox.showerror, "Error", str(e))
        finally:
            self.root.after(0, self.btn_process.config, {'state': tk.NORMAL})
            self.root.after(0, self.btn_select.config, {'state': tk.NORMAL})

if __name__ == "__main__":
    try:
        logging.info("Pulling model 'phi3' at startup...")
        ollama.pull('phi3')
        logging.info("Model pull successful or already exists.")
    except Exception as e:
        logging.error(f"Model pull failed: {e}")
        print(f"Model pull failed: {e}")

    root = tk.Tk()
    app = PDFSummarizerApp(root)
    root.mainloop()
