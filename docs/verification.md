# Theme verification

## Header logo contrast · 23 October 2026

The existing white compact logo now displays its matching uploaded color artwork on pages without an opening image hero. The original white image remains over the hero. The color SVG is copied unmodified into the theme; shared CSS uses the same opening-hero condition as the header overlay. The saved header Image block, source URL, dimensions and other replacement artwork remain unchanged. The editor uses the same shared styling. No database changes occurred.

Read-only WordPress smoke and git diff --check passed. Isolated Chrome checked homepage, Info-Materialien and Award at 1440/390px: correct white/color variants, unchanged 130px logo width and aspect ratio, no overflow. Desktop light-header and mobile hero screenshots were visually inspected. A temporary different source image correctly bypassed the variant rule. Authenticated editor UI was not checked; the in-app execution tool remains unavailable.

## Figma design-system alignment · 23 October 2026 · v0.1.4

Completed on `feature/figma-design-system-alignment`, based on fetched `origin/main` (`d76670c`). The [alignment map](figma-alignment-map.md) and [inspection snapshot](figma-design-system.json) were committed before implementation. Direct Figma reads verified 267 variables/aliases in three collections, all 26 text styles, the 15 button variants and 24 icon component sets. The separate referenced alignment brief was not supplied; direct inspection provided the values. No page-level redesign was inferred from the foundation showcases.

Source checks passed: official WordPress 6.9 Draft 7 JSON Schema validation of theme.json; PHP syntax for all 23 PHP files; JavaScript syntax for reveal.js; git diff --check; read-only WordPress smoke check with 20 registered native theme patterns. Core's installed JavaScript block parser validated 581 blocks across every theme pattern/template, the saved pages and the expanded review pattern with zero invalid blocks. A non-native download attribute on a new Button was removed during validation; downloads remain native File blocks or ordinary PDF links.

Font checks verified the OS/2 weight and static face tables for all eight local TTFs. Alan 400/600/700 and DM 400/500/600/700 loaded in Chrome; legacy Alan 500 remains registered for saved choices. Chrome's rendered-font inspection confirmed actual H1 glyphs use AlanSans-Bold. All 24 official Lucide 0.468.0 SVGs parsed, use the verified 24-unit grid/stroke 2 and include the upstream ISC license; both font families include their OFL licenses.

The review pattern was rendered only in browser memory, with the existing configured WPForms form cloned into its native form slot for CSS inspection. It contains the image hero, three native mission Groups, three button styles, left/right icons and a quote. No pattern was inserted into a saved page. At 1440/1200/960/768/480/390/320px, the hero spanned the viewport, hero/mission left edges matched, and no horizontal overflow or broken images occurred. Desktop H1/H2/H3 measured 56/64,40/40,32/40px; at 480px and below they measured 40/48,32/40,24/32px. The quote and remaining semantic roles, including H4–H6, matched their verified specimens. Testing also included WordPress's generated on-demand block styles loaded after theme CSS; semantic paragraph weights retained their intended values. WordPress's h1 custom key becomes `h-1` in generated variables; references were corrected and rechecked.

All 15 button variants were checked through computed default/hover/active/focus/disabled states. Primary, Secondary and Highlight surfaces measured 44px high, pill 999px, DM 500 at 14/20, padding 12/24 and icon 16. Focus measured 2px solid #986b10 at 2px offset with white separation (52px total footprint). Kontakt, real WPForms submit and temporary Next/Previous controls matched the same shared system. Native and ARIA-disabled controls used neutral styling; labels remained visible. Enabled text contrast ratios: Primary 10.66:1 default and 18.52:1 hover/active; Secondary 7.10:1 and 14.07:1; Highlight 8.45:1 default,11.09:1 hover,14.34:1 active. Focus ring versus white separation is 4.72:1. Disabled white/gray contrast follows Figma and is exempt for genuinely disabled controls. Bright accent teal with small white text is not a recommended editor combination; use Secondary's dark teal. A disabled-looking link still needs real interaction handling.

Reduced-motion emulation returned zero transitions for native buttons, Kontakt and every WPForms control. Keyboard Tab reached the skip link with visible focus; the native mobile menu opened and closed with Escape. Standalone icons measured 16/20/24px and meaningful labels remained present; unknown shortcode names return nothing. Existing homepage, Info-Materialien and Award passed desktop/tablet/mobile checks at 1440/768/390/320px with no uncaught JavaScript exceptions, overflow or broken images. Opening-image pages retained the absolute transparent header; supporting pages retained normal header flow and both footer menus. The form's validator remained loaded, visible fields retained labels and required fields exposed invalid state; no submit or email was triggered.

