# Testing Strategy

## Priorités

1. Domain
2. Application
3. Infrastructure

## Domain tests

Tester :
- invariants,
- règles métier,
- value objects.

Ne jamais dépendre de WordPress.

## Application tests

Tester :
- orchestration,
- handlers,
- workflows.

Utiliser des repositories InMemory.

## Infrastructure tests

Tester :
- mapping,
- persistance,
- adaptateurs.

## Convention

Un test = un comportement métier.
