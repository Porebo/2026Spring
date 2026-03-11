# Mar 10, 2026 Lecture Summary
**Course:** IFSC 77003 – Data Science & Technologies  
**Instructor:** Dr. Elizabeth Pierce  
**Session Focus:** Social media analytics foundations + live web-scraping demo

## Key Takeaways
- Social media analytics has matured from text-heavy beginnings into multimedia analytics that fuses text, images, audio, video, APIs, and other streaming signals.
- Organizations rely on analytics for trend spotting, sentiment tracking, competitive intelligence, operational monitoring, and long-range strategic planning.
- IBM’s framing (“gather and find meaning in social data to support business decisions”) anchored the lecture, but Dr. Pierce emphasized broader audiences such as governments and research labs like COSMOS.
- Effective projects demand clearly framed questions, scoped timelines, and knowledge of data provenance (platforms, formats, access constraints, and demographics).
- COSMOS tools (blog trackers, YouTube monitors, COVID-19 misinformation dashboards, vocal structure analysis) illustrate large-scale, defense-funded social media intelligence efforts.

## Smart Chapter Timeline
| Time (hh:mm:ss) | Segment |
| --- | --- |
| 00:00 | Social Media Analytics Evolution |
| 05:59 | Applications (trend, sentiment, competitive use cases) |
| 11:53 | Customer Experience Measurement Evolution |
| 16:04 | Benefits & value propositions |
| 30:10 | Funding sources & COSMOS overview |
| 39:09 | Web scraping techniques tour |
| 48:58 | Beautiful Soup demo |
| 55:46 | Selenium + Google Colab challenges |
| 60:00 | Extended scraping demonstrations & Q&A |

## Concept Highlights
### Business & Public-Sector Drivers
- Tactical vs. strategic responses to social chatter (e.g., manage angry tweets vs. shape product-roadmap decisions).
- Full customer-experience mapping (dealerships, apps, support) mirrors Toyota-style 360° philosophies.
- Governments adopt analytics to counter disinformation, monitor mobilization, and understand propaganda networks; COSMOS funding includes DoD agencies (Army, Navy, DARPA, Air Force, OSD, NSF, Arkansas Research Alliance).

### Analytical Stack & Data Prep
- Core techniques: NLP, ML (decision trees, clustering), demographic enrichment, sentiment/emotion tagging, toxicity detection, association mining, dashboards.
- Data-science workflow: define question → scope range → identify sources (YouTube, Facebook, X, Amazon reviews, news) → collect (scrape/APIs) → normalize and enrich before modeling.
- Importance of HTML/CSS/JS/JSON literacy for parsing raw scraped payloads.

## Web-Scraping Demonstration Notes
- **Requests library:** Some domains (GeeksForGeeks, UALR) returned HTTP 403 in Colab; Census.gov allowed GET with 200 response, illustrating need for target selection.
- **Beautiful Soup:** Used to prettify HTML, isolate containers/classes, and extract focused sections beyond the raw source dump.
- **Selenium:** Difficult to run in Google Colab without headless browser configuration; recommended running locally if dynamic pages require JS rendering.
- **lxml/XPath & urllib:** Alternative parsing/URL-handling tools; reliability varies per site.
- **Automation & Scheduling:** Demonstrated Python modules for scripted mouse interactions and cron-like scheduling to run scrapers on intervals.

## Assignment / Next Steps
1. Complete the week’s lab by implementing **one** scraping technique (from the linked tutorial or another reputable source). 
2. Capture a screenshot of both the code and its output; submit per course instructions.
3. Continue exploring additional libraries (Beautiful Soup, Selenium, lxml, urllib) and identify compliant target sites before scraping.
