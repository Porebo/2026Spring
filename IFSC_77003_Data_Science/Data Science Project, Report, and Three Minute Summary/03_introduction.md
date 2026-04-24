## Topic Exploration Notes

Current topic of interest: conversion of Tableau reports to Spotfire.

Initial assessment:

This topic could qualify for the professor's expectations, but only if it is framed as a data science or analytics investigation rather than only a software migration task.

As stated, "conversion of Tableau reports to Spotfire" sounds more like a migration or BI implementation project than a data science investigation. The assignment expects:

- a clear question or objective
- data involved
- some analysis or evaluation
- methods that can be explained
- findings, discussion, and conclusions

Potential reframings:

- What are the main challenges and quality risks when migrating Tableau dashboards to Spotfire?
- How does dashboard migration from Tableau to Spotfire affect usability, performance, and analytical fidelity?
- Can a structured migration framework preserve business logic and visualization quality when converting Tableau reports to Spotfire?

What would make the topic fit well:

- using real example dashboards or a sample set
- defining evaluation criteria
- comparing before vs. after
- identifying patterns, failures, limitations, and best practices
- supporting claims with evidence rather than only opinion

What would make the topic weak:

- only describing migration steps
- no real dataset or comparison
- no measurable outcomes
- no research question beyond "how to do it"

Honest assessment:

Yes, this topic can potentially qualify, but only if it is positioned as an analysis of migration quality, challenges, methods, or outcomes, not just as a report conversion task.

## Case Foundation

Aera Energy LLC is an upstream oil production company based solely in California. It was formed in 1997 as a partnership between Shell Energy and ExxonMobil, with the two companies as owners. It was created as an LLC, so it did not use public funds.

At inception, the properties of the two companies were combined into a single business that operated independently of the owners. The company encompassed more than 10,000 oil-producing wells across multiple properties, from Coalinga south to La Brea in Los Angeles.

Roughly 90 percent of those wells required AOR or direct production-enhancement methods such as water injection, steam injection, and cyclical injection. The company employed around 1,400 full-time employees and worked with approximately 5,000 contractors who provided specialized services.

The employees were mostly professionals in petroleum engineering and geology. These professionals generally had at least a master's degree in their specialties and were supported by technicians with at least a bachelor's degree in their fields. Many of these employees were seasoned professionals with substantial experience.

Because of the scale and complexity of the operation, the company required large amounts of information for field operation, development, surveillance, and the planning and creation of new wells, all in support of sustained production.

As a new company in 1997, Aera started from scratch and built its own IT systems and databases. This created a situation in which significant operational data was spread across multiple separate systems. Over time, through both success and failure, the company gathered large sections of operational data into a centralized data warehouse built on Oracle database systems.

## Emerging Interpretation

The deeper topic may not simply be Tableau-to-Spotfire conversion. Based on the case foundation so far, the stronger academic framing may involve one or more of the following:

- how a large oil producer consolidated fragmented operational data into a warehouse
- how decision-making depended on reporting and analytics across complex field operations
- how BI and reporting tools supported production surveillance and engineering work
- what is gained or lost when analytic reporting moves from one platform to another

Possible project directions:

- Data integration angle: how consolidating siloed oilfield data improves operational analytics
- Decision-support angle: how reporting tools support petroleum engineering and surveillance decisions
- Migration angle: how converting reports from Tableau to Spotfire affects access, fidelity, usability, or decision support in a complex industrial environment
- Knowledge-management angle: how experienced technical staff rely on centralized analytics in a data-rich production environment

One promising draft research question:

How does migrating operational reports from Tableau to Spotfire affect analytical continuity and decision support in a complex upstream oil production environment?

Another broader possibility:

What factors most influence the effectiveness of enterprise reporting systems in supporting oilfield operational decision-making?

Current view:

The first question is more concrete and likely easier to execute well. The second feels more academic, but it may become too broad unless narrowed further.

## Expanded Operational and Reporting Context

The centralized data warehouse obtained information from several decentralized applications. ETL processes performed data extraction, data-quality checks, and posting into the warehouse.

One important source application was OpenWells, which centralized information about the mechanical structure of wells. This included construction components such as casing, cementing, directional survey information, and exact well locations.

