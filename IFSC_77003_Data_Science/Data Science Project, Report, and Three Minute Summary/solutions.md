## Solution Statement

This project proposes an AI-assisted solution for preserving the institutional knowledge embedded in Tableau reports during migration to Spotfire after organizational transition. The central problem is not only the replacement of one visualization platform with another, but the risk of losing years of technical, operational, and decision-support knowledge encoded inside Tableau workbooks.

At Aera Energy, Tableau dashboards became more than visual reports. They captured business needs, SQL logic, filters, calculations, relationships between datasets, display choices, and operational interpretations developed over many years by engineers, geologists, technicians, and analysts. After the acquisition by California Resources Corporation, continued access to that knowledge remained necessary, but maintaining both Tableau and Spotfire created duplicate platform costs and operational inefficiency.

The proposed solution is to use AI as a discovery, extraction, and preservation layer before or during migration. Rather than relying on Tableau indefinitely as the only container of legacy knowledge, AI can inspect Tableau workbook artifacts and produce structured discovery packages that preserve the essential elements needed for future reconstruction in Spotfire.

In this solution framework, AI helps identify and document:

- workbook contents and package structure
- datasource names and field inventories
- embedded custom SQL and joins
- column mappings and flattened datasource logic
- filters, actions, and interaction behavior
- worksheet structure and dashboard layout clues
- what is safely known from the workbook
- what still requires human validation or manual inspection

This approach does not assume that AI can fully and automatically convert Tableau files into Spotfire dashboards with exact parity. Instead, it treats AI as a practical assistant that reduces the labor of reverse engineering, exposes hidden technical logic, preserves institutional knowledge in reusable documentation, and supports a more efficient human-led Spotfire rebuild process.

The intended outcome is that an organization can retire Tableau without losing essential analytical knowledge and without paying indefinitely for duplicate visualization platforms. The preserved discovery output can support migration planning, training, report prioritization, rebuild work, and continuity of decision support even after employee turnover or organizational acquisition.

In large-frame terms, the solution is an AI-assisted knowledge-preservation workflow that extracts the exact technical and analytical structure of Tableau reports into reusable migration artifacts so that enterprise knowledge can survive platform change without continued dependence on Tableau subscriptions.

## Example of What AI Can Already Do

An AI-generated discovery package for the Tableau workbook `New_InjCentered_Daily2_3957.twbx` demonstrates the feasibility of this approach.

From the workbook package alone, AI was able to identify and document:

- the packaged workbook and extract contents
- the datasource inventory
- worksheet and dashboard inventory
- Oracle named connections
- embedded custom SQL relations
- right-join logic between producer and injector datasets
- field mappings from joined relations into the Tableau datasource
- extracted business filtering patterns
- workbook fields and calculated fields
- shared-view filters and worksheet-level filters
- highlight actions and interaction behavior
- dashboard layout structure
- safe conclusions and unresolved items
- a recommended human workflow for Spotfire rebuild

This example shows that AI can already function as a technical discovery and documentation layer for Tableau migration work. Even when full automatic conversion is not possible, AI can preserve the structure and logic of a workbook in a form that reduces dependence on Tableau access and accelerates future reconstruction in Spotfire.

## Proposed Value

If applied systematically across many Tableau workbooks, this solution could provide:

- reduced duplicate software cost
- faster migration analysis
- improved preservation of institutional knowledge
- clearer rebuild requirements for Spotfire
- reduced dependence on retiring subject-matter experts
- better continuity of decision-support capability after acquisition or staff turnover

## Working Research Alignment

This solution aligns with the emerging research question:

How can an AI-assisted framework identify, extract, and preserve institutional knowledge embedded in Tableau reports to support migration to Spotfire without continued dependence on Tableau subscriptions?
