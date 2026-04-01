# Lecture Summary: Batch Processing vs. Streaming Data & IoT Introduction
**IFSC 77003 – Data Science & Technologies | March 31, 2026 | Dr. Elizabeth Pierce**

---

## Administrative Reminders

- **Welcome back from spring break.** Last third of the semester — approximately 4 weeks left before finals and graduation.
- **Upcoming AI educational events (all students welcome):**
  - *Tomorrow (April 1), Dickinson 100, 10–11 am* — Jose Antonio Bowen: "Thriving in an AI World." How to be an AI boss — asking better questions, evaluating answers, domain expertise. Visit josebowen.com for materials even if you can't attend.
  - *Thursday, April 9, noon–1 pm* — Google monthly webinar on AI (webinar link available; second Thursday of each month series).
  - *Tuesday, April 14, 11:30–12:30, EIT218* — AI Tips & Tools session hosted by Dr. Sandra Leiterman; covers Google AI Studio, Notebook LM, and Geniali. Bring your lunch. Open to students, faculty, and anyone with a lesson or activity to transform using AI.
- **Data Science Project due May 5th:**
  - Complete the report and a **2–3 minute "3-minute thesis"** summary presentation (aim for 2–2.5 minutes).
  - One visual is sufficient (single PowerPoint slide with audio or selfie video on your phone).
  - Upload to Google Drive and give viewing permission to **eXpierce@ualr.edu** if the file is too large to submit directly.
  - Full report structure guidelines are available in the course content area.
- **AI use reminder:** Do your own work first. AI tools like Grammarly are fine for polishing sentence structure. However, do not rely on Notebook LM or Gemini to generate literature reviews or references — these tools may cite Reddit posts or hallucinated articles as if they were peer-reviewed research. Dr. Pierce coined the term "mirages" rather than "hallucinations" — AI creates very realistic illusions that are not real.
- Student John Arnold is working on a project on **data center power consumption**.

---

## Major Lecture Sections

### 1. Multiple Perspectives on Data Science (Review)

Data science is multidimensional. Dr. Pierce reviewed key ways to frame and understand the field:

| Perspective | Description |
|---|---|
| **Types of Questions** | What/Exploratory → Why/Associative → When/Predictive → How/Prescriptive |
| **Types of Data** | Quantitative, qualitative, text, image, multimedia (social media), biometric, geospatial |
| **Types of Techniques** | Statistics, data mining (clustering, decision trees), ML, deep learning, AI |
| **Amount of Data** | Small (single computer) → Big Data (distributed/cluster computing required) |
| **Batch vs. Streaming** | *Today's new perspective* — data lake vs. data river |

This multi-dimensional lens is useful for scoping your data science project — you don't need to answer all questions with all techniques on all data types. A manageable, well-defined scope is perfectly fine for this course.

---

### 2. Batch Processing vs. Streaming Data (Main Lecture Topic)

The central analogy: **batch = data lake; streaming = data river.**

#### Batch Processing
- Collect a large set of records first, then process them together.
- Classic example: monthly credit card billing — tabulate all transactions for the billing cycle, generate and send statements.
- Student data science projects are almost always batch: downloading a CSV from Kaggle, the U.S. Census, or a hackathon data portal.
- Latency is **high** — jobs can run overnight (e.g., starting at 5 pm, results ready at 9 am).
- **COBOL** (1960s language) still handles ~13% of business computing, mostly in banking, insurance, and healthcare billing — because it is extremely efficient at deterministic, rules-based batch calculations. At its peak, COBOL held ~85% of the market.

#### Streaming Data
- Continuous feed of data ingested in real time; decisions made on a **sliding time window** of recent observations.
- Example: temperature sensor on industrial equipment — sample every few seconds, average the last 15 readings every 30 seconds, sound an alarm if above threshold *or* if recent readings are trending upward (detecting problems earlier than averages alone).
- Latency is **low** — results in seconds to milliseconds.
- More complex to implement; requires specialized platforms.
- Analytics are typically **simpler** (averages, medians, ranges, trend detection) vs. complex batch jobs (billing calculations, full ML model training).

#### Comparison Table

| Dimension | Batch | Streaming |
|---|---|---|
| Data analogy | Lake | River/Stream |
| Processing unit | Full dataset (millions of records) | Sliding window (micro-batches or single records) |
| Latency | High (hours, overnight) | Low (seconds–milliseconds) |
| Implementation | Simpler | More complex |
| Analytics complexity | Can handle complex analytics | Typically simple functions |
| Storage | Stores all data | May discard data after window analysis |
| Cost | Lower processing cost; higher storage cost | Higher processing cost; potentially lower storage |
| Replayability | Easy to rerun jobs on stored data | Difficult to replay past windows |

