# Prototype verification · 19 October 2026

## Scope and audit

The starting repository was a classic PHP theme with custom editor blocks, not a full block theme. It had no `theme.json` or `templates/*.html`. The conversion preserves the spacing scale, narrow/wide content principles, alternating button corners, editorial heading/lead roles, and reusable section approach. The old custom blocks, project/service/team post types and taxonomies, carousels, partner administration, video code, icon dependency, external fonts, branded assets, and PHP page templates were removed.

The result uses native WordPress block templates, 17 theme patterns, two template parts, one shared editor/frontend stylesheet, and small theme setup functions. No theme JavaScript or build dependency is needed. The local setup script created seven pages and set the local clone's title and static homepage. Existing sample content was preserved.

The Figma file was inspected through its integration: palette `2:49`, logo artwork `4:222`, symbol `2:16`, and the only top-level page `0:1` (Atoms). There were no page layouts or supplied font files. The local symbol SVG is the unmodified export from `2:16`. New illustrations are explicitly labeled code-native placeholders. The provisional text wordmark intentionally uses the requested “Allianz Therapietreue Deutschland” name.

## Completed checks

- All 20 PHP files passed `php -l`.
- `theme.json` parsed successfully; WordPress recognized the active theme as a block theme without theme errors.
- Read-only `scripts/verify.php` passed with `WP_DEBUG` enabled and full PHP error reporting, with no notices/warnings in the output.
- All 17 patterns, every HTML template, and the actual saved prototype page contents passed WordPress core's JavaScript block parser and save validation with zero invalid blocks. This used the installed WordPress 7.1.3 core block-library scripts in isolated headless Chrome. The native File block's missing `href` attribute was found and corrected during this check.
- Browser review covered the homepage at 1440, 820, 768, 390, and 320 CSS pixels, all six supporting content pages at desktop/mobile sizes, the standard single-post layout, and the 404 template: 19 page/viewport combinations.
- No horizontal document overflow, broken images, or uncaught JavaScript exceptions occurred in those checks.
- The only HTTP error in the browser run was the intentionally requested nonexistent page, which correctly returned 404 and displayed the theme's 404 layout.
- The native mobile menu opened, focused the first navigation link, and closed with Escape.
- Desktop hero height was 656 CSS pixels at 1440px width. It uses content height, not viewport-height sizing.
- Desktop, tablet, mobile, materials, and Award screenshots were visually inspected. Lead alignment and tablet footer wrapping were corrected after the first pass. `screenshot.png` is a fresh 1200 × 900 capture of this prototype.
- Runtime assets contain no old theme branding, external font URLs, legacy custom-block registrations, or temporary Figma URLs. All images are locally served.
- `git diff --check` passed.

The review used a temporary isolated Chrome profile. The in-app browser execution tool was unavailable in this session. No claim of a full accessibility audit or compatibility testing across all browsers is made; keyboard focus styles, a native accessible navigation block, responsive layouts, semantic landmarks, heading hierarchy, descriptive image alternatives, and reduced-motion handling are included.

## Still needed for publication

Approved brand lockup, any licensed custom fonts, final photography and infographic, reviewed copy, real PDF files, confirmed partner logos, contact details, legal content, Award conditions and schedule, and an integrated/tested form plugin with confirmation emails. The separate website briefing was not supplied. Current legal and Award content is explicitly provisional; the sample PDF contains no medical information. The existing WordPress “Hallo Welt!” post is still visible as sample content and should be replaced before publication.

## Editing correction

The front-page template now renders the selected homepage through core Post Content. The homepage sections were moved into the previously empty Startseite page body so normal Pages → Edit and the frontend Edit Page link work. No nonempty page content was replaced. The setup script also seeds the homepage body on new installs.

Three classic menu locations are registered: primary, footer-links, and footer-legal. This exposes WordPress's standard Appearance → Menus screen. Marked core Navigation blocks use WordPress's own classic-to-block converter at render time, so saves in the standard menu screen affect the frontend immediately. Native mobile navigation and submenus are retained. Footer text-link lists were replaced with Navigation blocks. Existing assigned menus remain untouched by setup.

A local verification temporarily changed a native menu item's title in each location, checked the rendered output, and restored the original title. All three locations passed. The homepage contains the expanded editable blocks rather than a template-owned pattern reference.

The actual local WordPress admin screens were opened and inspected: Pages → Startseite loads six editable section blocks without invalid blocks; Appearance → Menus shows the three native menus and their location assignments. Header and footer render four primary links and two footer Navigation blocks. All updated patterns, templates, and saved page content passed the core JavaScript block parser with zero invalid blocks.
