## Quizz: Preparing Data
Bookmark this page

---

### Multiple Choice
1 point possible (graded)

**For a dataframe object the method describe calculates the ?**

* ( ) count
* ( ) mean
* ( ) standard deviation
* ( ) max
* ( ) min
* (x) all of the above  <- Correct

---

### Multiple Choice
1 point possible (graded)

**What line of code drops the rows that contain null values, select the best answer ?**

* ( ) `val dfnan = df.withColumn("nanUniform", halfToNaN(df("uniform")))`
* ( ) `dfnan.na.replace("uniform", Map(Double.NaN -> 0.0))`
* (x) `dfnan.na.drop(minNonNulls = 3)`  <- Correct
* ( ) `dfnan.na.fill(0.0)`

---

### Multiple Choice
1 point possible (graded)

**What task does the following lines of code perform ?**

```scala
val lr = new LogisticRegression()
lr.setMaxIter(10).setRegParam(0.01)
val model1 = lr.fit(training)
```

* ( ) perform one hot encoding
* ( ) Train a linear regression model
* (x) Train a Logistic regression model  <- Correct
* ( ) Perform PCA on the data

---

### Multiple Choice
1 point possible (graded)

**The StandardScalerModel transforms the data such that ?**

* ( ) each feature has a max value of 1
* ( ) each feature is Orthogonal
* (x) each feature to have a unit standard deviation and zero mean  <- Correct
* ( ) each feature has a min value of -1
