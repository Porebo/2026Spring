# Quizz: Pipeline and Grid Search

## Multiple Choice

**1. What task does the following code perform:**  
`withColumn("paperscore", data("A2") * 4 + data("A") * 3)`

- add 4 columns to A2
- add 3 columns to A1
- add 4 to each element in column A2
- (x) assign a higher weight to A2 and A journals

---

## Multiple Choice

**2. In an estimator?**

- there is no need to call the method fit
- (x) fit function is called
- transform fuction is only called

---

## Multiple Choice

**3. Which is not a valid type of Evaluator in MLlib?**

- RegressionEvaluator
- MultiClassClassificationEvaluator
- (x) MultiLabelClassificationEvaluator
- BinaryClassificationEvaluator
- All are valid

---

## Multiple Choice

**4. In the following lines of code, the last transform in the pipeline is a:**

```scala
val rf = new RandomForestClassifier().setFeaturesCol("assembled").setLabelCol("status").setSeed(42)

import org.apache.spark.ml.Pipeline

val pipeline = new Pipeline().setStages(Array(value_band_indexer,category_indexer,label_indexer,assembler,rf))
```

- pricipal component analysis
- Vector Assembler
- String Indexer
- Vector Assembler
- (x) Random Forest Classifier
