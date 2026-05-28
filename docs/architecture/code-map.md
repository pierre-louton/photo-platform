# Code Map

## Domain

Contient :
- agrégats,
- value objects,
- repositories (interfaces),
- événements métier.

Aucune dépendance infrastructure.

## Application

Contient :
- handlers,
- cas d'usage,
- orchestration métier.

## Infrastructure

Contient :
- persistance,
- adaptateurs,
- WordPress,
- stockage,
- recherche.

## Tests

Organisation miroir :
- tests/Domain
- tests/Application
- tests/Infrastructure