#### Streaming Use Cases Mentioned
- **Industrial monitoring**: equipment temperature, humidity for irrigation systems
- **Healthcare**: patient vital sign monitoring (heart rate can deteriorate in seconds)
- **Smart buildings/homes**: motion detection, smart meters, lighting automation
- **Smart cities**: real-time traffic feeds, emergency services routing
- **Financial markets**: stock price updates at microsecond intervals, fraud detection
- **Real-time sports betting** (e.g., DraftKings)
- **Social media**: real-time likes, shares, and comments
- **Healthcare operations**: UAMS ER used weather + time-of-day + day-of-week data (updated every 6 hours) to predict ER admission surges — enabling staffing decisions, bed clearing, and elective surgery postponements.

#### Streaming Challenges
- **Data quality**: sensor malfunctions can corrupt a small window and cause bad real-time decisions — much harder to "balance out" vs. batch where you have millions of records.
- **Auditing/replay**: recovering what was in a window from 3 weeks ago is difficult; you may need to take periodic snapshots, which creates storage pressure.
- **Security**: streaming data (financial transactions, PII, patient data) must be secured against interception. HIPAA and FERPA compliance also apply to retained streaming data.
- **Scalability**: streaming systems require more processing power and memory; must be designed to scale with data volume.
- **Which to use?** Not one-or-the-other — the same data (e.g., social media posts) can be batched *or* streamed depending on business need and acceptable latency.

#### Streaming Platforms
| Platform | Vendor |
|---|---|
| Apache Kafka | Open source |
| Amazon Kinesis | Amazon (logs, video, audio, click streams) |
| Google Cloud Dataflow | Google |
| Apache Spark Streaming | Open source |
| Azure Stream Analytics | Microsoft |
| Apache Flink | Open source |
| Apache Storm | Open source (strong for real-time ML analytics on streams) |

#### Use Case Fit
- **Batch is ideal for:** payroll, billing, data warehousing, scheduled report generation, data science project analysis
- **Streaming is ideal for:** fraud detection, log monitoring, real-time alerts, customer experience personalization, equipment monitoring, patient monitoring

---

### 3. Internet of Things (IoT) — Introduction

IoT connects physical sensors to cloud-based platforms for real-time data collection and monitoring.

**Basic IoT architecture:** Sensor → Power source → Hotspot/Network → Cloud → Dashboard

**Dashboard design:** Smart dashboards process incoming stream data and send automated alerts when rules are triggered — you don't need to watch a screen 24/7. Alerts via text or message when a threshold or pattern is detected.

**ThingsBoard (demo):** A company that sells IoT kits (sensors + cloud subscription + dashboard software). Starter kits are free-to-low-cost; pricing scales with the number of devices. Dr. Phil Williams (bioinformatics, UALR) has used Raspberry Pi-based IoT setups to monitor water salt levels as a class project.

**IoT Application areas:**
- Smart homes (lighting, security, smart meters)
- Smart cities (traffic, utilities, emergency management)
- Agriculture (soil moisture, irrigation timing)
- Industrial (equipment performance and predictive maintenance)
- Healthcare (patient vitals, hospital infrastructure)

**Upcoming (Thursday):** IoT developer career paths, deeper IoT development overview, privacy considerations in IoT, and working through the IoT quiz on CognitiveClass.ai.

---

## Key Takeaways
1. Data science is multidimensional — you can describe it by question type, data type, technique, scale, or processing mode.
2. Batch and streaming are complementary, not competing — choose based on how quickly you need results and the nature of your data.
3. Streaming enables real-time decisions but demands better infrastructure, simpler analytics, and extra attention to data quality and auditability.
4. IoT is the hardware layer that generates streaming data — connected sensors in homes, cities, hospitals, and farms are already producing massive real-time data that data scientists analyze.
5. COBOL isn't dead — deterministic batch processing (billing, payroll) is still dominated by legacy systems that aren't going away.

---

## Next Steps / Assignments
1. **Data Science Project (all students):** Complete report + 2–3 minute summary with one visual. Due **May 5th**. Upload video/file to Google Drive and share with eXpierce@ualr.edu.
2. **IoT Quiz/Tutorial (Unit 9):** Complete the Internet of Things quiz on CognitiveClass.ai (50 questions; open-book style is fine). Report back to Dr. Pierce with: overall score/reflection, which areas you already knew, and which areas you'd like to explore further.
3. **Optional:** Email Dr. Pierce with your project topic/questions if you want feedback or are uncertain about scope.
