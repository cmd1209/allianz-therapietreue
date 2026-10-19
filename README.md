# Allianz Therapietreue Deutschland

Independent WordPress block theme, version 0.1.2. Requires WordPress 6.6+ and PHP 8.0+. No build step, JavaScript bundle, required plugin, external font service, or custom post type.

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
- **Hero background image:** Select the outer hero Group in List View, then open **Styles → Background** (German: **Stile → Hintergrund**) and choose an image from the Media Library or upload one. Use the native size and position controls to adjust the crop. Replace or remove the image in the same panel. The separate image column remains independently editable. For a full-width image behind the text with an adjustable overlay, insert **Hero · Hintergrundbild** from the Allianz Therapietreue pattern category, move it in place of the old hero, and transfer your copy before deleting the old section. Select the Cover block to replace its image, set its focal point, or adjust the navy overlay opacity. Check the crop and text readability on desktop and mobile. Backgrounds are decorative; keep meaningful image descriptions in a separate Image block.
- **Supporting pages:** Pages → Edit. All sections are ordinary blocks. Use List View to find sections and move or replace them.
- **Menus:** Appearance → Menus (German: Design → Menüs). Add, rename, reorder, nest, and remove links, then save. Manage Locations assigns the header and two footer menus. Assigned classic menus are the source of link content; core Navigation blocks render them with native mobile and submenu behavior. No menu-copy synchronization is needed. With no menu assigned, the starter links remain as a fallback; an assigned empty menu stays empty.
- **Kontakt menu button:** Top-level primary links labeled Kontakt or pointing to `#kontakt` receive the button style and decorative mail icon. Edit the link normally under Appearance → Menus. To retain the treatment after changing both its label and destination, enable CSS Classes under Screen Options and add `at-menu-contact` to that menu item. Footer links stay unchanged.
- **Header/footer layout:** Appearance → Editor → Patterns → Template Parts. Edit menu links through Appearance → Menus; use the Site Editor for layout. The symbol is a replaceable Image block; the initiative name is editable text. The current lockup is provisional.
- **News:** Posts → Add New. Publish standard posts with optional featured images and excerpts. The homepage and Allianz query show the latest three, excluding sticky posts. There is a real empty-state message when no posts exist.
- **Partners:** Replace the placeholder text in the partner columns with Image blocks and approved partner names/links. No partner organization is implied by the placeholders.
- **PDFs:** Insert the reusable PDF card pattern. In its native File block, replace the clearly marked sample PDF with a Media Library PDF. Edit the title/description. The bundled PDF is a working download but contains no medical information.
- **Legal pages:** Replace the explicit placeholders with approved legal content.

Patterns are inserted as editable blocks, not synchronized content. File changes to patterns do not overwrite existing page content or Site Editor customizations. Export deliberate Site Editor changes back into the theme before deployment.

## Design system

`theme.json` owns the editor palette, heading/body/navigation/button roles, fluid type sizes, spacing scale, content widths, and button shape. `assets/css/theme.css` supplies responsive component layouts and the same styling in the editor. Section widths retain the original theme's narrow/wide layout principles; the native Button block preserves the alternating corner treatment without its old JavaScript controls.

The token structure uses native WordPress presets plus six shared values under `settings.custom`:

| Source in `theme.json` | Purpose |
| --- | --- |
| `settings.layout` | Content and wide wrapper widths; CSS references WordPress's generated layout variables. |
| `settings.spacing.spacingSizes` | Shared gaps, margins, and padding. Existing slugs 30/40/50/60 represent 1/1.5/2/3rem. |
| `settings.custom.layout.gutter` | Shared page gutter and default root padding. |
| `settings.custom.spacing.hero` / `intro` | Hero and page-intro vertical spacing. |
| `settings.custom.surface.subtle` | Shared pale-teal section/notice background, derived from palette colors. |
| `settings.custom.radius.media` / `hero` | Alternating media corners, 48px and 64px. The mobile hero's 40px treatment stays local. |

