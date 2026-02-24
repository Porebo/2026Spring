# HW-M2 Deliverables

## Task 1: Bulletin Board / Forum Research

### 1. Ars Technica Forum System: Civis

**Web Location for More Information:** The best place to find details on how the system functions is the Ars Technica Civis Help / FAQ section.

**Summary:** Ars Technica's forum system, known as Civis, is a long-standing community platform built on a heavily customized version of the phpBB software. It works by organizing technical and cultural discussions into specific "OpenForum" categories where "Arsians" (registered members) can post threads, reply to news articles, and send private messages. The system is characterized by its strict "Jedi" moderation hierarchy, a custom "Mojo" system that tracks user reputation and seniority, and a focus on high-quality, long-form technical discourse rather than short-form social media interactions.

---

### 2. phpBB

**Web Location for More Information:** The most comprehensive resource is the official phpBB About Page and their extensive Documentation and User Guide.

**Summary:** phpBB (PHP Bulletin Board) is a world-renowned, open-source forum software package written in the PHP scripting language that allows anyone to create and manage their own online community. It works on a client-server architecture where the software is installed on a web server (using a database like MySQL or PostgreSQL) to store and organize user-generated discussions into a "flat" message structure. Key characteristics include its massive library of user-created "extensions" and "styles" for customization, a powerful permission-based system that allows for granular control over user roles, and a robust set of security features like built-in anti-spam tools and 2-factor authentication.

---

### 3. Third Forum System (Your Choice): Discourse

**Web Location for More Information:** The most detailed technical and community information can be found at Discourse.org Features and the Discourse Meta community (their official documentation and support hub).

**Summary:** Discourse is a modern, 100% open-source forum platform reimagined for the smartphone era, moving away from traditional "pages" in favor of a dynamic, infinite-scrolling interface. It works as a Single Page Application (SPA) built with Ruby on Rails and Ember.js, featuring real-time updates that allow conversations to feel more like a live chat than a static message board. Its standout characteristics include a "Trust Level" system that automatically grants users more permissions as they participate positively, a mobile-first design that works natively in any browser, and "Just-In-Time" (JIT) loading that expands links and previews media automatically within the discussion flow.

---

## Socratic Questioning Session Transcript

**Topic:** Similarities and differences between Ars Technica Civis, phpBB, and Discourse forums

**Student:** (Ready to learn)

---

**AI (Teacher):** You've read that Ars Technica's Civis is built on a "heavily customized version of phpBB," while Discourse is built on Ruby on Rails and Ember.js with an "infinite-scrolling interface" instead of traditional pages. What do you think is the significance of this technical difference? In other words, when you're scrolling through a forum conversation, how might the way the software is built (page-based vs. infinite-scroll) affect your experience as a user differently?

**Student:** I like infinite scroll with newest on top.

**AI (Teacher):** That's a practical preference. But here's something to think about: If you were researching a technical problem and wanted to find a discussion from 3 years ago, would having the newest posts "on top" with infinite scrolling make that easier or harder compared to phpBB's traditional page structure (Page 1, 2, 3, etc.)? There's a difference between what feels smooth *right now* (newest on top, infinite scroll) and what helps you *find something specific from the past*. How do you think those two goals might conflict with each other?

**Student:** Some forums stop the post ability after the question has been answered with satisfaction while others may accumulate all the answers. I prefer those with an end because I have found others that an answer is just an emoji or something else that does not add value to the discussion.

**AI (Teacher):** Excellent observation! You've just identified something really important - it's not just about the *technology*, it's about *content quality and management*. This is crucial because you're touching on **moderation philosophy**. Now look at what you learned about each system:

- **Ars Technica Civis** has a strict **"Jedi" moderation hierarchy**
- **phpBB** has a **permission-based system** for granular control
- **Discourse** has a **"Trust Level" system** that automatically grants permissions

Which of these three systems do you think would be BEST at preventing the problem you described - where an answer gets diluted by emoji spam and low-value posts? And more importantly - why do you think that system's approach would work better?

**Student:** I like the Jedi moderation to keep it without distractions as in many others I had seen not just emojis but adds. When there is moderation then those are not possible or are under some control.