Another major application was OpenWorks, a separate but related system used for geological knowledge creation and application. It included formation picks or tops, wellbore trajectory across underground formations, specialized logs generated by sophisticated underground equipment, and surveys such as temperature, fluid level, and other specialized field measurements.

In addition to these two systems, several other applications also fed the warehouse. Once data became available in the warehouse, technicians performed data extractions and made the information available to professional workers, mostly in Excel.

Over time, the company acquired more properties, increasing its inventory from roughly 10,000 wells to nearly 50,000 wells. Each well generated substantial information. As the scale of operations increased, the challenge became not only storing the information, but also concentrating it into data-visualization dashboards that could support business and technical decisions.

Tableau was introduced in 2008 to facilitate the creation of dashboards. Before Tableau, several other applications had been used and tested, but they were not very successful in meeting business needs. Tableau, however, became an immediate success for enterprise adoption.

During the Tableau adoption phase, specialized contractor data analysts joined the effort to demonstrate the tool and help build multiple Tableau dashboards. The creation of each dashboard began with a business need and relied heavily on input from domain professionals who had previously done much of the work in Excel.

As a result, a completed Tableau report represented more than charts and data. Each dashboard became a centralization of worker experience and domain knowledge, organizing information in a way that supported decision making from complex operational data.

## Refined Interpretation

This strengthens the idea that the project is not only about converting Tableau reports to Spotfire. A more meaningful framing is that the dashboards served as decision-support artifacts that encoded professional knowledge from engineers, geologists, and technicians.

That means the deeper question is not only whether Tableau reports can be rebuilt in Spotfire, but whether the analytical logic, operational context, and decision-support value embedded in those dashboards can be preserved during migration.

Two stronger draft research questions now emerge:

- How can the analytical and decision-support value embedded in Tableau dashboards be preserved when migrating to Spotfire in a complex upstream oil production environment?
- What are the main risks to analytical fidelity and decision support when migrating Tableau dashboards to Spotfire in a large upstream oil and gas enterprise?

Why this direction appears to fit the professor's expectations:

- it presents a clear problem and objective
- it involves real operational data systems
- it allows a literature review on data warehousing, business intelligence, visualization, knowledge management, and decision support
- it supports methods such as case analysis, dashboard comparison, migration criteria, and fidelity or usability evaluation
- it can lead to findings, discussion, and recommendations rather than only a technical build narrative

Current view after the additional story:

The topic is now stronger as a case-based investigation of knowledge preservation and decision-support fidelity during BI platform migration. This appears to be a much better academic fit than treating the project as a simple software conversion exercise.

## Tableau as Enterprise Knowledge Infrastructure

Tableau's success spread rapidly because it reflected the expertise and knowledge of many professional workers who were focused on solving real business problems, supporting continuity of operations, and ensuring planning and controls.

A major element of this work involved regulation from California state agencies, which by law required extensive well-related information. Tableau made access to that information much easier.

For a manager responsible for operations and surveillance of a field with more than 5,000 wells, a dashboard became a central decision-making tool. It did not only display graphs, but also supported access to real-time data relevant to operations and compliance.

Over time, the specialized contractor data analysts who initially helped establish Tableau reporting became full-time employees and began teaching others across the company community how to build Tableau reports. After a few years, several technicians specialized in building these reports.

As time passed, the initial dashboards created by the founding generation of workers were transferred to new employees as the founders retired or moved on for other natural reasons. These reports were not static. New workers, trained with more current knowledge, extended them by integrating new methods and techniques.

In one example, a professional engineer attended a conference, learned a method for calculating geological formation pressure, and that newly acquired knowledge was soon transformed into a Tableau report. In this way, much of Aera Energy's technical expertise became embedded in Tableau through queries, specialized formulas, displays, filters, and other report logic that directly supported business needs.

## Organizational Transition and Knowledge Risk

The oil industry is difficult to predict because it faces substantial variability in the price of its single product: oil. Despite all of its specialized technical knowledge, Aera Energy ultimately sold only one product.

The ups and downs of oil prices, together with the company's relationship to its global parent companies, eventually led to the end of Aera as an independent organization when it was sold to California Resources Corporation in 2025.

By that time, many years had passed since the company's inception. Most of the founder-generation workers were gone, and newer generations had largely followed the lead established by the founders. That lead did not leave behind extensive books or volumes of formalized knowledge. Instead, much of the transfer occurred through mentorship and forms of tribal knowledge, where experienced workers taught newer employees how things were done.

