# A.17 — Wikidata Entity Template

The minimum-safe-to-ship Wikidata entry for an ecommerce brand. Below this set of properties, the entry is liable to be flagged as insufficient and deleted. Above it, the entry strengthens with every additional property.

## Label and description

**Label** — your brand's common trading name. Example: *Hedgerow & Hound*.

**Description** — one short line distinguishing the entity from anything else with a similar name. Typically country plus category. Example: *online retailer of natural pet skincare products, based in the United Kingdom*.

## Required properties

The safe minimum is six properties, each carrying at least one independent citation.

| Property | Code | Value | Notes |
|----------|------|-------|-------|
| Instance of | P31 | Q4830453 (business) or Q57305760 (online retailer) | Pick the more specific where it fits. |
| Country | P17 | Q145 for United Kingdom | Country of registration. |
| Inception | P571 | YYYY-MM-DD | Founding date. Companies House is accepted as a source. |
| Official website | P856 | https://yourdomain.com | The brand's primary domain. |
| Industry | P452 | Industry Q-ID | Q34657 (cosmetics), Q41390 (apparel), Q1183711 (food retail), and so on. |
| Headquarters location | P159 | City Q-ID | The city the brand operates from. |

## Recommended additional properties

Add these as the entry strengthens. Each one independently improves the retrieval layer's confidence in the entity.

- **Official name (P1448)** — the legal-entity name, where it differs from the trading name
- **Founded by (P112)** — founder Q-ID where the founder has their own Wikidata entry; founder name otherwise
- **Legal form (P1454)** — Q1361864 for a UK limited company; the equivalent for your jurisdiction
- **Logo image (P154)** — upload the logo to Wikimedia Commons first, then reference here
- **Subsidiary of (P749)** — where the brand is owned by a parent company with its own entry
- **Number of employees (P1128)** — a single recent figure with a citation
- **Operating area (P2541)** — where the brand ships, expressed as country Q-IDs
- **VAT number (P3608)** — UK VAT number where applicable
- **Companies House ID (P2622)** — UK companies; the eight-digit registration number
- **Crunchbase organisation ID (P2087)** — the slug from the Crunchbase URL
- **LinkedIn company ID (P4264)** — the slug from the LinkedIn URL

## Citations

Citations follow the format Wikidata expects. The reference property is **P248 (stated in)**, pointing to the source. Where the source is online, add **P854 (reference URL)** pointing to the live URL.

In priority order, the kinds of source Wikidata accepts:

1. Press coverage in named publications. Strongest. A Telegraph profile, a Forbes mention, a Wired feature.
2. Trade press. *Drapers*, *Retail Week*, *The Grocer*, *The Spirits Business*, *Cosmetics Business* and category-specific equivalents.
3. Companies House records. Accepted for legal-form, founding-date, registered-address and company-number claims. Not accepted for biographical claims.
4. Academic and industry analyst reports.
5. The brand's own website. Accepted only for the official-name and official-website properties. Not accepted for biographical or commercial claims about the brand itself.

## Worked example — Hedgerow & Hound

**Label**: Hedgerow & Hound
**Description**: online retailer of natural pet skincare products, based in the United Kingdom

| Property | Value | Citation |
|----------|-------|----------|
| P31 | Q57305760 (online retailer) | Companies House record |
| P17 | Q145 (United Kingdom) | Companies House record |
| P571 | 2022-03-15 | Companies House record |
| P856 | https://hedgerowandhound.com | Brand website |
| P452 | Q34657 (cosmetics) | Trade press article in *Pet Industry News* |
| P159 | Q1124413 (Frome) | Companies House record |
| P1448 | Hedgerow & Hound Ltd | Companies House record |
| P1454 | Q1361864 (limited company) | Companies House record |
| P2622 | 13892471 | Companies House record |

Nine properties, every one independently sourced. Above the safe minimum, comfortably inside the threshold for an entry that will not be flagged.

## Submission process

1. Create a personal Wikidata account at *wikidata.org*. Use a personal email, not a brand email.
2. Confirm the email; wait the required four days before the account is eligible to create new entities.
3. From the Wikidata homepage, click "Create a new item".
4. Enter the label and description.
5. Add the properties one at a time, with their values and citations.
6. Declare the conflict of interest on the entity's talk page. *Example: "I am the founder of this brand. I have created the entry to provide accurate baseline information and will not edit it further once it is established. I welcome corrections from independent editors."*

## What not to do

Do not edit the entity from a brand-affiliated account once it is created. Brand-edited entries get deleted at a high rate.

Do not add commercial language. Wikidata is not a marketing surface. "Award-winning", "leading", "premier" and the rest will be reverted within days, and repeated additions get the entity flagged.

Do not link to the entity from the brand's homepage Organization schema until it has survived four to six weeks without intervention from the editing community. Linking a freshly-created entity that subsequently gets deleted is a negative signal that takes months to recover from.
