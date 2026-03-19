# CLAUDE.md

This file provides guidance to Claude Code (claude.ai/code) when working with code in this repository.

## Build & Quality Commands

```bash
# Install dependencies
composer install

# Static analysis (level max)
./vendor/bin/phpstan analyse

# Code style check (PSR-12 + Slevomat)
./vendor/bin/phpcs

# Auto-fix code style
./vendor/bin/phpcbf

# Run tests (no tests exist yet)
./vendor/bin/phpunit
```

## Architecture

This is a TYPO3 CMS extension (`ms_faq`) that provides a FAQ accordion.

**Namespace:** `MarekSkopal\MsFaq`

### Key Components

- **FaqController** (`Classes/Controller/`) - Extbase controller with `listAction()` to render the FAQ list
- **Question** (`Classes/Domain/Model/`) - Domain model with title, perex, and an `ObjectStorage<Answer>` for inline answers
- **Answer** (`Classes/Domain/Model/`) - Domain model with content (RTE)
- **QuestionRepository** (`Classes/Domain/Repository/`) - `findAllOrdered()` returns questions sorted by `sorting` ASC (manual drag & drop order)

### Data Flow

1. `listAction()` loads all questions ordered by `sorting` ascending
2. Fluid template renders a `<details>`/`<summary>` accordion (no JS)
3. Each question partial iterates its answers and renders RTE content

### Template Structure

- `Layouts/Default.html` — wraps content in `.msfaq-wrapper`
- `Templates/Faq/List.html` — iterates questions, passes each to partial
- `Partials/Question/Item.html` — renders `<details>` accordion with answers

### Configuration

TypoScript Sets (TYPO3 13+) are in `Configuration/Sets/MsFaq/`. No configurable settings — the CSS is included automatically.

## Requirements

- PHP 8.3+
- TYPO3 13.4+ or 14.1+

## Code Style

- Strict types enabled in all files
- **No constructor property promotion in Extbase domain models** — TYPO3 Extbase hydrates models by setting protected properties directly (bypassing the constructor), so properties must be declared classically with default values
- PHPStan level `max` with bleeding edge; `method.internalClass` ignored globally (needed for `getUid()` on Extbase entities)
- PSR-12 with Slevomat Coding Standard
