# Lecture Summary: CNN Image Recognition, Training Workflow, and Overfitting Control
**IFSC 77003 - Data Science & Technologies | March 5, 2026 | Dr. Elizabeth Pierce**

## Session Focus
- Introduced convolutional neural networks (CNNs) for image recognition using a handwritten-digit tutorial context.
- Explained how CNN architectures process image grids through convolution, pooling, and dense layers.
- Demonstrated practical model setup in Python, including normalization, reshaping, train/test splitting, fitting, and evaluation.

## 1. Unit Context and Motivation
- The class moved from basic image preprocessing into prediction/classification with deep learning.
- Dr. Pierce emphasized that modern AI tools and computer vision libraries increasingly enable non-specialists to build useful image-based services.
- Core objective: move from "processing images" to "predicting what is in a new image."

## 2. Kaggle CNN Tutorial and Code Modernization
- A Kaggle CNN tutorial was used for concept framing.
- Dr. Pierce noted older tutorial notebooks may include deprecated code that no longer runs cleanly.
- She provided updated reference code for students to use as a working baseline.

## 3. What CNNs Are Doing Under the Hood
- CNNs are deep-learning models designed for grid-structured input such as pixel arrays.
- For the handwritten-digit task, each sample is a 28x28 grid of intensity values.
- Layer roles discussed:
  - **Convolution layers:** detect local patterns/features (edges, strokes, texture cues).
  - **Pooling layers:** reduce spatial dimensions and computational load while preserving salient features.
  - **Dense/output layers:** combine extracted features for final class prediction.

## 4. Neural Network Training Logic
- Training starts with initial random weights and iteratively updates weights to reduce error.
- The process relies on optimization procedures (for example, gradient-based updates).
- Terminology clarified:
  - **Epoch:** one full pass through the training set.
  - **Iteration:** one parameter update step per batch.
- Practical point: balancing too few vs too many epochs is essential to avoid underfitting or overfitting.

## 5. Data Preparation Steps Demonstrated
- Loaded the digit dataset and separated labels from pixel columns.
- Visualized class counts to check distribution balance.
- Normalized pixel values from 0 to 255 down to 0 to 1 scale.
- Reshaped tabular pixel data into image tensor format required by the model.
- Encoded labels and performed train/test split (example 80/20).

## 6. Overfitting Risks and Mitigation
- Discussed the risk of memorization: strong training performance but weaker generalization.
- Mitigation concepts covered:
  - dropout,
  - max pooling and architecture tuning,
  - batch-related controls,
  - data augmentation.
- Data augmentation examples included geometric transforms that create varied versions of labeled digits to improve robustness.

## 7. Model Evaluation and Diagnostics
- Used loss/validation curves to identify useful epoch ranges and potential overfitting behavior.
- Examined confusion matrices to inspect where classes were misclassified.
- Practical insight: model quality should be judged by behavior on unseen data, not only training success.

## 8. Broader Computer Vision Directions
- Lecture briefly compared CNNs with other model families used in image/video contexts:
  - recurrent approaches for sequence-heavy tasks,
  - capsule-network ideas for spatial relationships,
  - generative adversarial methods for image synthesis and transformation.
- Emphasized that model selection depends on task type, data availability, and explainability needs.

## 9. Project and Practice Guidance
- Students were encouraged to:
  - review Unit 6/7 materials,
  - run and adapt Python demos,
  - submit notebook evidence of image-processing competency,
  - select project ideas in Unit 12 using image/video and multimodal analytics opportunities.
- Additional note: cloud research-credit programs may help when projects require larger compute resources.

## Key Takeaways
1. CNNs transform raw pixel grids into predictive classifications through layered feature extraction.
2. Data preparation (normalization, reshaping, splitting) is as important as architecture design.
3. Overfitting control requires deliberate tuning and evaluation beyond headline accuracy.
4. Confusion-matrix and validation-curve analysis are central to understanding model behavior.
5. Image analytics projects should balance technical rigor, practical feasibility, and ethical awareness.