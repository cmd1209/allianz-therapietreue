# Allianz Therapietreue Deutschland

Independent WordPress block theme, version 0.1.4. Requires WordPress 6.6+ and PHP 8.0+. No build step, JavaScript bundle, required plugin, external font service, or custom post type.

## Local review

The prototype is active at **http://allianz-therapietreue.local/**.

The theme includes Startseite, Allianz, Therapietreue, Info-Materialien, Award, Impressum, Datenschutz, standard posts, archives, and a 404 layout. Ordinary WordPress posts supply the latest-news sections. Existing sample posts are preserved.

## Install in another WordPress environment

1. Copy this folder to `wp-content/themes/allianz-therapietreue`, or upload the packaged theme ZIP under Appearance → Themes.
2. Activate **Allianz Therapietreue Deutschland**.
3. Create a page named Startseite and select it as the static homepage under Settings → Reading. Insert the **Startseite · vollständiges Layout** pattern into this page. The front-page template renders the page content.
4. Create Allianz (`allianz`), Therapietreue (`therapietreue`), Info-Materialien (`info-materialien`), Award (`award`), Impressum (`impressum`), and Datenschutz (`datenschutz`). Choose **Inhaltsseite · freie Blöcke** as the template and insert the corresponding full-page pattern from the **Allianz Therapietreue** pattern category.
5. Under Appearance → Menus, create and assign menus to **Hauptnavigation**, **Fußzeile · Themen**, and **Fußzeile · Weitere Links**. Add pages, custom links, and submenus using the standard WordPress controls. Page menu items follow permalink changes automatically.

On a local WordPress installation, `scripts/setup-local.php` performs steps 2–4. Run it from the theme directory, adding the local MySQL socket if necessary:

```sh
php -d mysqli.default_socket=/path/to/mysql.sock scripts/setup-local.php
```

The script is CLI-only, checks the local environment and theme path, creates missing pages and menus, fills an empty Startseite page with the homepage blocks, preserves existing nonempty content and menu assignments, sets the site title and homepage, and flushes local rewrite rules. It never runs on theme activation. Do not use it on a production database.

## Editing