For example, `settings.custom.surface.subtle` generates `--wp--custom--surface--subtle`. Custom values are maintained in the theme file; they do not add dedicated Site Editor controls. Native color, spacing, font, and layout controls remain editable in WordPress. Component proportions, breakpoints, and individual type treatments stay in CSS. Add a token when a value is shared or is a deliberate site-wide design decision; avoid recreating the original theme's full alias hierarchy. Existing preset slugs remain stable so saved blocks keep their references.

Brand source: [Allianz Adhärenz Figma](https://www.figma.com/design/216VlC0GF4Y1wApMgvVbJY/Allianz-Adhaerenz?node-id=2-49). All 20 palette swatches were read directly from node `2:49`. The unmodified infinity/cross SVG comes from node `2:16`; replace it with the approved asset when available. The editable wordmark uses the requested initiative name, rather than the provisional outlined “Allianz Adhärenz” artwork in Figma. No website page layouts were present in that file at the time of inspection.

The palette uses Deep Current navy `#05416a`, Vital Teal `#039782`, the supplied light tints, and Golden Hour accents. Dark teal `#026456` is used for smaller colored text and hover states for legibility. Light section surfaces mix the supplied teal tint with white. Main text uses `#032b46`.

Three native background gradient presets come directly from Figma's gradients section (`8:315`): **Teal → Navy** (`8:310`), **Gold → Navy** (`8:311`), and **Gold → Teal** (`8:312`). All run vertically from top to bottom with the original endpoint colors. Select a Group or Cover block, open **Styles → Color → Background → Gradient** (German: **Stile → Farbe → Hintergrund → Farbverlauf**), and choose a preset. For the homepage hero, select its outer section Group in List View. The presets are available throughout the editor and Site Editor; existing background choices are preserved. Text color remains independently editable.

Alan Sans is bundled locally in normal weights **500** and **700**, with its SIL Open Font License in `assets/fonts/alan-sans/OFL.txt`. H1/H2 default to 700; H3 and Paragraph blocks default to 500. Navigation and buttons keep the system sans stack. The font files come from Google Fonts, but visitors make no Google Fonts requests.

To change heading typography globally, open **Appearance → Editor → Styles → Typography → Headings** (German: **Design → Editor → Stile → Typografie → Überschriften**), select H1, H2, or H3, and change the font family or appearance/weight. For paragraphs, use **Styles → Blocks → Paragraph → Typography**. To override a single heading or paragraph, select its block and use **Styles → Typography**; enable hidden font/appearance controls from the panel menu if needed. Alan Sans offers Medium (500) and Bold (700). Existing saved Global Styles and block overrides remain authoritative. No Apotheken Umschau fonts were supplied or found. No medical statistics, Award rules, or partner organizations have been invented.

## Award form handoff

The editable Group block with anchor `bewerbung` is the integration slot. Replace its placeholder contents with the selected form plugin's native block or configured shortcode. Keep the surrounding heading and announcement until applications open.

Configure these fields in the plugin:

- Name: required text field with an explicit label and `autocomplete="name"`.
- Email: required email field with an explicit label and `autocomplete="email"`.
- Project description: required textarea; final helper copy and length limit require editorial approval.
- Privacy consent: required, unchecked checkbox with approved consent wording and a link to Datenschutz.
- Submission confirmation on the page and a confirmation email to the submitted address.

Configure the approved administrator recipient, sender/domain, delivery service, spam protection, retention, and error messages. Test validation, keyboard access, consent, successful delivery, confirmation email, and failure handling before opening submissions. Nothing on the prototype submits or stores applications. There is deliberately no fake form or invented recipient address.

## Verification

```sh
php -d mysqli.default_socket=/path/to/mysql.sock scripts/verify.php
```

This read-only smoke check verifies active block-theme recognition, theme metadata, JSON parsing, template/pattern block registration, pattern resolution, and the absence of legacy custom post types. PHP syntax and browser/editor checks are recorded in [docs/verification.md](docs/verification.md).

## Pending assets and content

Approved logo/wordmark, licensed fonts if desired, real photography, reviewed page copy and infographics, approved partner logos, real PDF materials, Award details and configured form plugin, 720 Health Media contact details, legal texts, and the separate website briefing (not supplied in this session).

Only this theme and the clone's local content were changed. The original site's repository, WordPress core, plugins, deployment configuration, and hosting configuration were not modified.
