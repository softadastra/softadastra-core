<p align="center" style="margin:0;">
  <img 
    src="https://res.cloudinary.com/dwjbed2xb/image/upload/v1762624307/softadastra_wnoab9.png" 
    alt="Softadastra Core Banner" 
    width="100%" 
    style="
      display:block;
      height:auto;
      max-width:900px;
      margin:auto;
      object-fit:cover;
      border-radius:8px;
    ">
</p>

<h1 align="center">🧱 Softadastra Core</h1>
<p align="center">
  <strong>The modular foundation powering the entire Softadastra Ecosystem.</strong><br>
  Built with <a href="https://github.com/iviphp/ivi">Ivi.php</a> · Inspired by <a href="https://github.com/vixcpp/vix.cpp">Vix.cpp</a>
</p>

---

## 🚀 Overview

**Softadastra Core** is the backbone of the **Softadastra Ecosystem** — a modular, scalable, and developer-friendly platform connecting Africa’s digital markets, businesses, and technologies.

It serves as the **base layer** for all Softadastra divisions and modules, providing a unified environment, configuration system, routing core, and UI layout shared across the ecosystem.

> From the marketplace and payments to cloud, AI, and decentralized services — every Softadastra module is built on this core.

---

## 🧩 Architecture

Softadastra Core is built around **modular composition**, **lightweight PHP**, and **clean separation of concerns**.

```
softadastra-core/
├── core/               # Ivi.php core extensions (App, Kernel, Loader, Logger, etc.)
├── modules/            # Pluggable modules (Market, Business, Pay, Ads, etc.)
│   ├── Market/
│   │   └── Core/       # Example module: Softadastra Market
│   ├── Business/
│   │   └── Core/
│   └── ...
├── config/             # Global configuration (app.php, database.php, routes.php)
├── public/             # Public web root (index.php)
├── views/              # Shared base layout and partials (base.php, header.php, footer.php)
├── src/                # Shared controllers, middleware, utilities
├── vendor/             # Composer dependencies
└── Makefile            # Developer utilities
```

### ⚙️ Core Responsibilities

| Component           | Description                                                               |
| ------------------- | ------------------------------------------------------------------------- |
| **Bootstrap**       | Initializes environment, app config, error handling, and service bindings |
| **Router**          | Provides clean REST and web routing through Ivi.php                       |
| **Module Registry** | Dynamically loads and boots modules under `/modules`                      |
| **View System**     | Namespaced rendering (`market::home`) with shared layouts                 |
| **Config Layer**    | Simple, global configuration registry (with safe helpers)                 |
| **Error Handler**   | Friendly error page & debug console powered by `Logger`                   |

---

## 🧱 Modular System

Modules are self-contained sub-packages with their own configuration, routes, views, and migrations.

Each module exports a `Module.php` that implements the `ModuleContract`:

```php
<?php
use Softadastra\Modules\ModuleContract;
use Ivi\Core\Router\Router;

return new class implements ModuleContract {
    public function name(): string { return 'Market/Core'; }

    public function register(): void {
        // Load module config
        $path = __DIR__.'/config/market.php';
        if (is_file($path)) {
            $cfg = require $path;
            config_set('market', array_replace_recursive(config('market', []), $cfg));
        }
    }

    public function boot(Router $router): void {
        \App\Controllers\Controller::addViewNamespace('market', __DIR__.'/views');
        require __DIR__.'/routes/web.php';
    }
};
```

Modules are automatically loaded via the `ModuleRegistry` in the `App` bootstrapper.

---

## 💼 Business Divisions

Softadastra Core powers every division in the ecosystem:

