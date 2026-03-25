# March 17, 2026 Lecture Summary
**Course:** IFSC 77003 - Data Science & Technologies  
**Instructor:** Dr. Elizabeth Pierce  
**Session Focus:** AI, deep learning, large language models, embeddings, and prompt engineering

## Administrative Reminders
- Students planning to graduate this spring were reminded to submit the Workday Student program completion request by **Friday, March 20 at 5:00 PM**.
- The Research and Creative Works Expo registration deadline and mentoring nomination deadline were both highlighted as near-term opportunities.
- Scholarship opportunities were discussed, and Dr. Pierce clarified that having a graduate assistantship does not prevent students from applying for additional funding.
- Students who are not receiving the weekly "Five Things to Know This Week" message were told to contact Erin Flowers to be added to the relevant Google groups.

## Key Takeaways
- The lecture positioned large language models inside a broader hierarchy: data science overlaps with AI, AI contains machine learning, and deep learning extends neural-network approaches for more complex pattern detection.
- Simple machine learning models can solve some classification tasks, but nonlinear boundaries and high-dimensional inputs often require neural networks and, eventually, deep learning.
- Large language models operate by predicting the next word in a sequence, but strong performance depends on massive training corpora, transformer architectures, and fine-tuning methods.
- Embeddings convert words and other objects into numeric vectors so machine learning systems can reason about meaning, similarity, and context.
- Prompt quality matters: zero-shot, few-shot, and chain-of-thought prompting can materially improve LLM outputs.

## Major Lecture Sections
### 1. AI, Data Science, and Deep Learning Context
- Dr. Pierce connected data science, intelligent machines, AI, machine learning, deep learning, and large language models as overlapping but distinct concepts.
- She emphasized that as patterns become more subtle and complex, analysts often need more sophisticated models than simple clustering, decision trees, or linear regression.

### 2. Music Classification as a Modeling Example
- A music example used tempo and energy to classify songs such as reggae versus R&B.
- The example showed how a simple linear boundary can work for some tasks, but a nonlinear boundary may separate the classes better.
- This served as a bridge from traditional machine learning methods to neural networks when the input space or class structure becomes more complicated.

### 3. Neural Networks and Deep Learning
- The lecture compared simple neural networks with deep learning networks that contain many hidden layers.
- Deep learning was framed as a breakthrough that allows neural networks to capture more complicated relationships and larger numbers of inputs.
- Dr. Pierce noted that by 2023, ChatGPT was already described as relying on an extremely large neural network, reinforcing how much scale matters.

### 4. Images, Text, and Classification
- For image tasks, the lecture described converting images into pixels and using neural-network architectures to classify objects such as cats, foxes, or tigers.
- For text tasks, the lecture returned to sentiment analysis and described how words in a sentence can be converted into numeric representations, then passed through a neural network to predict positive or negative sentiment.
- Language complexity, including sarcasm, ambiguity, and multiple meanings for the same word, was used to explain why text modeling is difficult.

### 5. Large Language Models and GPT
- Large language models were described as systems trained to predict the next word in a sequence.
- GPT was unpacked as **Generative Pre-Trained Transformer**:
  - **Generative** because the system generates likely next-word continuations.
  - **Pre-trained** because it learns from massive text corpora before later fine-tuning.
  - **Transformer** because the architecture builds on the transformer breakthrough introduced by Google in 2017.
- The lecture also discussed later alignment steps such as instruction fine-tuning and reinforcement learning from human feedback.

### 6. Limitations, Currency, and Legal Issues
- Dr. Pierce explained that LLMs can sound convincing even when they are wrong because they are trained to generate plausible human-like text, not guaranteed truth.
- One reason for outdated responses is that a model may take a long time to train, so current events may not be reflected in the finished version.
- Search-augmented systems such as Bing Chat were used to illustrate how current web search results can be combined with an LLM to ground answers in fresher information.
- The lecture referenced the new lawsuit by Encyclopedia Britannica and Merriam-Webster against OpenAI over alleged use of articles and dictionary entries for training data without permission.

### 7. Prompt Engineering and Embeddings
- Zero-shot prompting, few-shot prompting, and chain-of-thought prompting were presented as practical techniques for improving model responses.
- Students were encouraged to think of better prompts as a way of giving the model examples, structure, and stepwise reasoning support.
- A separate reading on embeddings explained how words, genres, and other attributes can be converted into numeric vectors.
- One-hot encoding was used as a simple starting point, but richer embeddings were emphasized because they better preserve relationships and context.

### 8. Enterprise Uses of LLMs
- Practical uses discussed included assistance with clinical writeups, cybersecurity policy mapping, claim processing, customer service, troubleshooting, market research, internal knowledge bases, scientific literature curation, brainstorming, and test-data generation.
- The lecture framed these tools as assistants that can improve productivity, not as systems that should be trusted uncritically.

## Tools, Sites, and Concepts Mentioned
- Large language models, GPT, transformers, reinforcement learning from human feedback
- Neural networks, deep learning, CNNs, RNNs
- Embeddings, one-hot encoding, vector representations
- Bing Chat, web search grounding, prompt engineering
- Encyclopedia Britannica, Merriam-Webster, OpenAI lawsuit

## Next Steps
1. Students graduating this spring should submit the program completion request by March 20 at 5:00 PM.
2. Review the assigned readings and videos on LLMs, transformers, and embeddings.
3. Prepare for the next class discussion on student use of AI, agentic AI versus generative AI, AGI, and the ethical dilemmas surrounding enterprise AI adoption.
