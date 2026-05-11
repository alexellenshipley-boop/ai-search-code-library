# A.18 — Core Web Vitals Quick-Fix Checklist

The priority-ordered list for getting an ecommerce store onto a clean Core Web Vitals profile in two weekends. Run PageSpeed Insights on the mobile homepage and the highest-margin product page. Record the four numbers below. Work through the priority list until the numbers move under the thresholds.

## The 2026 thresholds

| Metric | Threshold | What it measures |
|--------|-----------|------------------|
| TTFB | < 200ms | Time to first byte — server response time at the edge |
| LCP | < 2.0s | Largest contentful paint — typically the hero image |
| INP | < 200ms | Interaction to next paint — replaces FID |
| CLS | < 0.1 | Cumulative layout shift — dimensionless |
| HTML payload | < 1MB | Uncompressed size of the HTML document |

## Score sheet

Use this to record numbers before and after the work.

| Page | Metric | Before | After (week 1) | After (week 4) | Threshold met |
|------|--------|--------|----------------|----------------|---------------|
| Homepage (mobile) | TTFB | | | | Y / N |
| Homepage (mobile) | LCP | | | | Y / N |
| Homepage (mobile) | INP | | | | Y / N |
| Homepage (mobile) | CLS | | | | Y / N |
| Top product (mobile) | TTFB | | | | Y / N |
| Top product (mobile) | LCP | | | | Y / N |
| Top product (mobile) | INP | | | | Y / N |
| Top product (mobile) | CLS | | | | Y / N |

## The priority order

By yield per hour of work, in the order to do them.

**1. Move to a CDN if you are not on one.**
Cloudflare's free tier is sufficient for most stores under £500,000 annual revenue. Single biggest TTFB lever. Setup time: one to two hours.

**2. Convert hero images to AVIF or WebP.**
Shopify, Wix and most WooCommerce hosts auto-convert. Squarespace and older WooCommerce setups do not. ImageOptim or Squoosh handles the conversion in batch. Setup time: thirty minutes for the homepage and top ten product pages.

**3. Set explicit width and height attributes on every image.**
Eliminates CLS from late-loading images. Five minutes in the theme template.

**4. Lazy-load every image below the fold.**
`loading="lazy"` on the `<img>` tag. Native, no JavaScript required. Twenty minutes across a typical theme.

**5. Defer non-critical JavaScript.**
Cookie banners, chat widgets, review widgets, analytics. All of them carry a parse cost. Defer everything that does not need to fire before LCP. One to three hours depending on platform.

**6. Audit third-party scripts.**
Most stores carry between eight and twenty. Remove the ones not actively in use. Klaviyo, Meta Pixel, Google Tag Manager and TikTok Pixel are typically the heaviest survivors. One hour.

**7. Inline critical CSS.**
Above-the-fold styles in the `<head>` as a `<style>` block. The rest deferred. Cleanest path on Shopify and Squarespace is a theme-level fix. On WooCommerce, a plugin like Autoptimize or WP Rocket handles it. Two to four hours.

**8. Preload the LCP image.**
A `<link rel="preload" as="image" href="hero.jpg">` tag in the `<head>`. Cuts LCP by 200 to 600ms on most stores. Fifteen minutes.

**9. Upgrade hosting.**
SiteGround, Kinsta, WP Engine, Cloudways for WooCommerce. For stores still on shared hosting at £4 a month, the TTFB ceiling is roughly 600ms regardless of what else is fixed. One to two days for the migration.

## A note on which data matters

Run PageSpeed Insights again after each change. The numbers that matter are the field data from the Chrome User Experience Report, not the lab data. Lab data is a useful proxy. Field data is what Google and the AI retrievers consume.

PageSpeed Insights shows both at the top of the report. Field data appears as the four coloured tiles under "Discover what your real users are experiencing". Lab data appears below, under "Diagnose performance issues". When the two disagree, trust the field data.
