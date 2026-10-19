# AGENTS.md

## Project: Allianz Therapietreue Deutschland

This repository is an independent custom WordPress block theme. Work only inside this theme unless the user explicitly authorizes local WordPress content setup. Never modify the original source site's repository or deployment configuration.

## Design and implementation

- Primary brand reference: https://www.figma.com/design/216VlC0GF4Y1wApMgvVbJY/Allianz-Adhaerenz?node-id=2-49
- Use the inspected navy/teal palette and infinity/cross direction. The logo is provisional and must stay replaceable.
- Keep page content, including the homepage, in normal editable page bodies. Templates supply the surrounding layout.
- Keep menus editable in Appearance → Menus. The marked native Navigation blocks render assigned menu locations. Header/footer layout remains editable in the Site Editor.
- Use standard posts for news. Avoid custom post types, frameworks and unnecessary dependencies.
- Keep semantic tokens, layout widths, spacing and typography in `theme.json`.
- Keep shared frontend/editor component CSS in `assets/css/theme.css`, using expanded readable formatting.
- Prefer PHP, semantic HTML, CSS, native WordPress behavior and minimal vanilla JavaScript.
- Do not invent statistics, medical claims, Award rules, partners or contact details. Mark missing content clearly.
- Fonts and assets must be locally hosted and licensed. The current system font stack is provisional.
- The Award slot is a native Group block. Integrate a configured form plugin instead of adding a nonfunctional HTML form.

## Editing and checks

Read README.md for installation, editing conventions, local setup and outstanding dependencies. Existing page content and Site Editor customizations must not be overwritten by activation or routine updates. Run appropriate PHP, WordPress and browser checks for material changes. Keep the theme independently installable without a build step.
