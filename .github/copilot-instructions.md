## Repo snapshot

- Framework: Symfony 8 (see `composer.json` "symfony/*": "8.0.*").
- PHP: >= 8.4 (see `composer.json`).
- Entry points: HTTP front controller `public/index.php`, CLI `bin/console`.

## High-level architecture (what matters to an AI agent)

- Controllers live in `src/Controller/` and are PSR-4 autoloaded as `App\` (see `composer.json` and `config/services.yaml`).
- Routing is attribute-based and automatically imported; `config/routes.yaml` references `routing.controllers` so route attributes (#[Route]) in controller classes are used.
- Templates live under `templates/` (e.g. `templates/portfolio/*.html.twig`). Controllers render Twig templates using `$this->render('portfolio/projects.html.twig', [...])`.
- Assets are in `assets/` and use Symfony UX / importmap (`importmap.php`, `assets/app.js`, `assets/controllers/*`). Stimulus controllers are under `assets/controllers/`.
- Doctrine is installed (bundles and migrations present). Database migrations are in `migrations/` and managed via `bin/console doctrine:migrations:*` commands.

## Developer workflows & useful commands

- Install dependencies: `composer install` (project expects Symfony Runtime & Flex). If dependencies missing the `bin/console` checks will explain how to fix.
- Run the app (two common options):
  - With the Symfony CLI: `symfony serve` (if you have it), or
  - Using PHP built-in server: `php -S localhost:8000 -t public` (serves `public/index.php`).
- CLI dev commands: `./bin/console` (debug:router, debug:container, doctrine:migrations:migrate, cache:clear, assets:install).
- Run tests: `./bin/phpunit` — the project uses `phpunit.dist.xml` with `bootstrap="tests/bootstrap.php"` which boots `.env` and sets `APP_ENV=test`.

## Project conventions & gotchas

- Service configuration: `config/services.yaml` enables `autowire: true` and `autoconfigure: true` and maps `App\` to `src/`. Prefer constructor injection.
- Routes: prefer attribute routes in controllers (see `src/Controller/*`). Use `bin/console debug:router` to list registered routes.
- Templates: follow the `templates/` namespace structure (e.g. `portfolio/home.html.twig`). Controllers call `$this->render('path/to/template.html.twig', $vars)`; search `src/Controller` for examples.
- Assets: this project uses Symfony UX / importmap; don't expect a Node build step unless you add one. Edit `importmap.php` and `assets/` files when adding JS.
- Testing: the bootstrap file (`tests/bootstrap.php`) loads runtime and `.env` via Dotenv->bootEnv(); tests assume `APP_ENV=test`.

## Integration points & external dependencies

- Doctrine ORM + migrations (`doctrine/*` packages + `migrations/` folder).
- Symfony UX / Stimulus (`symfony/stimulus-bundle`, `assets/controllers`).
- Twig + `twig/extra-bundle` for templates.

## Example snippets & quick references

- Registering a service: add DI config in `config/services.yaml` (the `App\` resource already autowires classes in `src/`).
- Template render example (from `src/Controller/PortfolioController.php`):

  return $this->render('portfolio/projects.html.twig', ['projects' => $projects]);

- Run tests locally (recommended):

  ./bin/phpunit

## When editing or adding features

- Keep routing attributes in controllers instead of separate YAML unless there is a reason to centralize.
- If you add JS behavior, register controllers under `assets/controllers/` and update `importmap.php` if you add external dependencies.
- If you change services or autowiring behavior, update `config/services.yaml` and run `bin/console debug:container` to validate.

## Where to look for examples

- Controller patterns: `src/Controller/MainController.php`, `src/Controller/PortfolioController.php`.
- Template examples: `templates/portfolio/*`, `templates/main/index.html.twig`.
- Test bootstrap and PHPUnit config: `tests/bootstrap.php`, `phpunit.dist.xml`.
- Composer scripts and dependency versions: `composer.json`.

If anything here is unclear or you'd like the file to include more specific examples (CI, DB setup, or deploy steps), tell me which area to expand and I'll iterate.
