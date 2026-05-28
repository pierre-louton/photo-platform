# ADR-002 — Frontière WordPress / Domaine
Statut : ACCEPTÉ
Date : 2026-05
---
## Contexte
Le projet démarre sous WordPress.
Le besoin est :
- publier rapidement ;
- éviter le verrouillage technique ;
- préparer une migration future.
Le domaine métier ne doit pas dépendre du CMS.
---
## Décision
WordPress est limité à :
- présentation ;
- administration ;
- authentification ;
- SEO ;
- intégration.
Le domaine métier est indépendant.
---
## WordPress possède
pages
menus
utilisateurs
réglages
Elementor
plugins UI
---
## WordPress ne possède pas
photos
galeries
taxonomies métier
partenaires
évènements
métadonnées
stockage
recherche
---
## Communication
WordPress
↓
Services
↓
Repositories
↓
Base
---
Interdit :
Elementor
↓
SQL
---
Interdit :
wpdb dans le domaine
---
## Conséquences
Positives :
migration simplifiée
testabilité
découplage
---
Négatives :
plugin plus riche
plus de code
---
## Alternatives rejetées
Tout dans wp_posts
Motif :
couplage.
---
Headless immédiat
Motif :
complexité excessive.
---
## Révision
Réévaluer :
à partir :
deuxième photographe