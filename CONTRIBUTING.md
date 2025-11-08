# 🤝 Contributing to Softadastra Core

Thank you for considering contributing to **Softadastra Core** — the foundation of the Softadastra Ecosystem!  
Your ideas, fixes, and improvements help make African open-source technology stronger and more impactful. 🌍

---

## 🧭 Table of Contents

1. [Code of Conduct](#-code-of-conduct)
2. [How to Contribute](#-how-to-contribute)
3. [Setting Up the Project](#-setting-up-the-project)
4. [Coding Guidelines](#-coding-guidelines)
5. [Commit Conventions](#-commit-conventions)
6. [Pull Request Process](#-pull-request-process)
7. [Style & Quality Tools](#-style--quality-tools)
8. [Community & Contact](#-community--contact)

---

## 🌱 Code of Conduct

By participating in this project, you agree to uphold our [Code of Conduct](https://github.com/softadastra/.github/blob/main/CODE_OF_CONDUCT.md).  
Please be respectful and supportive in all interactions.

---

## 🛠️ How to Contribute

### 🧩 1. Report Bugs or Suggest Features

Open an issue at [Issues](https://github.com/softadastra/softadastra-core/issues) and include:

- A clear description of the problem or idea
- Steps to reproduce (if a bug)
- Expected vs actual behavior
- Screenshots or code examples (optional)

### 💡 2. Fix or Improve Code

1. **Fork** this repository
2. **Clone** your fork locally
   ```bash
   git clone https://github.com/<your-username>/softadastra-core.git
   cd softadastra-core
   ```
3. **Create a new branch**
   ```bash
   git checkout -b feature/your-feature-name
   ```
4. **Make your changes**
5. **Run tests and linter**
6. **Commit and push**
   ```bash
   git commit -m "feat: add new feature to module registry"
   git push origin feature/your-feature-name
   ```
7. **Open a Pull Request** from your fork.

---

## ⚙️ Setting Up the Project

### Requirements

- PHP 8.1 or higher
- Composer
- SQLite or MySQL (optional, for modules using databases)

### Setup

```bash
composer install
php -S 127.0.0.1:8000 -t public
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

### Structure

```bash
core/        # Ivi.php extensions
modules/     # Pluggable Softadastra modules
config/      # Application settings
views/       # Global layouts and partials
public/      # Web entry point
```

---

## 🧩 Coding Guidelines

- Follow **PSR-4** autoloading and naming conventions.
- Use **strict typing** (`declare(strict_types=1);` at the top of PHP files).
- Avoid logic in views — keep controllers slim and clear.
- Each module must have:
  - `config/`
  - `routes/`
  - `views/`
  - `Module.php` implementing `ModuleContract`.

### Example Module Structure

```
modules/Market/Core/
├── config/market.php
├── routes/web.php
├── views/home.php
└── Module.php
```

---

## 🧾 Commit Conventions

We follow [Conventional Commits](https://www.conventionalcommits.org/en/v1.0.0/):

| Type        | Description                                             |
| ----------- | ------------------------------------------------------- |
| `feat:`     | New feature or enhancement                              |
| `fix:`      | Bug fix                                                 |
| `docs:`     | Documentation only changes                              |
| `refactor:` | Code change that neither fixes a bug nor adds a feature |
| `style:`    | Formatting, missing semi-colons, etc.                   |
| `test:`     | Adding or updating tests                                |
| `chore:`    | Build tasks, package updates, etc.                      |

Example:

```bash
git commit -m "feat(core): add safe config registry helper"
```

---

## 🔁 Pull Request Process

1. Ensure your branch is **up to date** with `main` or `dev`
2. Run `composer lint` and `composer test`
3. Describe **what** you changed and **why**
4. Request a review
5. Wait for CI checks to pass (GitHub Actions)

PR titles should follow the Conventional Commit style.

---

## 🧰 Style & Quality Tools

- **Formatter:** [PHP CS Fixer](https://github.com/FriendsOfPHP/PHP-CS-Fixer)

  ```bash
  composer lint
  ```

- **Tests:** [PHPUnit](https://phpunit.de/)

  ```bash
  composer test
  ```

- **Security:** [Gitleaks](https://github.com/gitleaks/gitleaks)
  ```bash
  make secure-scan
  ```

---

## 💬 Community & Contact

- Website: [https://softadastra.com](https://softadastra.com)
- Discussions: [GitHub Discussions](https://github.com/softadastra/softadastra-core/discussions)
- Twitter: [@Softadastra](https://twitter.com/Softadastra)
- Maintainer: [@GaspardKirira](https://github.com/GaspardKirira)

---

<p align="center">
  <sub>Built with ❤️ in Africa — by <a href="https://github.com/GaspardKirira">@GaspardKirira</a> and the Softadastra Group.</sub>
</p>
