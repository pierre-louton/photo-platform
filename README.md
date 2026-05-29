# Site Photographe

## Vision

Construire une plateforme photographique durable permettant
l’exposition, l’organisation et l’évolution d’un catalogue
multi-photographes sans dépendance structurelle à WordPress.

WordPress est considéré comme une couche de présentation.

La donnée métier doit pouvoir survivre :
- à un changement de CMS ;
- à une migration MariaDB → PostgreSQL ;
- à un passage API-first ;
- à une croissance importante du volume photo.

---

## Principes fondateurs

### Séparation des responsabilités

Présentation :
- WordPress
- Elementor

Métier :
- modèle photo
- catalogue
- partenaires
- agenda

Infrastructure :
- stockage
- base
- cache

---

### Identifiants

Toutes les entités métier utilisent un UUID.

Les identifiants techniques internes ne sont jamais exposés.

---

### Stockage

Les médias sont abstraits via un fournisseur :

- local
- R2
- S3

Le domaine métier ne connaît jamais le chemin physique.

---

### Migration

Architecture pensée dès V1 pour permettre :

MariaDB
↓
Export
↓
PostgreSQL
↓
API

sans réécriture du modèle métier.

---

## Objectifs V1

- publier le premier photographe ;
- gérer les galeries ;
- importer les métadonnées ;
- préparer le multi-photographe ;
- maintenir de bonnes performances.

---

## Hors périmètre V1

- vente ;
- marketplace ;
- mobile ;
- IA ;
- édition collaborative avancée.

---
Statut : Initial DDD Platform Baseline

Implémenté :
- Architecture DDD
- Domain Events
- Aggregate Root
- Gallery Aggregate
- CreateGallery Use Case
- InMemory Repository
- PHPUnit

À venir :
- Classification
- Portfolio
- Booking
- WordPress Integration
- Persistence
