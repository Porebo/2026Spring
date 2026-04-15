# Quizz: Basic Statistics and Data Types

## 1) Multiple Choice
You import MLlib's vectors from ?

- [ ] org.apache.spark.mllib.f
- [x] org.apache.spark.mllib.linalg
- [ ] org.apache.spark.mllib.linidg
- [ ] org.apache.spark.mllib.pandas

Answer: org.apache.spark.mllib.linalg

## 2) Checkboxes
Select the types of distributed Matrices:

- [x] RowMatrix
- [x] IndexedRowMatrix
- [x] CoordinateMatrix

Answer: RowMatrix, IndexedRowMatrix, CoordinateMatrix

## 3) Multiple Choice
How would you calculate the mean of the following:

```scala
val observations = sc.parallelize(Seq(
Vectors.dense(1.0, 2.0),
Vectors.dense(4.0, 5.0),
Vectors.dense(7.0, 8.0)))
val summary: MultivariateStatisticalSummary = Statistics.colStats(observations)
```

- [ ] summary.normL1
- [ ] summary.numNonzeros
- [x] summary.mean
- [ ] summary.normL2

Answer: summary.mean

## 4) Multiple Choice
What task does the following lines of code do:

```scala
import org.apache.spark.mllib.random.RandomRDDs
val million = RandomRDDs.normalRDD(sc, 1000000L, 10)
```

- [ ] calculate the variance
- [ ] calculate the mean
- [x] generate random samples
- [ ] Calculate the variance

Answer: generate random samples

## 5) Multiple Choice
MLlib uses the compressed sparse column format for sparse matrices; as such it only keeps the non-zero entries?

- [x] True
- [ ] False

Answer: True