Even so, a solid foundation of knowledge remained encoded in more than 1,000 Tableau reports across the enterprise.

## Stronger Research Framing

This sharpens the project from a dashboard-conversion topic into a case study about institutional knowledge preservation and decision-support continuity during business intelligence platform migration.

The underlying issue is no longer simply how to convert dashboards. It is how one of the main repositories of organizational knowledge can be translated, protected, or potentially degraded during major organizational transition.

A stronger draft research question is now:

- How can institutional knowledge embedded in enterprise Tableau dashboards be identified, evaluated, and preserved during migration to Spotfire after organizational transition in an upstream oil production company?

Additional alternatives:

- What risks does Tableau-to-Spotfire migration pose to institutional knowledge and decision-support continuity in an upstream oil production enterprise?
- How can institutional knowledge embedded in Tableau dashboards be preserved when migrating to Spotfire in a complex upstream oil production environment?

A possible paper title:

- A case study of institutional knowledge preservation during business intelligence platform migration in an upstream oil production enterprise

Current view after this stage of the story:

The topic now has strong academic and practical grounding. It connects data systems, visualization, regulatory demands, mentorship-based knowledge transfer, organizational memory, acquisition, and platform migration into one coherent case. This appears to fit the professor's expectations well if it is supported with a clear method, evidence, and analysis.

## CRC Transition and the Liminal Migration Space

Once California Resources Corporation took control of the former Aera operation, access to the knowledge encoded in Tableau reports became paramount. Those reports provided a map to foundational operational data in the much larger data warehouse, guidance on how to perform calculations on source data, how to display information, and how to represent many business-specific variations developed over years of operating thousands of wells now owned by CRC.

At the same time, a major challenge emerged. Most CRC employees had little or no skill in Tableau because CRC had long operated with Spotfire as its primary analytics and visualization platform.

For roughly the first six months after CRC assumed ownership of Aera, many Tableau reports continued to be used, mostly by former Aera employees. But from a larger planning perspective, CRC could not justify sustaining subscriptions to two separate data-visualization platforms because of cost and duplication.

This created a liminal space. Tableau reports could not simply be discarded because they represented concentrations of technical knowledge expressed in numbers, formulas, filters, visual structure, and business logic. Yet the conversion of Tableau reports into Spotfire was laborious because the two applications differed significantly in data inputs, internal processing, and report construction.

## Hidden Technical Structure of Tableau Reports

From the user perspective, Tableau reports were easy to use because a single dashboard could contain multiple visualizations and filters that allowed direct interaction with the data. For professional workers, this meant needed information was available quickly and in a familiar decision-support form.

Behind the scenes, however, each Tableau report was generated through the interaction of multiple SQL queries. Crafting each query required many hours of cooperation between the professional workers who requested the report and the technical worker who translated those requirements into SQL code.

No report existed without a champion or team requesting it. This means each report reflected both a real business need and the technical interpretation required to transform that need into usable data structures.

Once those behind-the-scenes elements were fully understood, the embedded knowledge could in principle be expressed as data columns and rows useful for presentation in another application, including Spotfire. But gaining access to that knowledge required substantial reverse engineering.

That reverse-engineering process involved:

- downloading the original Tableau report from the server
- opening the report and locating its queries
- reconstructing formulas and calculation logic
- back-engineering the visualizations and filter behavior
- understanding the report's business purpose and decision-support role

The research and duplication effort was substantial. In practice, it was estimated that a technical worker needed between 4 and 8 weeks to research the contents of a Tableau report and duplicate it in Spotfire.

## Further Refined Research Direction

This makes the migration challenge not only one of visualization conversion, but one of knowledge extraction, interpretation, and reconstruction.

A stronger research-question direction now is:

- What framework can be used to identify, extract, and preserve institutional knowledge embedded in Tableau reports during migration to Spotfire in a post-acquisition upstream oil production environment?

An additional supporting sub-question could be:

- What report characteristics most strongly affect the labor and complexity required to migrate Tableau dashboards to Spotfire?

Current view after this addition:

The project now has a stronger bridge between the case narrative and the research method. It identifies where the knowledge lives, why migration is difficult, and why this work can be studied as more than a simple software rewrite.