- **Homepage:** Pages → Startseite → Edit, or use **Edit Page** on the frontend toolbar. All homepage sections are ordinary editable blocks in the page body. The front-page template supplies only the header, content area, and footer.
- **Editor canvas:** Theme sections and hero backgrounds span the available editor canvas; their inner content uses the same saved content/wide widths and gutter tokens as the frontend. The page-only editor also reserves the hero's header clearance. Ordinary posts retain the normal writing width. Reload an already-open editor after updating theme styles. These rules do not change saved blocks or Global Styles.
- **Hero background image:** Select the outer hero Group in List View, then open **Styles → Background** (German: **Stile → Hintergrund**) and choose an image from the Media Library or upload one. Use the native size and position controls to adjust the crop. Replace or remove the image in the same panel. The separate image column remains independently editable. For a full-width image behind the text with an adjustable overlay, insert **Hero · Hintergrundbild** from the Allianz Therapietreue pattern category, move it in place of the old hero, and transfer your copy before deleting the old section. Select the Cover block to replace its image, set its focal point, or adjust the navy overlay opacity. Check the crop and text readability on desktop and mobile. Backgrounds are decorative; keep meaningful image descriptions in a separate Image block.
- **Supporting pages:** Pages → Edit. All sections are ordinary blocks. Use List View to find sections and move or replace them.
- **Reveal on scroll:** Select a Group, Columns, Column, Image, Heading, Paragraph, or Cover block and choose **Styles → Beim Scrollen einblenden**. For mission cards, use List View to select each inner Group with class `at-mission-card`, then apply the style. Only opted-in cards animate, with a 100ms stagger across the row. Choose the default style to turn it off. If a block already uses another style (for example a material card), keep that style and add `at-reveal` under **Advanced → Additional CSS class(es)** instead. The animation runs once, using a 600ms fade and 20px upward movement. Content already on screen stays visible. Reduced-motion settings, keyboard focus, printing, missing JavaScript, and unsupported observers keep content accessible. The editor always shows content normally. No existing page is opted in automatically.
- **Menus:** Appearance → Menus (German: Design → Menüs). Add, rename, reorder, nest, and remove links, then save. Manage Locations assigns the header and two footer menus. Assigned classic menus are the source of link content; core Navigation blocks render them with native mobile and submenu behavior. No menu-copy synchronization is needed. With no menu assigned, the starter links remain as a fallback; an assigned empty menu stays empty.
- **Kontakt menu button:** Top-level primary links labeled Kontakt or pointing to `#kontakt` receive the button style and decorative mail icon. Edit the link normally under Appearance → Menus. To retain the treatment after changing both its label and destination, enable CSS Classes under Screen Options and add `at-menu-contact` to that menu item. Footer links stay unchanged.
- **Header/footer layout:** Appearance → Editor → Patterns → Template Parts. Edit menu links through Appearance → Menus; use the Site Editor for layout. The symbol is a replaceable Image block; the initiative name is editable text. The current lockup is provisional.
- **Copyright year:** Use `[allianz_year]` in a Shortcode block in the footer, for example `© [allianz_year] Allianz Therapietreue Deutschland`. It follows the site's configured timezone and updates automatically with the year.
- **Transparent header:** When the page starts with the background-image hero, the header overlays it and the image begins at the top of the page. The header scrolls with the page. `settings.custom.spacing.header` reserves space above the hero copy; adjust this token if the header height changes. Pages without an opening image hero keep the header in normal flow. The header has no bottom border. The mobile menu retains its opaque background. The existing white compact lockup (`Logo-AA-Kompakt-W.svg`) displays its matching color artwork on light headers and stays white over an opening image hero. The color SVG is bundled at `assets/images/brand/logo-compact-color.svg`; it is an unmodified copy of the uploaded `Logo-AA-Kompakt.svg`. This presentation switch preserves the saved Image block and its dimensions; choosing different artwork in the Site Editor still works normally.
- **Corner radius:** Select a supported block (for example Button, Image, Group, or Cover), then open **Styles → Border → Radius** and keep corners linked. Choose **0 px**, **4 px**, **8 px**, **12 px**, **16 px**, **24 px**, or **Pill · 999 px**. The native preset picker requires WordPress 6.9+; older supported versions retain numeric radius controls. For site-wide button defaults, use **Appearance → Editor → Styles → Blocks → Button → Border**. The new button default is pill-shaped (999px). Existing saved block and Global Styles choices are preserved.
- **Button styles:** Select a native Button block → **Styles → Primary, Secondary, or Highlight**. Labels use DM Sans 500 at 14/20, with 12px/24px padding and a pill default. Primary is navy; Secondary dark teal; Highlight gold. Hover/active use the verified semantic state tokens; Highlight becomes lighter with inverse navy text. Focus uses a 2px gold-brown outline and 2px white separator. Existing gold palette classes retain the same behavior. Explicit block radius/padding and saved Global Styles remain supported. Disabled colors are visual feedback: use a native disabled control to prevent activation; CSS does not disable links.
- **Button icons:** Insert **Buttons · Primary, Secondary, Highlight mit Icons**, or select a Button → **Advanced → Additional CSS class(es)** and add `at-icon-mail`, `at-icon-download`, or another curated name below. Icons appear on the left; add `at-icon-right` for the right. Keep a visible meaningful label. The same 16px decorative icon previews in frontend and editor; color follows the label. Changing the button style retains these additional classes. A full searchable icon picker would need custom editor JavaScript; native patterns/classes are the supported alternative.
- **Standalone icons:** Use a Shortcode block, e.g. `[allianz_icon name="info" size="20"]` beside explanatory text. Sizes 16/20/24 (default20). Icons are decorative by default. If the icon conveys meaning on its own, use `[allianz_icon name="circle-alert" size="24" label="Hinweis"]`. Labels are escaped and invalid names return nothing. The frontend renders the icon; the Shortcode editor may show source instead of a live icon preview. Do not make an icon-only button by removing a visible label.
- **Curated icon names:** `arrow-right`, `arrow-up-right`, `chevron-right`, `chevron-left`, `chevron-down`, `chevron-up`, `plus`, `minus`, `x`, `check`, `search`, `filter`, `mail`, `phone`, `message-circle`, `users`, `download`, `upload`, `external-link`, `file-text`, `info`, `circle-alert`, `circle-check`, `calendar`.
- **WPForms buttons:** Submit controls (`.wpforms-submit` and submit-type buttons/inputs) and `.wpforms-page-button` controls share Highlight states, typography, padding and pill shape. The plugin gradient and duplicate focus decoration are reset. Native disabled, `wpforms-disabled`, and `aria-disabled="true"` states receive immediate neutral styling. Validation, labels, spinners and submission handling remain plugin-owned. No form configuration or recipients are supplied by this theme.
- **Design-system review:** Insert **Designsystem · Prüflayout** into an unsaved draft for review. It combines the image hero, three mission cards, button/icon variants, quote and a native Group form slot. Insert an already configured WPForms block into that slot. Replace placeholder imagery/PDF and review links before publishing. The theme never creates or replaces a saved page automatically.
- **News:** Posts → Add New. Publish standard posts with optional featured images and excerpts. The homepage and Allianz query show the latest three, excluding sticky posts. There is a real empty-state message when no posts exist.
- **Partners:** Replace the placeholder text in the partner columns with Image blocks and approved partner names/links. No partner organization is implied by the placeholders.
- **PDFs:** Insert the reusable PDF card pattern. In its native File block, replace the clearly marked sample PDF with a Media Library PDF. Edit the title/description. The bundled PDF is a working download but contains no medical information.
- **Legal pages:** Replace the explicit placeholders with approved legal content.

