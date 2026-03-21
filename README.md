# FAQ for TYPO3 CMS

FAQ accordion as a content element in TYPO3. Questions with inline answers are managed in the TYPO3 backend; the frontend renders a pure-CSS accordion using `<details>`/`<summary>` — no JavaScript required.

## Features

- Questions with title, optional perex, and one or more inline answers (RTE)
- Manual drag & drop sorting in the backend
- Pin questions as **top** — top questions are sorted first and can be listed separately
- Mark questions as **always open** (expanded by default)
- TYPO3 system **categories** support per question
- **Show only top** FlexForm option to display only pinned questions
- **Template layouts** — switchable per content element via FlexForm, configured through TSconfig or PHP globals
- Automatic **JSON-LD** (`FAQPage` schema.org structured data) injected into the page
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
- **Categories** — optional TYPO3 system categories
- **Top** — pin the question so it is sorted first (and can be shown exclusively via the *Show only top* option)
- **Always open** — expand the accordion item by default
- **Answers** — one or more inline answer records, each with RTE content

Drag and drop questions to set their display order within each tier (top questions always appear first). Then add the **FAQ** content element to the same page.

## Content Element Options (FlexForm)

| Option | Description |
|--------|-------------|
| **Show only top** | When enabled, only questions marked as *Top* are displayed |
| **Template layout** | Select an alternative template layout defined in TSconfig or PHP globals |

## Template Layouts

Register custom template layouts in Page TSconfig:

```typoscript
tx_msfaq.templateLayouts {
    my_layout = My custom layout
}
```

Or in PHP (e.g. `ext_localconf.php`):

```php
$GLOBALS['TYPO3_CONF_VARS']['EXT']['ms_faq']['templateLayouts'][] = ['My layout label', 'my_layout'];
```

Then configure the corresponding template paths in TypoScript:

```typoscript
plugin.tx_msfaq_faq.settings.templateLayouts {
    my_layout {
        templateRootPath = EXT:your_extension/Resources/Private/Templates/MsFaq/MyLayout/
        partialRootPath  = EXT:your_extension/Resources/Private/Partials/MsFaq/MyLayout/
        layoutRootPath   = EXT:your_extension/Resources/Private/Layouts/MsFaq/MyLayout/
    }
}
```

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

## JSON-LD

The extension automatically outputs a `FAQPage` JSON-LD block (schema.org structured data) based on the displayed questions and their answers. No additional configuration is required.

## License

GPL-2.0-or-later
