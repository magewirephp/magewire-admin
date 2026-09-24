# Magewire Admin

[![Latest Stable Version](http://poser.pugx.org/magewirephp/magewire-admin/v)](https://packagist.org/packages/magewirephp/magewire-admin)
[![Total Downloads](http://poser.pugx.org/magewirephp/magewire-admin/downloads)](https://packagist.org/packages/magewirephp/magewire-admin)
[![License](http://poser.pugx.org/magewirephp/magewire-admin/license)](https://packagist.org/packages/magewirephp/magewire-admin)

Adminhtml compatibility module for [Magewire](https://github.com/magewirephp/magewire). Enables reactive Magewire components inside the Magento 2 backend (admin panel) with the same server-driven, JavaScript-light developer experience Magewire provides on the storefront.

## Requirements

- PHP 8.2+
- Magento 2.x
- `magewirephp/magewire` ^3.0

## Installation

```bash
composer require magewirephp/magewire-admin
bin/magento setup:upgrade
bin/magento setup:di:compile
bin/magento cache:flush
```

The module sequences after `Magento_Backend` and `Magewirephp_Magewire`, so load order is handled automatically.

## Browser-test route

In default and developer modes, Magewire Admin exposes an authenticated `magewire/playwright` admin route. Admin integration modules can contribute fixtures through the `magewire_playwright_index` layout handle. The route has a stable, secret-key-free URL for browser automation, while Magento's admin authentication and ACL checks remain enforced. It resolves as a no-route response in production mode.

## Backend tests

The [backend test workflow](.github/workflows/backend-tests.yml) runs the Playwright suite after every push to `main` and on pull requests. It installs Mage-OS with Magewire and Magewire Admin from source, then checks that the admin workbench requires a login and can complete a Magewire update. Magewire's own `main` pipeline calls the same workflow with its merged commit.

To run the suite against a local developer-mode Magento installation:

```bash
cd tests/Playwright
npm install
npx playwright install chromium
BASE_URL=https://magento.test/ ADMIN_PATH=backend ADMIN_USER=admin ADMIN_PASSWORD=... npm test
```

Set `ADMIN_PATH` to the installation's backend front name. The admin user must be able to log in without an interactive two-factor challenge.

## Documentation

See the main Magewire [documentation](https://magewirephp.github.io/magewire-docs/) — component API, lifecycle hooks, and `wire:*` directives are identical between storefront and adminhtml.

[![Discord](https://dcbadge.vercel.app/api/server/RM5nnK5wxj)](https://discord.gg/zS7z7rmH)

## Contributing

See [CONTRIBUTING.md](CONTRIBUTING.md).

## Code of Conduct

Review and abide by the [Code of Conduct](https://github.com/magewirephp/magewire/blob/main/CODE_OF_CONDUCT.md).

## Security Vulnerabilities

**Please do not report security issues publicly.** Email `magewirephp@wpoortman.nl` privately — see [SECURITY.md](SECURITY.md).

## License

Copyright © [Willem Poortman](https://github.com/wpoortman)

Magewire Admin is open-sourced software licensed under the [MIT license](LICENSE.md).
