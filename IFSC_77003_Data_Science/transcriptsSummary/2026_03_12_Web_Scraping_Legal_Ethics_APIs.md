# March 12, 2026 Lecture Summary
**Course:** IFSC 77003 - Data Science & Technologies  
**Instructor:** Dr. Elizabeth Pierce  
**Session Focus:** Web scraping challenges, legal and ethical constraints, data monetization, and API-first alternatives

## Key Takeaways
- Web scraping now sits inside an arms race between automated collectors and increasingly sophisticated website defenses.
- Anti-scraping controls include browser fingerprinting, dynamic content, captchas, honeypots, rate limiting, login walls, and server-side bot detection.
- Legal analysis depends heavily on whether data is public or protected, whether scraping violates terms of service, and whether copyrighted or privacy-sensitive material is being reused.
- The lecture connected web scraping to larger data-economy trends: organizations are moving toward data-as-a-service and APIs instead of allowing uncontrolled scraping.
- A new career path, the data product manager, is emerging around sourcing, packaging, licensing, and operationalizing data for human and AI consumers.

## Major Lecture Sections
### 1. Web Scraping Tools and Market Pricing
- Dr. Pierce reviewed the spectrum from do-it-yourself Python libraries to paid scraping vendors and managed services.
- Example pricing ranged from about $40 per month to enterprise plans around $30,000 per month, illustrating how large the demand for scraped data has become.
- She noted that headline success-rate claims for scraping tools should be treated cautiously because they are often based on limited test sites.

### 2. Why Scraping Is Getting Harder
- More sites are blocking scraping, including sites that once exposed practice pages for tutorials.
- The rise of AI increased demand for web data, which pushed publishers and platforms to invest more heavily in defensive measures.
- AI is now appearing on both sides: it can help automate scraping, but it can also strengthen detection and blocking.

### 3. Common Anti-Scraping Defenses
- Browser and device fingerprinting can detect unusual automation patterns such as headless browsing.
- Dynamic JavaScript-heavy pages force scrapers to use more advanced tooling than simple static HTML fetches.
- Captchas, hidden honeypot links, behavioral analytics, and IP rate limiting help distinguish bots from human visitors.
- Login walls and subscription gates create an additional legal and technical boundary around content access.

### 4. Legal and Ethical Frameworks
- The Computer Fraud and Abuse Act (CFAA) focuses on unauthorized access to computer systems.
- The Digital Millennium Copyright Act (DMCA) addresses unauthorized reproduction and distribution of digital material.
- Dr. Pierce emphasized that publicly accessible data is often treated differently from protected or gated data, but copyright, privacy, and usage purpose still matter.
- Ethical concerns include privacy, personally identifiable information, bias in downstream models, data quality, and whether scraping creates harm or crosses into abusive behavior.
- Excessive scraping that degrades a site can trigger claims similar to trespass to chattels.

### 5. Illustrative Court Cases
- Meta v. Bright Data highlighted disputes over scraping publicly accessible platform data.
- eBay v. Bidder's Edge showed how heavy automated collection can be framed as harmful system interference.
- Facebook v. Power Ventures involved access after being told to stop and raised CFAA and intellectual property issues.
- LinkedIn v. hiQ reinforced the legal importance of the public-versus-protected distinction.
- Zillow was presented as an example of a company that has repeatedly acted to enforce terms and protect platform data.

### 6. Best Practices for Responsible Scraping
- Scrape only the information necessary for the project objective.
- Review site terms of use and be prepared to justify methods and scope.
- Avoid excessive load, avoid sensitive data when possible, and secure any collected data.
- Treat business-purpose scraping more cautiously than classroom experimentation done for learning.

### 7. Data Monetization and API-First Access
- Drawing from the CDO IQ Symposium, Dr. Pierce described how firms are moving from being scraped to packaging their data as a product.
- Organizations may license data through APIs, use tiered subscription models, barter access for commercial advantages, or negotiate revenue-sharing arrangements.
- Trustpilot was discussed as an example of a company that identified valuable marketable data, restricted scraping, and moved toward formalized access.
- The session introduced the data product manager as a role focused on sourcing, evaluating, packaging, and delivering data for analytics and AI workloads.

### 8. API Example and Project Implications
- The Movie Database (TMDB) API was used as an example of structured data-as-a-service with documentation, rate limits, and free-tier access.
- Dr. Pierce encouraged students to think about data science projects that use APIs for dashboards, exploratory analysis, or live data integration instead of scraping when an API exists.

## Tools, Sites, and Concepts Mentioned
- ScrapingDog, ScraperAPI, ScrapingBee, ZenRows, FireCrawl
- Selenium, headless browsers, dynamic content, captchas, honeypots
- CFAA, DMCA, terms of service, privacy, PII, copyright
- CDO IQ Symposium, New Data Consulting, Trustpilot
- TMDB API and other public APIs such as weather APIs

## Next Steps
1. Try a simple scraping exercise to understand the mechanics and the obstacles.
2. Compare scraping with API-based access when evaluating possible data sources.
3. Prepare for the next class discussion on AI and evolving data trends.