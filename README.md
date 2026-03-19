# FAQ for TYPO3 CMS

FAQ accordion as a content element in TYPO3. Questions with inline answers are managed in the TYPO3 backend; the frontend renders a pure-CSS accordion using `<details>`/`<summary>` — no JavaScript required.

## Features

- Questions with title, optional perex, and one or more inline answers (RTE)
- Manual drag & drop sorting in the backend
- Pure-CSS accordion, no JavaScript
- Multilingual support (EN, CS, DE labels out of the box)
- Customizable templates and styling

## Requirements

- PHP 8.3+
- TYPO3 13.4 or 14.x

## Installation

```bash
composer require marekskopal/typo3-faq
```

After installation, run the database analyser in the TYPO3 Install Tool to create the required tables.

## Setup

Include the TypoScript Set **FAQ** in your site package or via the site configuration sets.

## Backend Setup

Create **Question** records on the page where the content element is placed:

- **Title** — question text (required)
- **Perex** — optional short description shown above the answers
- **Answers** — one or more inline answer records, each with RTE content

Drag and drop questions to set their display order. Then add the **FAQ** content element to the same page.

## Customization

### Templates

Override templates by setting custom paths in TypoScript:

```typoscript
plugin.tx_msfaq_faq.view.templateRootPaths.10 = EXT:your_extension/Resources/Private/Templates/MsFaq/
plugin.tx_msfaq_faq.view.partialRootPaths.10  = EXT:your_extension/Resources/Private/Partials/MsFaq/
plugin.tx_msfaq_faq.view.layoutRootPaths.10   = EXT:your_extension/Resources/Private/Layouts/MsFaq/
```

### Styling

The extension includes minimal CSS. Key classes:

| Class | Element |
|-------|---------|
| `.msfaq-wrapper` | Outer wrapper |
| `.msfaq__item` | Single `<details>` accordion item |
| `.msfaq__question` | `<summary>` — the clickable question |
| `.msfaq__answers` | Answer container inside the open accordion |

## License

GPL-2.0-or-later