Editor parity used the installed BlockEditorProvider/BlockList and WordPress-transformed styles with read-only page-editor and core/edit-site settings. Both contexts passed 1440/768/390/320px checks for full-width heroes, shared left alignment, heading families/weights/sizes, 14/20 button labels, pill radii and icon masks. The ordinary writing-width control remained the saved 780px. Desktop/mobile frontend and both editor-context screenshots were visually inspected. These were isolated unsaved native-component previews, not authenticated admin UI sessions; the logged-in Page Editor/Site Editor chrome, inserter interactions and real WPForms editor block were not exercised. The Shortcode block may show source rather than a live icon. The in-app browser execution tool was unavailable; an isolated headless Chrome profile was used instead. No cross-browser or full accessibility audit is claimed.

A read-only fingerprint of authoring records (pages, posts, templates, template parts, Global Styles and menu items), menu assignments and homepage/theme settings matched before/after preview work. Existing user ZIP moves were preserved. No setup script, database import, content migration, form configuration, PR, push or deployment occurred. The package script excludes nested ZIPs and its own output. Packaging passed after source validation: 94 files under the installable allianz-therapietreue/ root; ZIP integrity, theme.json, review patterns, documentation and all licenses passed; no nested archives or Git metadata. The new installable archive is produced outside the repository, leaving the user's moved archive untouched.


## Editor canvas widths · 21 October 2026

Added editor-scoped rules for root-level theme sections: remove the root's duplicate gutter, allow outer sections to fill the canvas, and retain the existing inner content constraints. Opening image heroes also preview the frontend header clearance. Ordinary writing layouts and saved Global Styles remain unchanged. No content was saved.

The installed WordPress post-editor source confirms a constrained fallback for nested Post Content templates. A local preview using the installed BlockEditorProvider/BlockList, actual saved homepage blocks, native block styles, WordPress-transformed theme styles, and the constrained root reproduced the issue: a 1440px canvas squeezed whole sections to the saved 780px writing width. After the fix, heroes spanned 1440/1040/780/390px canvases, inner content aligned across sections, and no horizontal overflow occurred. At 1440px, the mission grid used the saved 1180px wide width; the ordinary paragraph control retained 780px. Frontend dimensions still matched (1440px hero, 1180px grid, 130px content offset). Desktop and mobile preview screenshots were inspected. WordPress smoke and `git diff --check` passed.

The existing authenticated local editor session had expired, so the actual logged-in editor screen could not be inspected. These checks used an isolated unsaved preview of WordPress's editor components rather than a new authenticated session. The in-app browser execution tool was unavailable.

## Optional in-view reveals · 21 October 2026

Registered the optional `reveal` style for Group, Columns, Column, Image, Heading, Paragraph, and Cover blocks. The `at-reveal` class provides the same behavior without replacing another block style. A deferred, dependency-free frontend script uses IntersectionObserver; only opted-in elements below the viewport receive pending animation classes. Reveals run once. Mission-card delays are 0/100/200ms. Duration and distance are tokens (600ms/20px). Editor content, content before script enhancement, reduced-motion preferences, unsupported observers, keyboard focus, and printing retain visible content. Existing page content was not opted in or saved.

PHP lint, JavaScript syntax, the WordPress smoke check, registration checks for all seven block types, and `git diff --check` passed. Isolated Chrome at 1440px and 390px widths verified opt-in-only enrollment, pending/visible opacity and translation, mission-card stagger, one-time reveals, immediate visibility on keyboard focus, initial reduced motion, live changes to reduced motion, and unsupported-observer fallback. Both widths had no horizontal overflow. Tests added style classes and a temporary focus target only in browser memory. The in-app browser execution tool was unavailable.

## Hero minimum height and alignment · 21 October 2026

Added `settings.custom.layout.heroMinHeight` (`50rem`) and applied its generated CSS variable to the image hero. The Cover's row flex layout now aligns content vertically to the bottom and horizontally to the start; the existing content wrapper and bottom padding are preserved. Minimum height allows the section to grow with longer content. Native block-level inline height choices still take precedence.

The WordPress smoke check and `git diff --check` passed. Isolated Chrome checks at 1440, 820, 768, 390, and 320 CSS pixels confirmed an 800px minimum, bottom content gap matching section padding, unchanged left alignment, sufficient header clearance, and no horizontal overflow. Mobile navigation and the normal supporting-page header flow still passed. The desktop screenshot was visually inspected.

