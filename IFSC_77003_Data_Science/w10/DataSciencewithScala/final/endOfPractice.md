## End Of Practice Quiz

**Question 1**  
1 point possible (graded)  

What is not true about labeled vectors?

- They associate sparse vectors with a corresponding label/response
- They associate dense vectors with a corresponding label/response
- (x) They are used in unsupervised machine learning algorithms
- All are true
- None are true

**Question 2**  
1 point possible (graded)  

Which is true about column pointers in sparse matrices?

- They have the same number of values as the number of columns
- (x) By themselves, they do not represent the specific physical location of a value in a matrix
- They never repeat values
- All are true
- None are true

**Question 3**  
1 point possible (graded)  

What is the name of the most basic type of distributed matrix?

- SimpleMatrix
- CoordinateMatrix
- (x) RowMatrix
- IndexedRowMatrix
- SparseMatrix

**Question 4**  
1 point possible (graded)  

A perfect correlation is represented by what value?

- 3
- 0
- 100
- (x) 1
- -1

**Question 5**  
1 point possible (graded)  

A MinMaxScaler is a transformer which:

- Makes zero values remain untransformed
- (x) Rescales each feature to a specific range
- Takes no parameters
- All are true
- None are true

**Question 6**  
1 point possible (graded)  

Which is not a supported Random Data Generation distribution?

- Uniform
- Poisson
- Normal
- (x) Delta
- Exponential

**Question 7**  
1 point possible (graded)  

Sampling without replacement means:

- The expected size of the sample is the same as the RDDs size
- (x) The expected size of the sample is a fraction of the RDDs size
- The expected number of times each element is chosen is randomized
- The expected size of the sample is unknown
- The expected number of times each element is chosen

**Question 8**  
1 point possible (graded)  

What are the supported types of hypothesis testing?

- Pearson's Chi-Squared Test for goodness of fit
- Kolmogorov-Smirnov test for equality of distribution
- Pearson's Chi-Squared Test for independence
- (x) All are supported
- None are supported

**Question 9**  
1 point possible (graded)  

For Kernel Density Estimation, which kernel is supported by Spark?

- KernelDensity
- KDEUnivariate
- (x) Gaussian
- KDEMultivariate
- All are supported

**Question 10**  
1 point possible (graded)  

Which DataFrames statistics method computes the pairwise frequency table of the given columns?

- cov()
- pairwiseFreq()
- (x) crosstab()
- corr()
- freqItems()

**Question 11**  
1 point possible (graded)  

Which is not true about the fill method for DataFrame NA functions?

- It is used for replacing null values
- It is used for replacing NaN values
- It is used for replacing null values
- All are true
- (x) None are true

**Question 12**  
1 point possible (graded)  

Which transformer listed below is used for Natural Language processing?

- Normalizer
- OneHotEncoder
- ElementwiseProduct
- StandardScaler
- (x) None are used for Natural Language processing

**Question 13**  
1 point possible (graded)  

Which is true about the Mahalanobis Distance?

- It does not take into account the correlations of the dataset
- It is a multi-dimensional generalization of measuring how many standard deviations a point is away from the median
- It has units of distance
- It is a scale-variant distance
- (x) It is measured along each Principal Component axis

**Question 14**  
1 point possible (graded)  

Which is true about OneHotEncoder?

- It creates a Sparse Vector
- It must be told which column to create for its output
- It must be told which column is its input
- (x) All are true
- None are true

**Question 15**  
1 point possible (graded)  

Principle Component Analysis is:

- (x) A dimension reduction technique
- Used for supervised machine learning
- Is never used for feature engineering
- All are true
- None are true

**Question 16**  
1 point possible (graded)  

MLlib's implementation of decision trees:

- (x) Partitions data by rows, allowing distributed training
- Does not support regressions
- Supports only multiclass classification
- Supports only continuous features
- None are true

**Question 17**  
1 point possible (graded)  

Which is not a tunable of SparkML decision trees?

- maxBins
- (x) minDepth
- minInstancesPerNode
- maxMemoryInMB
- minInfoGain

**Question 18**  
1 point possible (graded)  

Which is true about Random Forests?

- They do not support regression
- They support non-categorical features
- (x) They combine many decision trees in order to reduce the risk of overfitting
- They only support binary classification
- None are true

**Question 19**  
1 point possible (graded)  

When comparing Random Forest versus Gradient-Based Trees, what must you consider?

- Depth of Trees
- Parallelization abilities
- How the number of trees affects the outcome
- (x) All of these
- None of these

**Question 20**  
1 point possible (graded)  

Which is not a valid type of Evaluator in MLlib?

- (x) MultiLabelClassificationEvaluator
- RegressionEvaluator
- MultiClassClassificationEvaluator
- BinaryClassificationEvaluator
- All are valid
