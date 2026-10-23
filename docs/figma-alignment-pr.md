# Suggested PR title

feat: align Allianz theme with refreshed Figma design system

## Description

The refreshed Figma system specifies DM Sans body/UI text, Alan Sans headings and quotes, semantic button states and curated Lucide icons. The theme previously used system body fonts, Alan paragraphs, component-specific heading sizes, 24px button corners and darkening gold interactions. This change aligns those foundations while retaining the native WordPress block architecture and editable page bodies.

- Preserve every existing palette, spacing, font-family, font-size and radius preset slug. Keep Deep Current, Vital Teal and Golden Hour unchanged. Add missing 4/12/64px spacing and 4/12/pill radius choices; retain existing fluid section spacing and intentional hero/media radii.
- Host Alan Sans 400/500/600/700 and DM Sans 400/500/600/700 locally with OFL licenses. Use verified responsive H1–H3 and semantic paragraph/quote styles; reconcile competing component declarations. H2 tracking is the verified 0.08px, not 0.08em.
- Provide native Primary/Secondary/Highlight Button styles, all five interaction states, pill geometry, keyboard focus and reduced-motion handling. Gold now becomes lighter while retaining inverse navy labels. Reuse the same state system for Kontakt, native File downloads and WPForms submit/page controls.
- Add 24 official Lucide 0.468.0 static SVGs with ISC license, optional button classes for left/right icons, a native button pattern and a whitelist-based accessible standalone shortcode. Retain the old mail asset URL for saved references. No icon runtime or custom Gutenberg block.
- Add an insertable native review pattern covering image hero/header overlay, three mission cards, button/icon variants, quote and a configured-form slot. Existing patterns update only future insertions.
- Keep current layout defaults 760/1240 and saved widths/Global Styles authoritative. Retain fluid gutters, menus, header/footer customization, news queries, reveal behavior, form settings and all editorial content.
- Document the pre-implementation mapping, direct Figma snapshot, editing workflow and separate optional saved-content migration. Exclude nested ZIPs from packaging.

## Validation

Official WordPress theme.json schema, 23 PHP syntax checks, reveal.js syntax, read-only WordPress smoke check (20 patterns), git diff --check and native serialization of 581 blocks passed. Static font weights/licenses and 24 SVGs were checked. Isolated Chrome verified the representative layout at 320–1440px, remaining type roles, 15 button variants, WPForms/Kontakt states, standalone icon sizes, keyboard focus, mobile menu, reduced motion and three existing pages. Enabled button text contrast is at least 7.10:1. Native-component previews using both Page Editor and Site Editor settings passed desktop/mobile parity checks. Authoring-record fingerprints matched before/after. See verification.md for measured details and limitations.

## Limitations and follow-up

Authenticated admin UI/inserter interactions, the actual WPForms editor block, successful submission/email delivery, other browsers and a full accessibility audit were not tested. The standalone icon Shortcode editor may display source; native button icons do preview through shared CSS. A searchable icon picker would require custom editor JavaScript and is deliberately not introduced. Native radius preset selection requires WordPress 6.9+, with numeric controls/default fallbacks on older supported versions.

No saved-content migration is executed or required merely to install the update. Adopting the review composition in an existing page, replacing saved literal arrows/typography overrides, changing saved widths to the proposed 720/1180 mapping, or inserting a configured form requires a separately authorized content migration. Approved imagery, final copy, contact/legal information and production form configuration remain editorial responsibilities. The referenced separate brief was absent; direct Figma inspection supplied the verified specification.

## Package and scope

Version 0.1.4. Build with `python3 scripts/package.py` after checks; output `/private/tmp/allianz-therapietreue-deutschland.zip`, with root directory `allianz-therapietreue/`. No upload, deployment, mainline change, PR or database import. The user's pre-existing ZIP move is excluded from source commits and left untouched.
