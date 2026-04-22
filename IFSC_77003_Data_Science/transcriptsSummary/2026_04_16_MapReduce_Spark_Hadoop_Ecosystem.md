# Lecture Summary: MapReduce, Spark & the Hadoop Ecosystem
**IFSC 77003 - Data Science & Technologies | April 16, 2026 | Dr. Elizabeth Pierce**

---

## Administrative Reminders

- The class continued the Cloud & Big Data unit by focusing on frameworks for processing very large datasets.
- Students were reminded that the field has evolved from a small number of core tools into a broad ecosystem with many specialized options.
- For the assignment, students should complete **two tutorials** from the suggested big data tooling list.
- For the Linux commands and shell scripting tutorial, a **progress screenshot** is sufficient instead of purchasing a certificate.

---

## Major Lecture Sections

### 1. Big Data Jobs and the Historical Role of MapReduce
Dr. Pierce introduced the lecture by framing the central problem: how to write applications that can process huge amounts of data reliably, often in parallel, and sometimes under real-time expectations. She explained that in the early Hadoop era, especially around 2005-2010, **MapReduce** was the main framework for large-scale distributed data processing.

Each MapReduce job consists of:
- A **mapper** that generates key-value pairs
- An automatic **shuffle and sort** phase built into Hadoop
- A **reducer** that processes grouped key-value pairs

She also explained the role of the **combiner**, which acts like a local semi-reducer that can improve performance by summarizing data on local nodes before forwarding intermediate results for final reduction.

### 2. Word Count as the Core MapReduce Example
The lecture used the classic **word count** example to show how MapReduce works in practice.

The workflow:
- Input files are stored in HDFS and split into blocks
- Mapper routines read data line by line and emit `(word, 1)` pairs
- Hadoop automatically sorts and shuffles these pairs by key
- Reducers total the counts for each unique word and output the final counts

Dr. Pierce compared this to large overnight or multi-day processing jobs from the mainframe era, emphasizing that Hadoop was designed for truly massive workloads, not tiny interactive tasks.

### 3. MapReduce Programming Interfaces and the Rise of Pig
A major theme of the lecture was that raw Java MapReduce was powerful but difficult for many analysts to use directly. Dr. Pierce showed how a typical MapReduce Java program requires:

- A mapper class
- A reducer class
- A driver class to configure and submit the job

Because this was too complex for many business analysts and power users, higher-level tools were created. One important example is **Apache Pig**, which provides a scripting language that translates into MapReduce jobs.

Advantages of Pig discussed in class:
- Easier to read and write than raw Java MapReduce
- Can be run locally for testing
- Supports flexible ingestion and transformation of different data types
- Allows analysts to express transformations at a higher level while Hadoop handles the distributed execution

### 4. AWS Elastic MapReduce Demonstration
Dr. Pierce walked through a hands-on demonstration of creating a Hadoop cluster on **AWS Elastic MapReduce (EMR)** and running a Pig job.

The demo included:
- Choosing an EC2 instance type for the cluster
- Creating a key pair for secure access
- Creating an S3 bucket for input files and scripts
- Uploading a text file and a Pig script
- Using S3 URLs to point EMR to the correct inputs
- Creating a small Hadoop cluster with mostly default settings
- Adding a Pig step to run the job
- Reviewing logs and final word count output

This demo illustrated how much easier cloud tooling has made cluster setup compared with the earlier days of Hadoop, while still showing the batch-oriented nature of these jobs.

### 5. Hadoop Version 2 and the Role of YARN
The lecture then moved to **Hadoop 2**, where the introduction of **YARN** separated resource management from MapReduce execution. Dr. Pierce explained that this was a major architectural shift because Hadoop needed more flexibility and more room for innovation.

Key point:
- Hadoop did **not** abandon MapReduce
- Existing MapReduce jobs could still run
- YARN opened the door for multiple processing frameworks to coexist on top of HDFS

This allowed the Hadoop ecosystem to grow well beyond its original MapReduce-only model.

