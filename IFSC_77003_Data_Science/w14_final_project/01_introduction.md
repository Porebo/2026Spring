# Part 1: Introduction

## 1.1 Background and Motivation

Business intelligence platforms in data-intensive industries, such as upstream oil exploration and production, serve not only to display information but to encode the operational knowledge of their workforces (Banerjee et al., 2025; Cogan et al., 2025; Zierz & Lordsleem Junior, 2026). When organizational change forces a platform migration, the risk is not simply one of software conversion. It is the potential loss of institutional knowledge accumulated over years within reports, queries, and visualizations developed by domain experts (Banerjee et al., 2025; Panichelli, 2022). This paper examines that risk through a real-world case involving a large upstream oil production company and its post-acquisition migration from Tableau™ to Spotfire™.

Aera Energy LLC was an upstream oil production company focused solely on California. It was formed in 1997 as a joint venture between Shell Oil Company and ExxonMobil, structured as a privately held LLC rather than a publicly traded entity. Although owned by these major companies, Aera operated as a standalone organization with its own workforce, systems, and decision-making processes. In an operational context, it was not integrated into the global structures of its parent companies and instead operated with its own resources and infrastructure rather than as a directly integrated subsidiary.

At its peak, the company managed nearly 50,000 wells and employed approximately 1,400 professionals in petroleum engineering, geology, and operations, supported by roughly 5,000 contractors. The scale and complexity of the operation required centralized data management. Over time, Aera consolidated information from multiple decentralized field systems into an Oracle-based data warehouse, from which technicians extracted and delivered data to professional users.

In 2008, Aera adopted Tableau™ as its enterprise data visualization platform. Earlier tools had not met the company's needs, but Tableau™ was rapidly adopted because it allowed domain professionals to translate operational experience directly into dashboard logic. Each completed Tableau™ report represented more than a visual output. It encoded domain-specific knowledge built through collaboration between engineers and analysts: SQL queries, regulatory compliance logic, and production surveillance methodologies. It also captured geological calculations and business-specific display structures refined over many years (Banerjee et al., 2025; Cogan et al., 2025). In this way, the Tableau™ report inventory became one of the primary repositories of Aera's accumulated operational expertise.

In 2023, Aera was sold to a financial buyer without direct operating experience in oil and gas, and its existing operational structure was largely maintained to ensure continuity. In 2025, the assets were subsequently acquired by California Resources Corporation (CRC), a company with extensive experience in California oil operations. By that point, more than 1,000 Tableau™ reports existed across the enterprise.

## 1.2 Problem Statement

CRC's standard analytics platform was Spotfire™, not Tableau™. Following the acquisition, the company faced a decision: maintain two parallel visualization platforms at significant cost and duplication, or migrate the Aera Tableau™ inventory into Spotfire™ and retire Tableau™. The migration path was selected, but it exposed a critical and initially underappreciated challenge.

Each Tableau™ report required substantial reverse engineering before it could be reproduced in Spotfire™. The platforms differ significantly in data handling, query construction, and visualization logic. A technical worker had to download the original file and identify each embedded SQL query. Formulas and filter logic then had to be reconstructed, and the report's operational purpose had to be understood before rebuilding could begin in Spotfire™. In practice, the estimated effort per report ranged from four to eight weeks.

Beyond technical complexity, many original report authors had retired or departed. Knowledge transfer had occurred primarily through mentorship and informal training rather than formal documentation — a pattern consistent with how organizations transmit tacit knowledge when explicit codification is absent (Schreiber et al., 2011). As a result, Tableau™ reports had become the primary surviving artifacts of much of Aera's specialized domain knowledge.

## 1.3 Practitioner Perspective and Study Scope

This paper is written from a practitioner perspective. The author served as project team lead for the Tableau™-to-Spotfire™ migration effort, responsible for translating management direction into execution, overseeing production, coordinating between technical staff and operational stakeholders, and maintaining progress across a complex and iterative workflow. This role provided direct visibility into both the technical challenges of migration and the organizational dynamics influencing the effort.

The analysis is structured as a case study grounded in that experience. The scope includes the migration process as encountered in practice and the knowledge embedded in selected reports. It also covers the methods used to extract and reconstruct that knowledge, and the implications for analytical continuity and decision support.

## 1.4 Research Questions

This project is guided by the following primary research question:

**How can institutional knowledge embedded in enterprise Tableau™ dashboards be identified, extracted, and preserved during migration to Spotfire™ in a post-acquisition upstream oil production environment?**

A supporting sub-question addresses migration complexity:

**What report characteristics most strongly affect the labor and risk involved in migrating Tableau™ dashboards to Spotfire™?**

## 1.5 Significance

The Tableau™-to-Spotfire™ migration at the former Aera operation is not an isolated case. Business intelligence platform migrations are a common outcome of mergers, acquisitions, and cost consolidation decisions across industries (Zierz & Lordsleem Junior, 2026). In data-intensive organizations, degradation of analytical fidelity during such transitions can directly impact operational decision-making and diminish organizational effectiveness (Banerjee et al., 2025; Panichelli, 2022). This study provides a practitioner-grounded analysis of how institutional knowledge is preserved or lost during migration, and what factors determine whether decision-support capability is maintained.

## 1.6 Paper Organization

The remainder of this paper is organized as follows. Part 2 reviews relevant literature on knowledge management, business intelligence systems, organizational memory, and platform migration. Part 3 describes the research design, data sources, and methods. Part 4 presents the analysis of selected Tableau™ reports and their migration outcomes. Part 5 discusses implications for institutional knowledge retention, analytical fidelity, and migration strategy. Parts 6 through 8 present conclusions, references, and supplementary materials.

