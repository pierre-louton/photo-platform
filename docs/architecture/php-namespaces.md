# PHP Namespaces

## Structure cible

```text
PhotoPlatform\Domain
PhotoPlatform\Application
PhotoPlatform\Infrastructure
PhotoPlatform\Presentation
PhotoPlatform\Shared
```

## Règles

- Domain ne dépend de rien d'externe.
- Infrastructure implémente les interfaces du domaine.
- Presentation traduit HTTP, CLI ou WordPress vers les use cases.
- Application orchestre les cas d'usage.

## Interdictions

- Aucun namespace Domain ne doit importer WordPress.
- Aucun namespace Domain ne doit importer SQL ou PDO.
- Presentation ne doit pas accéder directement aux repositories.