Patterns are inserted as editable blocks, not synchronized content. File changes to patterns do not overwrite existing page content or Site Editor customizations. Export deliberate Site Editor changes back into the theme before deployment.

## Design system

`theme.json` owns the editor palette, heading/body/navigation/button roles, fluid type sizes, spacing scale, content widths, and button shape. `assets/css/theme.css` supplies responsive component layouts and the same styling in the editor. Section widths retain the original theme's narrow/wide layout principles; corner radii apply equally to all four corners.

The token structure uses native WordPress presets plus a small set of shared values under `settings.custom`:

| Source in `theme.json` | Purpose |
| --- | --- |
| `settings.layout` | Content and wide wrapper widths; CSS references WordPress's generated layout variables. |
| `settings.spacing.spacingSizes` | Shared gaps, margins, and padding. Existing slugs 30/40/50/60 represent 1/1.5/2/3rem. |
| `settings.custom.layout.gutter` | Shared page gutter and default root padding. |
| `settings.custom.layout.heroMinHeight` | Image hero minimum height, currently `50rem` (800px at the default root size). Generates `--wp--custom--layout--hero-min-height`; content sits at the bottom with normal section padding and remains left-aligned. |
| `settings.custom.spacing.hero` / `intro` | Hero and page-intro vertical spacing. |
| `settings.custom.spacing.header` | Clearance for the transparent header above opening hero copy. |
| `settings.custom.surface.subtle` | Verified soft teal surface, using the existing palette preset. |
| `settings.custom.type` | Semantic text specimens shared by native heading defaults and paragraph/quote styles. |
| `settings.custom.button` | Three semantic action roles, interaction states, focus/disabled colors and shared geometry. |
| `settings.custom.radius.media` / `hero` | Uniform media corners, 48px and 64px. The mobile hero's 40px treatment stays local. |
| `settings.custom.motion.revealDuration` / `revealDistance` / `revealStagger` | Optional reveal timing, travel distance, and mission-card stagger. A small dependency-free frontend script handles viewport observation. |

For example, `settings.custom.surface.subtle` generates `--wp--custom--surface--subtle`. Custom values are maintained in the theme file; they do not add dedicated Site Editor controls. Native color, spacing, font, and layout controls remain editable in WordPress. Component proportions and breakpoints stay in CSS; semantic type values live in theme.json. Add a token when a value is shared or is a deliberate site-wide design decision; avoid recreating the original theme's full alias hierarchy. Existing preset slugs remain stable so saved blocks keep their references.

