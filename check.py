import PyPDF2
pdf_path = 'IFSC_77003_Data_Science/Data Science Project, Report, and Three Minute Summary/Knowledge_Transfer_in_Product_.pdf'
md_path = 'IFSC_77003_Data_Science/Data Science Project, Report, and Three Minute Summary/Knowledge_Transfer_in_Product_.md'

try:
    with open(pdf_path, 'rb') as f:
        r = PyPDF2.PdfReader(f)
        pdf_text = ''
        for p in r.pages: pdf_text += p.extract_text() + '\n'
    print(f'PDF: {len(pdf_text.split())} words, {len(pdf_text)} chars')
except Exception as e: print('PDF Error:', e)

try:
    with open(md_path, 'r', encoding='utf-8') as f:
        md_text = f.read()
    print(f'MD: {len(md_text.split())} words, {len(md_text)} chars')
except Exception as e: print('MD Error:', e)
