# ADR-007 — WordPress is an Adapter

## Status
Accepted

## Context

Le projet a commencé comme plugin WordPress mais évolue vers une plateforme métier indépendante.

Le domaine métier ne doit pas dépendre :
- des hooks WordPress,
- des CPT,
- des APIs WP,
- du cycle de vie WP.

## Decision

WordPress devient un adaptateur d'entrée/sortie.

Le noyau métier :
- vit dans `src/Domain`,
- est orchestré par `src/Application`,
- ignore totalement WordPress.

Les intégrations WordPress vivent dans :
- `src/Infrastructure/WordPress`.

## Consequences

### Positives

- testabilité élevée,
- possibilité de CLI/API indépendante,
- migration facilitée,
- stabilité du domaine.

### Négatives

- couche d'adaptation supplémentaire,
- mapping DTO/WordPress nécessaire.