Brand source: [Allianz Adhärenz Figma](https://www.figma.com/design/216VlC0GF4Y1wApMgvVbJY/Allianz-Adhaerenz?node-id=2-49). All 20 palette swatches were read directly from node `2:49`. The unmodified infinity/cross SVG comes from node `2:16`; replace it with the approved asset when available. The editable wordmark uses the requested initiative name, rather than the provisional outlined “Allianz Adhärenz” artwork in Figma. No website page layouts were present in that file at the time of inspection.

The palette uses Deep Current navy `#05416a`, Vital Teal `#039782`, the supplied light tints, and Golden Hour accents. Dark teal `#026456` is used for smaller colored text and hover states for legibility. Subtle surfaces now use the verified soft teal #acddd6. Main text uses `#032b46`.

Three native background gradient presets come directly from Figma's gradients section (`8:315`): **Teal → Navy** (`8:310`), **Gold → Navy** (`8:311`), and **Gold → Teal** (`8:312`). All run vertically from top to bottom with the original endpoint colors. Select a Group or Cover block, open **Styles → Color → Background → Gradient** (German: **Stile → Farbe → Hintergrund → Farbverlauf**), and choose a preset. For the homepage hero, select its outer section Group in List View. The presets are available throughout the editor and Site Editor; existing background choices are preserved. Text color remains independently editable.

Alan Sans is hosted locally in normal weights **400/500/600/700**; DM Sans in **400/500/600/700**, optical size 14. Each family includes its SIL Open Font License and source notes under `assets/fonts`. H1 uses Alan 700, H2/H3 Alan 600, quote roles Alan 400. Body paragraphs use DM 400; H4–H6 DM 600; navigation, labels and buttons DM 500. H1/H2/H3 track at 0/0.08px/0; mobile endpoints are 40/32/24px and desktop 56/40/32px, with fluid interpolation from 480 to 1200px. Paragraph and quote block styles expose complete Figma specimens without adding 26 duplicate size choices. Display paragraph roles use DM Sans as specified in Figma.

To change heading typography globally, open **Appearance → Editor → Styles → Typography → Headings**, select H1, H2, or H3, and change family/appearance. For paragraphs, use **Styles → Blocks → Paragraph → Typography**. Per-block typography remains editable; enable hidden controls in the panel menu if needed. Existing saved Global Styles and block overrides remain authoritative. The `sans` preset slug now points to DM Sans; `alan-sans` and every existing color/spacing/font-size/radius slug are preserved.

The [alignment map](docs/figma-alignment-map.md) records all 26 text roles, semantic mappings, deliberate compatibility decisions and a separate saved-content migration proposal. The [inspection snapshot](docs/figma-design-system.json) records Figma variables and aliases. Native editor presets remain the user-facing palette/spacing/type/radius choices; `settings.custom.type` and `settings.custom.button` maintain internal semantic specimens/state values. WordPress normalizes numeric custom keys (`h1` becomes `--wp--custom--type--h-1--…`). Do not hand-create an alternative token hierarchy in CSS.

Content/wide defaults stay 760/1240px, and any saved widths remain authoritative. Figma's720/960/1180/1440 references are documented for an approved layout migration. Existing fluid gutters, section rhythm, hero minimum height and intentional media radii remain. No page bodies, menus, form configuration, Global Styles or Site Editor customizations are migrated by this update.

## Award form handoff

The editable Group block with anchor `bewerbung` is the integration slot. Replace its placeholder contents with the selected form plugin's native block or configured shortcode. Keep the surrounding heading and announcement until applications open.

Configure these fields in the plugin:

- Name: required text field with an explicit label and `autocomplete="name"`.
- Email: required email field with an explicit label and `autocomplete="email"`.
- Project description: required textarea; final helper copy and length limit require editorial approval.
- Privacy consent: required, unchecked checkbox with approved consent wording and a link to Datenschutz.
- Submission confirmation on the page and a confirmation email to the submitted address.

Configure the approved administrator recipient, sender/domain, delivery service, spam protection, retention, and error messages. Test validation, keyboard access, consent, successful delivery, confirmation email, and failure handling before opening submissions. Theme placeholders do not submit or store applications. Any configured plugin form owns its own submission and storage behavior. No fake form or recipient address is supplied by the theme.

## Verification

```sh
php -d mysqli.default_socket=/path/to/mysql.sock scripts/verify.php
```

This read-only smoke check verifies active block-theme recognition, theme metadata, JSON parsing, template/pattern block registration, pattern resolution, and the absence of legacy custom post types. PHP syntax and browser/editor checks are recorded in [docs/verification.md](docs/verification.md).

## Pending assets and content

Approved logo/wordmark, real photography, reviewed page copy and infographics, approved partner logos, real PDF materials, Award details and configured form plugin, 720 Health Media contact details, legal texts, and the separate website briefing (not supplied in this session).

Only this theme and the clone's local content were changed. The original site's repository, WordPress core, plugins, deployment configuration, and hosting configuration were not modified.

## Packaging

After validation, run `python3 scripts/package.py`. The default output is `/private/tmp/allianz-therapietreue-deutschland.zip`, with the installable `allianz-therapietreue/` directory. An optional first argument selects another output path. Existing ZIP files (including a ZIP moved into docs) and the output itself are excluded to prevent nested archives. Install/update manually after review; packaging does not upload or deploy.