| Division        | Purpose                                          |
| --------------- | ------------------------------------------------ |
| 🏪 **Market**   | Connects African buyers and sellers              |
| 💼 **Business** | Empowers entrepreneurs and SMEs                  |
| ⚙️ **Digital**  | Builds fast sites and backend systems            |
| 💳 **Pay**      | Enables local & international digital payments   |
| ☁️ **Cloud**    | Provides decentralized hosting and storage       |
| 🧠 **Labs**     | Researches AI, blockchain, and distributed tech  |
| 🎓 **Academy**  | Trains the next generation of African developers |
| 🎨 **Studio**   | Focuses on design, branding, and creative tools  |
| 📢 **Ads**      | Offers advertising and promotion solutions       |
| 🧰 **Build**    | Developer APIs, SDKs, and developer tools        |

---

## 🧠 Key Concepts

- **Composable Architecture** – Each domain (Market, Pay, Ads…) is a module.
- **Framework Agnostic** – Built on [Ivi.php](https://github.com/iviphp/ivi) but adaptable to any PHP environment.
- **Scalable Layout System** – Shared views, partials, and themes.
- **Safe Config Registry** – Lightweight configuration helpers (`cfg()`, `configv()`).
- **Debug Console** – Elegant, developer-friendly exception panel.
- **PSR-4 Autoloading** – Fully compliant with modern PHP standards.

---

## 🛠️ Getting Started

### 1. Clone and install dependencies

```bash
git clone https://github.com/softadastra/softadastra-core.git
cd softadastra-core
composer install
```

### 2. Run the local server

```bash
php -S 127.0.0.1:8000 -t public
```

Visit: [http://127.0.0.1:8000](http://127.0.0.1:8000)

### 3. Explore a module

Example: `/modules/Market/Core/routes/web.php`

```php
<?php
use Market\Core\Infra\Http\Controllers\HomeController;

$router->get('/market', [HomeController::class, 'index']);
```

---

## ⚡ Configuration Helpers

| Helper                       | Description                      |
| ---------------------------- | -------------------------------- |
| `cfg('market.title')`        | Safe getter for config values    |
| `configv('key', $default)`   | Fallback config reader           |
| `config_set('key', $value)`  | Safe config writer               |
| `migrations_add_path($path)` | Registers migration paths safely |

---

## 🤝 Contributing

We welcome contributions from the community!  
Whether you want to fix bugs, build new modules, or improve documentation:

1. **Fork** the repository
2. **Create** a feature branch (`git checkout -b feature/awesome`)
3. **Commit** your changes (`git commit -m "Add awesome feature"`)
4. **Push** to your branch (`git push origin feature/awesome`)
5. **Open a Pull Request**

See [CONTRIBUTING.md](CONTRIBUTING.md) for full details.

---

## 🧾 License

**MIT License** — free to use, modify, and distribute.  
See [LICENSE](LICENSE) for details.

---

## 🌍 Official Ecosystem

| Project                                                             | Description                              |
| ------------------------------------------------------------------- | ---------------------------------------- |
| [Softadastra.com](https://softadastra.com)                          | Unified African digital ecosystem        |
| [Ivi.php](https://github.com/iviphp/ivi)                            | Simple, modern, expressive PHP framework |
| [Vix.cpp](https://github.com/vixcpp/vix.cpp)                        | High-performance C++ backend framework   |
| [Softadastra Chat](https://github.com/softadastra/softadastra_chat) | Real-time messaging system               |
| [Softadastra Labs](https://github.com/softadastra/softadastra-labs) | AI, Blockchain, and Research division    |

---

## 💚 Support the Mission

Softadastra’s vision is to empower **African digital innovation** through open-source technology.  
Your support — through code, ideas, or collaboration — helps us build a better, connected future.

⭐ **Star this repo** to show your support  
💬 Join the discussion on [GitHub Discussions](https://github.com/softadastra/softadastra-core/discussions)  
🧩 Explore more at [softadastra.com](https://softadastra.com)

---

<p align="center">
  <sub>Built with ❤️ in Africa — by <a href="https://github.com/GaspardKirira">@GaspardKirira</a> and the Softadastra Group.</sub>
</p>
