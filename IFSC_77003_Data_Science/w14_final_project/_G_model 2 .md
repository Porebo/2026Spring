Page
Page number
3
of 49
Cover page
Graduate Project: Project Report
Name:Dennis Pedersen
Date: March 4, 2025
Instructor: Dr. Elizabeth Pierce and Serhan Dagtas
Course: IFSC 7370 9U1 - Data Science - Technologies
Table of content
Table of content............................................................................................................................. 1
Introduction..................................................................................................................................3
Background & Motivation................................................................................................... 3
Current Knowledge & Gaps............................................................................................... 3
Problem Statement & Research Questions....................................................................... 4
Significance of the Study................................................................................................... 5
Literature Review.........................................................................................................................5
The Growing Cybersecurity Workforce Gap...................................................................... 5
Growth in Cybersecurity Job Market..................................................................................5
The Severity of Cyber Threats and Its Impact on Employment......................................... 6
The Skills Shortage and Its Consequences....................................................................... 6
Workforce Size and Distribution.........................................................................................7
Post-Pandemic Budget Constraints and Their Impact on the Cybersecurity Workforce....7
How This Research Builds on Prior Work..........................................................................8
Data Selection, Research Design, and Methods.......................................................................9
Research Objectives................................................................................................................9
Research Strategy................................................................................................................... 9
Data Sources and Scope.........................................................................................................9
Cybersecurity Vulnerabilities Dataset.............................................................................. 10
Cybersecurity Workforce Dataset.................................................................................... 10
Dataset Schema...............................................................................................................11
CVE Data from NVD API............................................................................................11
CVE Count Summary Files........................................................................................ 13
Cybersecurity Workforce Data from CyberSeek........................................................ 15
Schema for Cyber_Workforce_Data.......................................................................... 15
Combined CVE & Workforce Data for Analysis......................................................... 17
Summary of Datasets Used....................................................................................... 18
Data Science Techniques and Analytical Methods................................................................ 18
Descriptive Analysis and Trend Examination...................................................................18
Statistical Modeling and Correlation Analysis.................................................................. 19
Regression Analysis and Predictive Modeling................................................................. 19
Data Processing and Preparation.................................................................................... 19
Scope and Limitations........................................................................................................... 20
Analysis and Findings...............................................................................................................20
1. Data Exploration and Preparation......................................................................................20
2. Correlation Analysis...........................................................................................................21
Relationship Between CVEs and Job Openings..............................................................22
Relationship Between CVEs and Total Employed........................................................... 22
Relationship Between CVEs and Supply/Demand Ratio................................................. 23
Page 1 of 48
3. Regression Analysis.......................................................................................................... 24
Simple Linear Regression: Job Openings ~ Total CVEs..................................................24
Multiple Linear Regression: Job Openings ~ CVE Severity Metrics................................ 25
4. Partial Correlation Analysis (Controlling for Year)..............................................................26
5. Bootstrap Pearson Correlation Analysis............................................................................ 26
6. Data Visualization.............................................................................................................. 27
Total CVEs Over Time..................................................................................................... 27
CVE Severity Distribution Over Time............................................................................... 28
Cybersecurity Job Market Trends Over Time.................................................................. 29
Scatter Plots with Regression Lines................................................................................ 30
Correlation Matrix Heatmap............................................................................................. 32
Linear Regression: Total CVEs vs (Job Openings + Total Employed)............................. 33
Rolling Correlation Analysis............................................................................................. 34
7. Cybersecurity Workforce Trends....................................................................................... 36
Overall Findings.....................................................................................................................36
Key Insights..................................................................................................................... 36
Recommendations........................................................................................................... 37
Discussion of Results............................................................................................................... 38
1. Does an increase in cybersecurity vulnerabilities (CVEs) correlate with an increase in
cybersecurity job openings?.................................................................................................. 38
2. Does the severity of vulnerabilities influence cybersecurity workforce demand?.............. 39
3. How has the relationship between CVEs and cybersecurity workforce metrics changed
over time?.............................................................................................................................. 39
4. Does the cybersecurity workforce supply meet the growing demand for security
professionals?........................................................................................................................40
5. Are cybersecurity hiring patterns stable, or do they fluctuate based on external factors?.40
Summary of Discussion......................................................................................................... 41
Conclusions and Closing Thoughts........................................................................................ 42
Summary of Findings.............................................................................................................42
Contributions and Insights..................................................................................................... 42
Lessons Learned................................................................................................................... 43
Future Work........................................................................................................................... 44
Closing Thoughts...................................................................................................................45
Appendix.................................................................................................................................... 45
Project Log:............................................................................................................................45
Reference List........................................................................................................................46
Additional Project Documentation..........................................................................................47
Page 2 of 48
Introduction
Background & Motivation
The rapid rise of cybersecurity vulnerabilities has become a critical concern for governments,
businesses, and individuals alike. These vulnerabilities, documented as Common Vulnerabilities
and Exposures (CVEs), provide a standardized way to track and classify security threats. Over
the past five years, the number of reported CVEs has increased significantly, with a growing
proportion of high-severity threats that pose serious risks to organizations worldwide. As cyber
threats escalate, so does the demand for skilled cybersecurity professionals capable of
identifying, mitigating, and responding to these vulnerabilities.
However, the cybersecurity workforce gap remains a persistent challenge, with reports from
CyberSeek, (ISC)², and the U.S. Bureau of Labor Statistics consistently highlighting a shortage
of qualified professionals. This raises a crucial question: Is the cybersecurity job market growing
in response to the increasing number and severity of reported vulnerabilities? If the supply of
skilled professionals does not keep pace with rising threats, organizations may struggle to
mitigate risks effectively, leading to greater financial, operational, and national security risks.
This study investigates the statistical relationship between the volume and severity of CVEs and
cybersecurity workforce trends, with a particular focus on job openings, total employment, and
the supply/demand ratio. Understanding this correlation can help policymakers, hiring
managers, and educators assess whether current workforce development efforts are sufficient
to address the growing security landscape.
Current Knowledge & Gaps
Previous research has extensively documented the rise in cybersecurity threats and the global
cybersecurity talent shortage as separate phenomena. Reports from organizations such as
NIST, CISA, and MITRE provide comprehensive analyses of vulnerabilities, while workforce
studies from CyberSeek, CompTIA, and (ISC)² highlight gaps in employment and training.
However, there is limited quantitative research examining whether the rate of workforce growth
aligns with the escalation of cybersecurity threats.
Existing discussions often describe the workforce shortage in qualitative terms, without
conducting a rigorous statistical analysis of CVE trends and employment data. This study seeks
to fill that gap by directly analyzing correlations between the number and severity of reported
vulnerabilities and key cybersecurity workforce metrics.
Page 3 of 48
Problem Statement & Research Questions
The rapid increase in cybersecurity vulnerabilities presents a growing challenge for
organizations seeking to protect their systems and data. As new threats emerge, companies
must adapt their cybersecurity strategies, including expanding their workforce to mitigate risks.
However, despite the rising volume of reported vulnerabilities, the relationship between
cybersecurity threats and workforce demand remains complex and influenced by multiple
factors.
This study aims to explore the historical trends in cybersecurity vulnerabilities (CVEs) and their
relationship with workforce dynamics, analyzing how changes in CVE volume and severity
impact job openings, total employment, and the supply/demand ratio for cybersecurity
professionals. While conventional wisdom suggests that higher cybersecurity threats should
lead to increased hiring, recent trends indicate a possible shift in industry hiring patterns,
necessitating a deeper statistical investigation.
To address these concerns, this research is guided by the following key questions:
1. What is the historical trend of CVE volume and severity from 2010 to 2024?
○ How have the number of reported vulnerabilities and their severity levels evolved
over time?
○ Are there notable periods of rapid growth or stagnation in cybersecurity
vulnerabilities?
2. How has the cybersecurity job market changed over the same period?
○ What are the trends in job openings, total employment, and the supply/demand
ratio for cybersecurity professionals?
○ Has workforce expansion consistently followed CVE trends, or have there been
periods of deviation?
3. Is there a statistically significant correlation between the total number of CVEs and
workforce metrics?
○ To what extent do total CVEs correlate with job openings, employment, and the
supply/demand ratio?
○ Has this correlation remained stable over time, or have external factors
influenced hiring trends?
4. Does CVE severity (Medium, High, Critical) correlate with workforce trends?
○ Are higher-severity vulnerabilities associated with increased hiring demands?
○ How does the relationship between CVE severity and job market trends compare
to the relationship between total CVEs and workforce metrics?
5. What predictive trends can be identified regarding the relationship between CVE trends
and workforce availability?
○ Can historical data be used to anticipate future cybersecurity workforce needs?
○ What factors, beyond CVE volume and severity, appear to influence workforce
availability and hiring trends?
Page 4 of 48
Significance of the Study
The findings of this study will provide data-driven insights into whether the cybersecurity
workforce is scaling adequately in response to the evolving threat landscape. If a strong
correlation exists between CVE severity and workforce demand, it may indicate that
organizations are actively adapting to increasing security risks. Conversely, if no correlation is
found, it may suggest a systemic lag in cybersecurity workforce development, highlighting a
potential risk to national security and business resilience.
By quantifying these relationships, this research will contribute to cybersecurity workforce
planning, policy development, and training initiatives. It will help governments, educational
institutions, and businesses make informed decisions about cybersecurity education, hiring
strategies, and industry investments to ensure that the workforce is prepared to tackle emerging
threats.
Literature Review
The Growing Cybersecurity Workforce Gap
Recent studies indicate that the global cybersecurity workforce is unable to keep up with the
increasing demand for skilled professionals. According to ISC2, the global cybersecurity
workforce gap increased by 19% in 2024, leaving an estimated 4.8 million unfilled positions
worldwide necessary to secure organizations effectively (Infosecurity Magazine, 2024
https://www.infosecurity-magazine.com/news/cybersecurity-workforce-gap-budget/ ). The
shortage is particularly acute in the United States, where nearly 265,000 more professionals are
needed to meet current staffing requirements, covering only 83% of available jobs (HR Dive,
2024,
https://www.hrdive.com/news/skills-shortage-persists-in-cybersecurity-despite-hiring/729988/ ).
CyberSeek reports over 500,000 cybersecurity job openings in the United States, with some of
the highest demand in roles such as cybersecurity analysts, network security engineers, and
penetration testers (Cyberseek, https://www.cyberseek.org/ )
This workforce gap is a critical issue that has been the focus of multiple data-driven
investigations. While some studies highlight the mismatch between skill supply and demand,
others suggest that budget constraints, training limitations, and high job stress contribute to the
talent shortage. My project will build on these findings by examining whether cybersecurity job
growth aligns with the increasing number of cyber vulnerabilities (CVEs) and whether the skills
gap is affecting workforce supply trends over time.
Growth in Cybersecurity Job Market
Despite the workforce gap, the cybersecurity job market is growing at a much faster rate than
other sectors. The U.S. Bureau of Labor Statistics (BLS) forecasts a 32% increase in
Page 5 of 48
cybersecurity jobs from 2022 to 2032, significantly exceeding the 3% average growth rate for all
U.S. jobs (Forbes, 2024,
https://www.forbes.com/sites/jackkelly/2024/08/16/nearly-4-million-cybersecurity-jobs-are-vacant
-heres-why-you-should-consider-breaking-into-this-sector/ ). Additionally, the global
cybersecurity workforce expanded by 8.7% between 2022 and 2023, adding nearly 440,000
new positions (StationX, 2024, https://www.stationx.net/cyber-security-job-statistics/ ).
The explosive growth of cybersecurity employment opportunities suggests that organizations
are actively trying to address security concerns by hiring more personnel. However, this
research primarily focuses on employment projections without directly linking workforce
expansion to the evolving cybersecurity threat landscape. My analysis seeks to bridge this gap
by quantifying the correlation between cybersecurity vulnerabilities (Total CVEs) from the
national vulnerability database and job market trends, helping to determine whether job growth
is reactive to increasing cyber threats or driven by broader market factors.
The Severity of Cyber Threats and Its Impact on Employment
Several studies suggest that the rising intensity of cyber threats is a major driver of workforce
expansion. A 2024 industry survey found that 74% of cybersecurity professionals believe the
current cyber threat landscape is the worst it has been in five years (Infosecurity Magazine,
2024, https://www.infosecurity-magazine.com/news/cybersecurity-workforce-gap-budget/ ). The
economic impact of cybercrime is also expected to skyrocket, from $9.22 trillion in 2024 to
$13.82 trillion by 2028 (University of San Diego, 2024,
https://onlinedegrees.sandiego.edu/top-cyber-security-threats/ ).
Additionally, the National Vulnerability Database (NVD) provides a publicly available record of
cybersecurity vulnerabilities, tracking an increasing trend of critical security flaws across
industries. The NVD reported that over 37,000 CVEs were logged in 2024, continuing a rapid
escalation from previous years (National Vulnerability Database NVD, https://nvd.nist.gov/ ).
However, while prior research establishes the severity of cyber threats, it does not explicitly
analyze how these increasing threats translate into workforce demands. My study will contribute
to this area by investigating whether cybersecurity job openings and total employment figures
scale in proportion to rising cyber vulnerabilities.
The Skills Shortage and Its Consequences
In addition to workforce shortages, the lack of specialized cybersecurity skills is an ongoing
challenge. A 2024 study found that 90% of organizations report skills gaps in their security
teams, which directly impacts their ability to manage cyber threats effectively (Infosecurity
Magazine, 2024,
https://www.infosecurity-magazine.com/news/cybersecurity-workforce-gap-budget/ ). Gartner
predicts that by 2025, cybersecurity staff shortages will be responsible for over 50% of major
security incidents (Field Effect, 2024,
https://fieldeffect.com/blog/overcoming-the-cybersecurity-talent-shortage ).
Page 6 of 48
These studies reveal a crucial aspect of the cybersecurity labor market: it is not just about hiring
more workers, but ensuring they possess the necessary expertise. My analysis will explore how
the cybersecurity supply-demand ratio has evolved over time, helping to assess whether
increased hiring is closing the gap—or if skills deficiencies continue to leave organizations
vulnerable despite workforce growth.
Workforce Size and Distribution
While previous research has identified the workforce gap, data also suggests cybersecurity
employment is highly concentrated in certain regions. The global cybersecurity workforce is
currently estimated at 5.5 million professionals, with the United States having the largest share
at 1.33 million workers (StationX, 2024, https://www.stationx.net/cyber-security-job-statistics/ ).
However, existing literature does not account for how workforce growth compares with
increasing cybersecurity vulnerabilities worldwide. My research seeks to contribute to this
discussion by analyzing cybersecurity workforce trends alongside the rise in CVEs, offering a
data-driven perspective on whether current hiring efforts are keeping pace with the rapidly
evolving threat landscape.
Post-Pandemic Budget Constraints and Their Impact on the Cybersecurity
Workforce
While the cybersecurity workforce gap continues to grow, new research suggests that economic
factors and budget constraints are playing an increasingly significant role in hiring challenges,
alongside the ongoing skills shortage. The 2024 ISC2 Cybersecurity Workforce Study reports
that for the first time, "lack of budget" has surpassed "lack of qualified talent" as the leading
cause of cybersecurity staffing shortages (ISC2, 2024,
https://www.isc2.org/Insights/2024/09/ISC2-Publishes-2024-Cybersecurity-Workforce-Study-Firs
t-Look ). The report highlights that:
● 37% of cybersecurity teams have faced budget cuts (+7% from 2023)
● 25% have experienced layoffs (+3% from 2023)
● 38% have encountered hiring freezes (+6% from 2023)
● 32% have seen fewer promotions (+6% from 2023)
This shift aligns with broader trends in the post-pandemic tech industry downturn, where
companies—facing increased operating costs, inflation, and investor pressure for
profitability—have reduced hiring and cut budgets across departments, including cybersecurity
(WSJ, 2024,
https://www.wsj.com/articles/cyber-spending-rises-modestly-while-hacking-threats-evolve-8c0e0
c3c ). Unlike previous years, when talent shortages were cited as the primary barrier to
cybersecurity hiring, the latest studies indicate that organizations are willing to invest in security
but face financial constraints that limit hiring and training initiatives.
Page 7 of 48
