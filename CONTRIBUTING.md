# Contributing to Magewire Admin

Thanks for your interest in contributing. This is a small companion module for [Magewire](https://github.com/magewirephp/magewire) — most component and runtime questions belong upstream.

## Code of Conduct

By participating you agree to the [Code of Conduct](https://github.com/magewirephp/magewire/blob/main/CODE_OF_CONDUCT.md).

## Ways to Contribute

- Report bugs and request features via [GitHub Discussions](https://github.com/magewirephp/magewire-admin/discussions).
- Report security vulnerabilities privately — see [SECURITY.md](SECURITY.md).
- Submit code changes via pull request.

## Requirements

- PHP 8.2+
- Composer 2
- A working Magento 2 installation with admin access for testing

## Getting Started

```bash
git clone https://github.com/magewirephp/magewire-admin.git
cd magewire-admin
composer install
```

Install into a real Magento 2 project via Composer path repository:

```json
{
  "repositories": [
    { "type": "path", "url": "/path/to/magewire-admin" }
  ],
  "require": { "magewirephp/magewire-admin": "*" }
}
```

## Scope

This module covers **adminhtml-only** concerns:

- The `MagewireUpdateRouteAdminhtml` controller and its auth.
- `LayoutAdminResolver` (component discovery from admin layout XML).
- Admin asset wiring (templates under `src/view/adminhtml/`).
- Admin-specific plugins on Magento framework classes.

Anything touching component lifecycle, snapshots, directives, or storefront behavior belongs in the main [`magewirephp/magewire`](https://github.com/magewirephp/magewire) repo.

## Commit Messages

Use [Conventional Commits](https://www.conventionalcommits.org/). Format: `<type>(<scope>): <subject>`.

Common types: `feat`, `fix`, `chore`, `docs`, `refactor`.

Examples:

```
feat(router): validate admin session before dispatch
fix(resolver): handle nested admin blocks
```

Breaking changes — append `!` and add a `BREAKING CHANGE:` footer. Release-please reads these to bump versions and generate `CHANGELOG.md`.

## Pull Requests

1. Fork and branch from `main`. Name the branch after the change.
2. Keep PRs focused — one concern per PR.
3. Include a description explaining **why**, not just **what**.
4. Verify the change in a real Magento admin panel before opening the PR.

## Testing

No automated test harness lives in this repo yet. Manually verify in an admin panel:

1. Log in.
2. Navigate to a page containing a Magewire admin component.
3. Trigger an action that causes a component update (should POST to the admin update route, not the frontend one).
4. Confirm the component re-renders and the snapshot round-trips.

## Releases

Automated via [release-please](https://github.com/googleapis/release-please). On merge to `main` with Conventional Commits, release-please opens a release PR that bumps the version and updates `CHANGELOG.md`. Merging that PR tags and publishes to Packagist.

## License

By contributing, you agree your contributions will be licensed under the [MIT License](LICENSE.md).