**AI (Teacher):** Excellent reasoning! You've identified something important: **active human moderation creates a controlled environment**. But here's the challenge: If Ars Technica requires strict Jedi moderation to maintain quality, what does that suggest about why they *need* that level of control in the first place? And then consider this: If Discourse relies on a "Trust Level" system instead of active Jedi moderators, do you think Discourse communities end up with more emoji spam and ads than Ars Technica - or do you think the Trust Level system actually prevents that problem differently? In other words - is strict *human* moderation (Ars Technica's approach) the *only* way to keep a forum clean, or could an *automated permission system* (Discourse) achieve similar results through a different method?

**Student:** (Session concludes here)

---

### Key Insights from Socratic Session

1. **User Experience vs. Discoverability:** Infinite scrolling prioritizes current engagement but may sacrifice historical accessibility
2. **Quality Control Philosophies:** Different systems use different strategies - active human moderation (Jedi) vs. automated reputation systems (Trust Level)
3. **Content Integrity:** Moderation (whether human or automated) is essential to maintaining discussion quality and preventing low-value contributions
4. **Design Philosophy Differences:** The choice between active moderation and algorithmic control reflects different assumptions about community behavior

---

## Task 2: University Website Evaluation

**University Site:** Universidad del Valle de Guatemala ([uvg.edu.gt](https://www.uvg.edu.gt/))

**Selected Dimension:** Credibility (Method 2: Breadcrumb Structure Analysis)

**Quantitative Evaluation Result:** 0%

- **Methodology:** Reviewed 5 core sub-pages (Admissions, Academic Faculties, Student Wellness, Research Centers, and Campus Info).
- **Finding:** 0 out of 5 pages utilized a traditional hierarchical breadcrumb trail (e.g., Home > Research > Center). The site instead uses a "hub and spoke" design with side menus and visual grids.

**Commentary:**

- **Results & Analysis:** The 0% score indicates that UVG does not follow the traditional architectural standard of visible navigational paths. While the site is highly professional, the lack of breadcrumbs makes it more difficult for external users to verify where an individual page fits within the university's institutional hierarchy at a glance.
- **Site Analysis:** The site is visually authoritative and modern, but it values "experience" over "transparency of structure." This can lead to a sense of being "lost" when arriving at a page deep in the site via a search engine, as there is no clear path leading back to the parent department.
- **Method Critique:** This method is a strong measure of **structural transparency**, but it is a poor measure of **overall credibility**. It penalizes modern, flat web designs that use sticky menus or interactive navigation instead of text-based trails. A perfect score would require an "old-school" library-style architecture, which may not represent the best experience for modern users.

---

## Task 3: Forum Quantitative Evaluation

**Forum Site:** Ars Technica OpenForum ([arstechnica.com/civis/](https://arstechnica.com/civis/))

**Selected Dimension:** Credibility / Authoritativeness (Breadcrumb Structure)

**Quantitative Evaluation Result:** 100%

- **Metric:** Presence and Path Accuracy of Breadcrumbs for hierarchical context.
- **Observations:** Unlike the university website (UVG), Ars Technica utilizes a modern XenForo-based breadcrumb system at both the top and bottom of every thread. This provides clear hierarchical context, satisfying the "Authoritativeness" metric.
- **Verified Path:** `Forums > Ars Lykaion > News & Discussion > [Topic]`

**Commentary:**

- **Suitability for Forums:** The breadcrumb approach works exceptionally well for forums because they are inherently hierarchical (Category > Sub-forum > Thread).
- **Effectiveness:** This method is more suitable for forums than for many modern university websites because forum users rely heavily on structural "drilling down" to find niche topics.
- **Recommendations:** For forums, I recommend adding a "Temporal Dimension" (time to first reply) or "Recency of Activity" to the evaluation, as the "Credibility" of a forum depends heavily on how active the community is, not just its layout.

---

## Task 4: HTML Demo Page

**Deliverable:** Separate HTML Demonstration Page ([demo.html](../../website/demo.html))

**Additions for HW2:**

- Added **15 new HTML command demos**, continuing from the previous set.
- **New Commands Added:** `<progress>`, `<meter>`, `<details>`, `<summary>`, `<mark>`, `<wbr>`, `<ruby>`, `<rt>`, `<rp>`, `<bdi>`, `<bdo>`, `<data>`, `<time>`, `<kbd>`, and `<samp>`.
- Total commands now numbered 1 through 45.
- Linked directly from the HW2 main page for accessibility.
