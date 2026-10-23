# Figma alignment map and implementation plan

Analysis completed before implementation on 23 October 2026. Branch: `feature/figma-design-system-alignment`, based on fetched `origin/main` (`d76670c`). The user's moved ZIP is pre-existing work and is excluded from source commits. No database or deployment changes are authorized here.

## Evidence and boundaries

Source: [Allianz Adhärenz, Atoms](https://www.figma.com/design/216VlC0GF4Y1wApMgvVbJY/Allianz-Adhaerenz?node-id=0-1). Read the page metadata, concrete typography/button/icon design contexts and screenshots, and used read-only Plugin API inspection to resolve aliases. `figma-design-system.json` records all 267 variables (including alias names), three collections, 26 text styles, 24 icon component sets and 15 button variants. Collections have one mode each. Main inspected specimens: typography `53:577`, buttons `71:256`, icons `89:339`; surrounding showcase metadata includes `53:93`, `53:717`, `53:875`, `53:1053`, `88:201`, `88:202`, `89:201`. Page-level design-context and variable-definitions calls could not resolve a selection; concrete nodes and Plugin API supplied the verified data instead.

The referenced separate `figma-alignment-brief.md` was not attached or present in this checkout. This analysis uses the supplied request, repository README/agents.md and direct Figma inspection. There is no verified new full-page composition to implement: retain existing hero, mission, news, header, footer and form architecture.

Classification key: **Aligned** = already aligned; **Source** = requires source-code update; **Migration** = requires explicitly authorized saved-content migration; **Specification** = requires further specification.

## Foundation and component mapping

| Figma token or component | Current WordPress equivalent | Target file or saved-content location | Proposed change / classification | Compatibility / migration implications | Verification |
| --- | --- | --- | --- | --- | --- |
| Deep Current / Vital Teal / Golden Hour | `primary` / `accent` / `warm` | theme.json palette | **Aligned**: retain #05416a / #039782 / #e7a219 and all existing palette slugs | Saved preset references keep resolving | Compare resolved palette |
| Semantic backgrounds, text, border | Existing curated 20 colors; navy body; mixed subtle surface | theme.json custom.surface, native styles | **Source**: use solid soft #acddd6 for subtle surfaces; retain navy foreground as an intentional compatible body default; use black preset when explicitly selected | No primitive palette expansion; body navy remains a valid accessible mapping | Contrast and computed styles |
| Semantic action colors | Primary hover teal; gold darkens and changes label | theme.json button defaults; shared CSS | **Source**: Primary navy → inverse; Secondary dark teal → teal-deep; Highlight gold → warm-mid → warm-soft, inverse label throughout; focus warm-dark | Visible state change per new specification; existing gold palette class and WPForms stay supported | All 15 variants, keyboard, disabled, contrast |
| Alan Sans heading/quote roles | Local 500/700; H2=700/H3=500; paragraphs Alan500 | theme.json font families/elements/blocks | **Source**: add verified local 400/600; H1=700, H2/H3=600; quotes400; default paragraphs DM400 | Retain `alan-sans`, `sans` and all size slugs; explicit saved font choices still win | Actual loaded font faces, editor/front end |
| DM Sans body, labels, navigation, H4–H6 | `sans` = Arial | theme.json `sans` family | **Source**: local DM400/500/600/700, optical size14 | Existing `sans` references now use intended DM family; preserve Alan500 asset for old saved choices | Local font metadata and browser rendered fonts |
| Spacing 4/8/12/16/24/32/48/64 | 20/30/40/50/60 = 8/16/24/32/48; fluid70/80 | theme.json spacing presets | **Source**: add10=4,25=12,65=64; retain existing presets and fluid section spacing | Existing section rhythm remains; all eight foundation values selectable | Merged settings and CSS |
| Widths720/960/1180/1440 | Native content760/wide1240; saved Global Styles may differ | theme.json layout; wp_global_styles | **Aligned** compatibility: retain native defaults. Recommended future mapping: writing720, optional medium960, site wrapper1180, optional wide1440 | **Migration** for approved saved widths; do not enforce all four as new runtime tokens or overwrite saved780/1180 | Compare saved and merged widths; no DB writes |
| Page padding16/32/48, breakpoints480/768/1200/1440 | Existing fluid gutter; core breakpoints599/781 | theme.json custom.layout.gutter; CSS | **Specification**: retain fluid gutter/core breakpoints until page-level responsive composition is approved; Figma reference documented in snapshot | Avoid unrelated page relayout; foundation type interpolates480–1200 | Responsive overflow/alignment |
| Radius0/4/8/12/16/24/pill999 | none0/small8/medium16/large24; media48/hero64 | theme.json radius presets | **Source**: add compact4/soft12/pill999; buttons use pill; preserve existing media and hero tokens | Existing slugs and explicit block radii survive; preset picker requires WP6.9+, numeric control remains | Merged presets and browser geometry |
| Button geometry | 16px bold, 24px corners, mixed padding | theme.json elements.button; shared CSS | **Source**: DM50014/20, 12px vertical/24px horizontal, gap8, min-height44, pill999; focus2px offset2 | Native per-block typography/padding/radius settings remain supported; styles/preset colors choose interaction system | Computed surface44, focus footprint52 |
| Primary/Secondary/Highlight styles | Default button and text-link style | functions.php registrations, CSS | **Source**: native named block styles; keep text-link and outline | No custom block, JS editor controls or new framework | Core parser/save validity |
| 24 Lucide icons, 16/20/24 sizes | Existing mail mask + literal arrows | assets/icons/lucide, CSS, functions.php, native patterns | **Source**: official lucide-static0.468.0 SVGs + ISC; one mask implementation, color inherits label; class selection on Button, shortcode standalone | Preserve old mail asset path as compatibility alias if needed; replace new-pattern arrows, do not rewrite saved copy | Asset count, licenses, SVGs, label accessibility |
| Figma icon selection/placement | Advanced Additional CSS classes + pattern inserter | README; button patterns; shortcode | **Source**: `at-icon-NAME` plus optional `at-icon-right`, reusable mail/download patterns; `[allianz_icon]` standalone | Full visual searchable picker would require editor JS/custom block: recommend native patterns/classes first; shortcode preview limitation documented | Frontend and editor CSS parity, valid whitelist |
| WPForms buttons | Existing CSS override, configured plugin | shared CSS only; existing plugin-owned content | **Source**: reuse Highlight state variables for submit, Next/Previous controls; preserve actual plugin behavior | No form config, submission, email, IDs or content changes; disabled links are not made functional by CSS | Existing real form styles and in-memory controls |
| Image hero + header overlay + mission cards | Native Cover, Group/Columns patterns; header template part | existing patterns; new review pattern | **Source**: representative insertable review composition, three button styles/icons and plugin slot; retain native content/header behavior | **Migration** to adopt in a saved page. Updating PHP patterns does not update inserted copies | Unsaved review browser/editor rendering |
| Existing page bodies, menu assignments, Site Editor header/footer, Global Styles, news queries | Native posts/options/wp_template/wp_global_styles | Database | **Aligned**: preserve all saved records | **Migration** only by separate explicit authorization; no setup/import scripts | Read-only smoke/serialization checks; record limitations |

## All 26 text styles

All tracking values below are **pixels**, including H2's 0.08px and Eyebrow's 0.04px. These are not percentages/em. H1–H3 and Quote-XL interpolate between verified mobile and desktop endpoints over 480–1200px; other roles use specified desktop sizes and wrap naturally. Native size presets are the common editor scale; paragraph/quote block styles carry family, weight and line-height together. Developer-maintained role tokens live in `settings.custom.type`, not 26 new font-size picker entries.

| Figma style | Font / weight | Size / line (px) | Tracking (px) | WordPress mapping / target | Class |
| --- | --- | --- | --- | --- | --- |
| Display/Large | DM Sans 700 | 64 / 76 | 0 | theme.json + CSS: paragraph style display-large | Source |
| Display/Default | DM Sans 700 | 56 / 64 | 0 | theme.json + CSS: paragraph style display-default | Source |
| Display/Highlight | DM Sans 600 | 40 / 48 | 0 | theme.json + CSS: paragraph style display-highlight | Source |
| Display/Quote | Alan Sans 400 | 32 / 32 | 0 | theme.json + CSS: core/quote default | Source |
| Display/XL | DM Sans 700 | 72 / 96 | 0 | theme.json + CSS: paragraph style display-xl | Source |
| Display/Quote-XL | Alan Sans 400 | 64 / 76 | 0 | theme.json + CSS: quote style quote-xl (fluid) | Source |
| Display/Quote-L | Alan Sans 400 | 40 / 48 | 0 | theme.json + CSS: quote style quote-l | Source |
| Display/Quote-SM | Alan Sans 400 | 24 / 30 | 0 | theme.json + CSS: quote style quote-sm | Source |
| Heading/H1 | Alan Sans 700 | 56 / 64 | 0 | theme.json + CSS: h1 / display preset (fluid) | Source |
| Heading/H2 | Alan Sans 600 | 40 / 40 | 0.07999999821186066 | theme.json + CSS: h2 / heading-2 preset (fluid) | Source |
| Heading/H3 | Alan Sans 600 | 32 / 40 | 0 | theme.json + CSS: h3 / heading-3 preset (fluid) | Source |
| Heading/H4 | DM Sans 600 | 24 / 32 | 0 | theme.json + CSS: h4 | Source |
| Heading/H5 | DM Sans 600 | 20 / 30 | 0 | theme.json + CSS: h5 | Source |
| Heading/H6 | DM Sans 600 | 18 / 28 | 0 | theme.json + CSS: h6 | Source |
| Heading/H3-Mobile | Alan Sans 600 | 24 / 32 | 0 | theme.json + CSS: h3 lower fluid endpoint | Source |
| Body/Large | DM Sans 400 | 18 / 28 | 0 | theme.json + CSS: paragraph style body-large | Source |
| Body/Default | DM Sans 400 | 16 / 24 | 0 | theme.json + CSS: body / paragraph default; body preset | Source |
| Body/Small | DM Sans 400 | 14 / 20 | 0 | theme.json + CSS: paragraph style body-small; small preset | Source |
| Lead | DM Sans 600 | 18 / 28 | 0 | theme.json + CSS: See semantic role in shared CSS | Source |
| Label/Default | DM Sans 500 | 14 / 20 | 0 | theme.json + CSS: label style label-default / button | Source |
| Label/Small | DM Sans 500 | 12 / 16 | 0 | theme.json + CSS: label style label-small | Source |
| Eyebrow | DM Sans 700 | 20 / 30 | 0.03999999910593033 | theme.json + CSS: See semantic role in shared CSS | Source |
| Heading/H1-Mobile | Alan Sans 700 | 40 / 48 | 0 | theme.json + CSS: h1 lower fluid endpoint | Source |
| Heading/H2-Mobile | Alan Sans 600 | 32 / 40 | 0.07999999821186066 | theme.json + CSS: h2 lower fluid endpoint | Source |
| Display/Quote-Mobile | Alan Sans 400 | 40 / 48 | 0 | theme.json + CSS: quote-xl lower fluid endpoint | Source |
| Body/Bold | DM Sans 600 | 16 / 24 | 0 | theme.json + CSS: paragraph style body-bold | Source |

## State matrix

| Style | Default / Focus background | Hover / Active background | Label | Disabled |
| --- | --- | --- | --- | --- |
| Primary | primary #05416a | inverse #021523 / inverse #021523 | white | border #d0d0d0 / white |
| Secondary | accent-dark #026456 | teal-deep #01322b / teal-deep #01322b | white | border #d0d0d0 / white |
| Highlight | warm #e7a219 | warm-mid #efc267 / warm-soft #f7e0b3 | inverse #021523 | border #d0d0d0 / white |

Focus uses warm-dark #986b10 with a white 2px separation. Disabled controls are exempt from WCAG text-contrast requirements. `aria-disabled` styling alone does not prevent a link from navigating; use a native disabled button or omit the destination when the action is unavailable.

## CSS and saved-content precedence audit

Remove conflicting hero h1 desktop/mobile sizes/line heights, news-card h3, contact/footer heading sizes, download-card heading line height and mission paragraph line-height overrides. These currently defeat native heading/body defaults. Reconcile existing WPForms and warm-state rules in place rather than append competing implementations. Keep layout/editor-canvas/reveal CSS, heading margins, brand lockup typography and intentional media radii.

Native saved block styles, explicit inline typography/radius/padding, saved Global Styles and customized templates can override theme defaults; do not use broad `!important` declarations to force them back. Interaction colors need narrowly scoped important rules to beat native important palette classes and WPForms styling. Review existing literal Unicode arrows and explicit white/gold colors only during an approved content migration. They remain valid legacy content.

## Implementation sequence (approved source scope)

1. Commit this mapping and inspection snapshot before implementation.
2. Add licensed local font faces and verified official icons. Update foundations and native semantic typography/styles; keep existing presets and widths.
3. Reconcile one shared button state system, icon helpers, native styles/patterns and WPForms overrides. Add an insertable representative review pattern with native hero, mission cards and form-plugin slot. No saved page creation.
4. Run JSON/PHP/JS and WordPress smoke/serialization checks, contrast checks, responsive frontend and unsaved editor previews. Inspect screenshots; report unavailable authenticated editor checks honestly. Document migration proposal and PR summary.
5. Package only after checks using scripts/package.py, keep ZIP outside source/package recursion, make focused commits; no PR, push, deployment, setup or database import.

## Proposed saved-content migration — not executed

After separate approval: create a private review page from the new review pattern, choose approved photography, insert the actual configured WPForms block, and compare against a verified Figma page composition. Review any saved Alan paragraph/H2/H3 typography or old button radius overrides in Global Styles. Replace literal button arrows with curated icon classes if desired. Decide whether native writing/wide widths should become720/1180 and whether optional960/1440 wrappers and stepped gutters are needed. Apply approved changes to selected existing pages only, preserving all editorial copy and menu destinations. Header/footer edits remain in Site Editor. Never reset Global Styles or run setup to perform this migration.
