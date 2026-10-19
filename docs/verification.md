# Prototype verification · 19 October 2026

## Display typography

Alan Sans is registered through native `theme.json` font presets with two local static faces (normal 500 and 700) and its bundled OFL license. H1/H2 default to 700 and H3 to 500. Font family and weight use native Global Styles and block typography controls. Removed component weight rules from contact/footer headings so saved editor choices can take effect.

The WordPress smoke check and `git diff --check` passed. Live browser checks confirmed both local font files loaded, H1/H2 computed at 700, H3 at 500, and the body retained Arial/Helvetica/system sans. Chrome's rendered-font inspection confirmed the actual H1 glyphs use Alan Sans Bold. Hero/content alignment and absence of horizontal overflow passed at 2224, 1920, 1440, 768, 390, and 320 CSS pixels. The mobile screenshot was visually inspected. No saved content or Global Styles were changed.

## Hero background images

Alignment correction: removed the Cover inner container's extra horizontal padding and overrode core's forced centering of the hero copy. Live homepage measurements at 2224, 1920, 1440, 768, 390, and 320 CSS pixels confirmed identical left edges for the hero eyebrow, heading, button, mission text, and header wrapper. Background images remained full width and no horizontal overflow occurred. The mobile screenshot was visually checked; `git diff --check` passed. No saved page content was modified.

Theme version 0.1.2 explicitly enables native background image and size controls. The existing Group hero can use these controls; the additional **Hero · Hintergrundbild** pattern uses a native Cover with a replaceable decorative image, focal point controls, and a 70% navy overlay. Existing page content is preserved. The version bump refreshes WordPress's cached theme pattern list.

PHP lint, JSON parsing, `git diff --check`, and the read-only WordPress smoke check passed (18 patterns). WordPress core's JavaScript parser validated every theme pattern, template, and saved page with zero invalid blocks. An isolated headless Chrome preview of the new Cover pattern at 1440, 768, 390, and 320 CSS pixels showed no horizontal overflow or broken images; the background spanned the hero at every width. Desktop and mobile screenshots were visually inspected. This preview replaced markup only in browser memory, without saving page changes. The in-app browser execution tool was unavailable.

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
