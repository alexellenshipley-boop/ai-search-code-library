# AI Search Code Library

The companion code library for *How to Rank Your Ecommerce Store #1 in AI Search* by Rowan Hart.

Every JSON-LD block, robots.txt template, Liquid snippet, PHP filter and code injection block referenced in the book is reproduced here as a separate file, organised to match the appendix numbering. To download the whole library at once, click the green **Code** button at the top of this page and select **Download ZIP**. To copy a single block, open the file in the browser and use the copy-raw-content button at the top right of the file view.

## What is in the library

| File | Section | Purpose |
|------|---------|---------|
| A.2-product-offer.json | Product and Offer schema | The foundation block for product pages |
| A.3-aggregaterating-review.json | AggregateRating and Review | Trust signals for products with five or more reviews |
| A.4-robots.txt | Universal robots.txt | Explicit allow-list for every AI bot worth allowing |
| A.5-llms.txt | llms.txt starter | Optionality layer; ship it anyway |
| A.6-organization.json | Organization with sameAs | The single most important on-site entity signal |
| A.7-imageobject.json | ImageObject | Confidence multiplier on filenames and alt text |
| A.8-speakable.json | Speakable | Voice-layer schema |
| A.9-shopify-product.liquid | Shopify Liquid Product template | Drops into sections/product-template.liquid |
| A.10-shopify-robots.txt.liquid | Shopify robots.txt.liquid | Overrides the platform default |
| A.11-woocommerce-product.php | WooCommerce PHP filter | Extends Yoast or RankMath defaults |
| A.12-woocommerce-robots.txt | WooCommerce robots.txt | Physical file for the WordPress root |
| A.13-faqpage.json | FAQPage schema | Discoverability layer |
| A.14-breadcrumblist.json | BreadcrumbList | Site-navigation block |
| A.15-person.json | Person schema | E-E-A-T binding for content authors |
| A.16-website-searchaction.json | WebSite with SearchAction | Site-level block |
| A.17-wikidata-template.md | Wikidata entity template | Minimum-safe-to-ship property list |
| A.18-core-web-vitals-checklist.md | Core Web Vitals checklist | Priority-ordered fix list with score sheet |
| A.19-squarespace-injection.html | Squarespace code injection | All blocks wrapped for code injection |
| A.20-wix-injection.html | Wix custom code | All blocks wrapped for the custom code panel |

## How to use a block

Three steps, in order.

1. **Open the file you need.** Click the filename in the list above. The browser shows the file contents. Use the copy-raw-content button at the top right of the file view to copy the full block to your clipboard.

2. **Replace the placeholders.** Anything written as `{{ PLACEHOLDER_NAME }}` is something you swap in. Read the inline comments next to each placeholder for guidance on the value to use.

3. **Validate before shipping.** Run the modified block through Google's Rich Results Test at *search.google.com/test/rich-results* and the Schema.org validator at *validator.schema.org*. Paste the block into Claude or ChatGPT and ask the model to flag inconsistencies between the schema and the live page content. The third step catches the kind of subtle drift the structured validators miss.

## How to download the whole library

Click the green **Code** button at the top of the repository page. Select **Download ZIP**. The ZIP contains every file in this library, ready to extract.

## Versioning and updates

Schema requirements drift. The UCP specification changed twice through 2026 and will change again in 2027. The CHANGELOG file in this repository logs every change to the library, with the date and the reason. If the book on your Kindle is from launch week and the library has moved since, the changelog tells you what is new and whether it affects your store. The book is the snapshot. This library is the live version.

## Licence

The code in this library is released under the MIT licence (see LICENSE). You may use it freely in commercial and non-commercial projects without attribution. The prose in the accompanying book remains the copyright of the author.

## A note on quotation marks

The JSON-LD files in this library use straight double quotes throughout, because JSON requires them. If you copy a block into a rich-text editor that converts straight quotes to curly ones, the schema will not validate. Paste through a plain-text intermediate step or re-type the quotes if your editor does this.

## Reporting issues

If you spot a bug in a block, a deprecated field, a new schema requirement or a platform change that should be reflected in the library, open an issue at the top of this repository. Include the file name, the line, and the source you are citing for the correction.
