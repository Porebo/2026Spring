# Think W3 - Debit & Credit Cards Data

## Parties involved

- Think W3, an online travel firm based in London, UK
- Think W3 customers

## Incident

Data breach involving 1.2 million credit and debit card details.

## Date

December 21, 2012

## Summary

On December 21, 2012, Think W3 was hacked after a coding error on the company's website enabled the hacker to bypass the authentication process for logging into the system using Structured Query Language injection, and log in to the website's administration interface. Using malicious web shells, the hacker obtained administrative access to all the data on the web server, which included the customer database and files used to process payment cards.

Think W3 internal investigation suggested the hacker used a custom file that would query the customer database to extract and decrypt stored cardholder data using the decryption key which was not stored securely on the web server. The hacker extracted credit and debit card primary account numbers, expiry dates, and other customer details associated to each card including customer name, address, postcode, mobile and home numbers, and email address. The hacker extracted a total of 1,163,996 credit and debit card records, of which 430,599 were identified as current and 733,397 as expired.

Think W3 discovered the breach in security on December 24, 2012 during a routine server check.

An investigation by the UK's Information Commissioner's Office (ICO) revealed that cardholder details had not been deleted since 2006 and there had been no security checks or reviews since the system had been installed. Think W3 also failed to properly understand the extent to which the web server could be accessed via the internet and to implement a suitable intrusion detection system for the website and server, file-integrity monitoring software, encryption key-management process, and security policy addressing technical security issues.

ICO's investigation determined Think W3 infringed the Seventh Data Protection Principle of the Data Protection Act 1998 (DPA) and imposed a fine of PS150,000.

# Social Security Numbers

## Parties involved

- Doritex Corp.
- Job applicants registered on Doritex website

## Incident

Data breach exposed social security numbers of over 500 job applicants.

## Date

June 22, 2015

## Summary

On June 22, 2015, Doritex, a uniform company based in Alden, NY, was alerted that information of job applicants that registered in its website could be found using a simple Google search. The company corrected the problem immediately; however, it did not notify the affected individuals or the Attorney General's office until July 21. General Business Law section 899-aa requires notice be provided to affected individuals and various government agencies "in the most expedient time possible and without unreasonable delay."

An investigation by the Attorney General's office found that Doritex's website and employment application portal was not secure and did not properly implement encryption technology, security deficiencies that enabled Google web crawlers to cache approximately 518 employment applications on its servers allowing anyone access for over a month.

On March 24, 2016, Attorney General Eric T. Schneiderman announced a settlement with Doritex and its website developer Kallus Opraments. The companies agreed to pay a total of $95,000 and improve their data security practices.

## Transcript

Hello, and welcome to Big Data University.

We are going to be going through the guiding principles for data privacy, and we'll be looking at the seven foundational principles of privacy by design.

A privacy breach occurs when there is unauthorized access to, or collection, use, or disclosure of personal information.

Such activity is unauthorized if it occurs in contravention of applicable privacy legislation such as PIPEDA or similar provincial privacy legislation.

Some of the most common privacy breaches happen when personal information of customers, patients, clients, or employees is stolen, lost, or mistakenly disclosed.

For example, a computer containing personal information is stolen, or personal information is mistakenly emailed to the wrong people.

What can companies do to protect themselves?

Companies should invest some time into creating privacy plans and privacy policies.

The Privacy Commissioner of Canada offers a free tool to help companies build a privacy plan. This service is free and is open to businesses from all over the world.

This is an example of a privacy policy, Twitter's privacy policy. It's been summarized in a word cloud on the left.

It is imperative that companies have privacy policies in the event of a breach.

Let's look at another privacy policy.

Facebook's privacy policy addresses the four pillars of data privacy thinking. It has statements surrounding collection, retention, use, and disclosure.

Let's look at some guiding principles for how companies should be thinking about data privacy.

## Privacy by design

Privacy by design is an approach to systems engineering, which takes privacy into account throughout the whole engineering process.

The concept is an example of value-sensitive design, that is, to take human values into account in a well-defined manner throughout the whole process.

PVD was first developed by Ontario's Information and Privacy Commissioner, Dr. Anne Kavokian.

These are the seven foundational principles.

1. Be proactive, not reactive. This anticipates and prevents privacy-invasive events before they even happen. Privacy by design does not wait for privacy risks to materialize, nor does it offer remedies for resolving privacy infractions once they have occurred.
2. Privacy as a default setting. Personal data are automatically protected in any given IT system. If an individual does nothing, their privacy still remains intact.
3. Privacy embedded into design. Privacy by design is embedded into the design and architecture of IT systems.
4. Full functionality. Accommodate all legitimate interests and objectives in a positive-sum, win-win manner. Privacy by design avoids the pretense or false dichotomy such as privacy versus security, demonstrating that it is possible to have both.
5. End-to-end security, full lifecycle protection. Privacy by design, having been embedded into the system prior to the first element of information being collected, extends securely throughout the entire lifecycle of the data involved.
6. Visibility and transparency. Assure all stakeholders that whatever the business practice or technology involved, it is in fact operating according to the stated promises and objectives.
7. Respect for user privacy. Privacy by design requires architects and operators to keep the interests of the individual utmost by offering such measures as strong privacy defaults.

## United Kingdom principles

The Data Protection Act in the United Kingdom sets out eight principles governing the use of personal information which we must comply with, unless an exemption applies.

1. Personal data shall be protected fairly and lawfully.
2. Personal data shall be obtained only for one or more specified and lawful purposes.
3. Personal data shall be adequate, relevant and not excessive in relation to the purpose or purposes for which they are processed.
4. Personal data shall be accurate and, where necessary, kept up to date.
5. Personal data processed for any purpose or purposes shall not be kept for longer than is necessary for that purpose or for those purposes.
6. Personal data shall be processed in accordance with the rights of data subjects under this Act.
7. Appropriate technical and organizational measures shall be taken against unauthorized or unlawful processing of personal data and against accidental loss or destruction of or damage to personal data.
8. Personal data shall not be transferred to a country or territory outside the European Economic Area, unless that country or territory ensures an adequate level of protection for the rights and freedoms of data subjects in relation to processing of personal data.

## Privacy complaints in Canada

Complaints to the Privacy Commission of Canada may take place in the following circumstances:

- If you feel that your personal information has been wrongfully collected, used or disclosed
- If you were refused access to your personal information
- If you feel there was an unreasonable delay in getting access to your information

To report a privacy breach in Canada, organizations must fill out a Privacy Breach Incident Report.

Further reading and resources relating to data privacy laws and data privacy guiding principles for a number of geographies are available on the Privacy Horizon website.

Happy learning!

Transcripts and captions are generated by AI and can be inaccurate.