### 6. Apache Spark and In-Memory Processing
Dr. Pierce next introduced **Apache Spark** as a newer framework designed for workloads that fit into available memory. Spark was presented as much faster than MapReduce for these use cases because it can process data **in memory** rather than repeatedly relying on disk I/O.

Spark strengths discussed:
- In-memory processing
- Faster iterative analytics
- Better fit for real-time or near-real-time processing
- Support for multiple languages such as Java, Scala, and Python
- Rich library ecosystem

Important limitation:
- If the data being processed does **not** fit into available memory, MapReduce may still be the better choice

Dr. Pierce emphasized that Spark and MapReduce were not originally designed as exact competitors. Instead, they serve different big data workload patterns.

### 7. Spark Libraries and Workload Types
The lecture reviewed the main Spark ecosystem components:

| Spark Library | Purpose |
|---|---|
| **Spark SQL** | SQL-style analytics on distributed data |
| **Spark Streaming** | Processing stream data in mini-batches |
| **MLlib** | Machine learning workflows |
| **GraphX** | Graph processing and graph analytics |

Spark was presented as especially useful when:
- Repeated passes over the same data are needed
- Streaming windows are being processed
- Interactive or iterative analytics matter
- The workload can stay within available memory

### 8. Comparing MapReduce and Spark
Dr. Pierce summarized the tradeoffs between the two frameworks:

| Dimension | MapReduce | Spark |
|---|---|---|
| Processing style | Batch, disk-based | In-memory, iterative, streaming-friendly |
| Speed | Slower for many analytic tasks | Much faster when data fits in memory |
| Programming | Traditionally Java-heavy, more complex | Easier interfaces, multiple languages |
| Best fit | Huge ETL and batch jobs, very large data volumes | Streaming, iterative analytics, ML, interactive workloads |
| Memory dependence | Less dependent on RAM | Strongly dependent on available memory |

The takeaway was not that one tool is universally better, but that the right choice depends on data size, memory limits, workload type, and operational goals.

### 9. The Modern Big Data Processing Ecosystem
The lecture ended by widening the lens from Spark versus MapReduce to the broader 2026 ecosystem. Dr. Pierce highlighted that data engineers and analysts now have many alternatives depending on the type of processing they need.

Examples mentioned:
- **Apache Flink**
- **Apache Storm**
- **Snowflake**
- **Google BigQuery**
- **Amazon Redshift**
- **Trino / Presto SQL**
- **Apache Tez**
- **Hudi / Iceberg / Data Lake tooling**
- **Apache Beam**
- **Hive**
- **Kafka**
- **Oozie**
- **ZooKeeper**

The broader lesson was that the big data landscape is now highly specialized. Professionals must choose tools based on the exact nature of the problem rather than assuming one general-purpose framework will fit every workload.

---

## Key Takeaways
1. MapReduce was the original major Hadoop processing model for very large distributed batch jobs.
2. Pig and similar tools emerged to make big data programming more accessible than raw Java MapReduce.
3. AWS EMR simplifies cluster creation, job submission, and log inspection for Hadoop-style workflows.
4. YARN was a major evolution in Hadoop because it separated resource management from a single execution framework.
5. Spark is much faster for many analytics workloads when the working data fits in memory.
6. MapReduce still remains valuable for extremely large, disk-oriented batch jobs that exceed available RAM.
7. The modern big data ecosystem includes many specialized tools beyond both MapReduce and Spark.

---

## Tools & Platforms Referenced
- **Hadoop Distributed File System (HDFS)**
- **MapReduce**
- **Apache Pig**
- **AWS Elastic MapReduce (EMR)**
- **Amazon S3**
- **Apache Spark**
- **Spark SQL, Spark Streaming, MLlib, GraphX**
- **Apache Flink, Storm, Hive, Kafka, Oozie, ZooKeeper**
- **Snowflake, Google BigQuery, Amazon Redshift, Trino**

---

## Next Steps
1. Complete **two tutorials** from the suggested list of big data tools and frameworks.
2. If you choose the Linux commands and shell scripting tutorial, submit a **progress screenshot** rather than paying for a certificate.
3. Review the Hadoop and Spark ecosystem examples so you can better match tools to workload types.