## WPForms button overrides · 21 October 2026

Extended the shared gold interaction rules to WPForms submit controls and page-navigation buttons. Added theme geometry/typography, removed the plugin's gradient overlay and duplicate focus decoration, and handled native/plugin/ARIA disabled states with immediate neutral styling. Only CSS changed; form behavior and content remain managed by WPForms.

Isolated Chrome checked the live submit button's default, hover, active, focus, and combined active/focus states with the plugin stylesheet loaded: the expected palette colors, 24px radius, no gradient, focus ring, and minimum 4.72:1 enabled-state text contrast passed. The live button's temporary `wpforms-disabled` state and representative Next/Previous buttons inserted only in browser memory used neutral disabled colors. Reduced-motion emulation returned zero-second transitions. No form submission occurred. `git diff --check` passed. The in-app browser execution tool was unavailable.

## Gold button states · 21 October 2026

Added explicit default, hover, active, focus-visible, and native disabled treatments for buttons carrying `has-warm-background-color`, shared between frontend and editor. Important color declarations override WordPress's important palette classes. All colors reference existing palette tokens. No content or Global Styles were changed.

Isolated Chrome computed-style checks confirmed gold/navy by default (6.66:1 text contrast), dark gold/white on hover (4.72:1), deep gold/white while active (11.54:1), and a visible focus ring both alone and combined with active. A temporary disabled native button rendered neutral colors and the disabled cursor. Reduced-motion emulation returned a zero-second transition. `git diff --check` passed. The in-app browser execution tool was unavailable.

## Radius presets · 21 October 2026

Added native Border Radius presets for 0, 8, 16, and 24px under `settings.border.radiusSizes`, with linked corners applying the selected value equally. Preserved the user's 24px button default and uniform hero radius. Remaining alternating CSS corner treatments now use equal radii on all corners; the Kontakt button matches the 24px button default. Existing media radius tokens and saved editor content remain intact. The preset picker requires WordPress 6.9+; numeric controls and literal/fallback defaults remain usable on older supported versions.

The WordPress smoke check and `git diff --check` passed. A read-only check of the merged WordPress settings found exactly the four requested presets and confirmed all four CSS variables were generated, including the zero-radius option.

## Transparent header · 20 October 2026

The header overlays an opening image hero, with a transparent background and no bottom border. The hero reserves header clearance through `settings.custom.spacing.header`; positioning is absolute, not sticky. Pages without an opening image hero retain normal header flow. The mobile navigation overlay retains its white background and dark links. No saved page or Site Editor content was modified.

The WordPress smoke check and `git diff --check` passed. Isolated Chrome checks at 1440, 820, 768, 390, and 320 CSS pixels confirmed the hero starts at y=0, copy clears the header, content alignment is preserved, and no horizontal overflow occurs. Mobile menus opened and closed with Escape. Scrolling moved the header out of view. A supporting page retained normal header flow without overlap. Desktop and mobile screenshots were visually inspected. The in-app browser execution tool was unavailable.

## Contact menu button

The primary Kontakt link receives a button class during native menu conversion; the existing label, destination, and database menu remain unchanged. A local decorative SVG mask inherits the link color. PHP lint, the WordPress smoke check, and `git diff --check` passed. Isolated Chrome checks at 1440, 1024, 820, 768, 390, and 320 CSS pixels confirmed one visible contact button, the original `#kontakt` destination and target, a minimum 44px height, keyboard focus outline, and no horizontal overflow. Desktop and settled mobile-menu screenshots were inspected.

## Shared token refactor

The `tokens` branch retains native WordPress presets and adds six custom values for gutter, hero/intro spacing, subtle surface, and two media radii. Repeated CSS spacing and small type sizes reference existing presets. Wrapper widths reference WordPress's layout variables. No preset slugs, page content, menus, or saved Global Styles were changed.

The WordPress smoke check (18 patterns) and `git diff --check` passed. Isolated Chrome compared the original and refactored CSS in the same loaded document on the homepage, Info-Materialien, and Award at 1440, 768, and 390 CSS pixels. All nine comparisons returned identical element geometry and sampled computed styles (padding, margin, gap, widths, backgrounds, radii, and typography), with no horizontal overflow. Comparing within one document excluded unrelated form-plugin initialization differences between separate page loads. The in-app browser execution tool was unavailable.

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
