# ADR-004 — Politique UUID
Statut : ACCEPTÉ
Date : 2026-05
---
## Contexte
Le système doit :
- migrer ;
- exposer une API ;
- supporter plusieurs moteurs ;
- éviter les collisions.
---
## Décision
Toutes les entités métier
utilisent un UUID.
Les identifiants internes
ne sont jamais exposés.
---
## Entités concernées
photo
gallery
taxonomy
partner
event
media
photographer
---
## Format
UUID v4
Exemple :
550e8400-e29b-41d4-a716-446655440000
---
## Utilisation
Base
API
export
logs
cache
URLs
---
## Interdictions
AUTO_INCREMENT exposé
slug comme clé
id WordPress
---
## URLs
Autorisé :
/gallery/{uuid}
---
Option :
slug
---
Exemple :
/photo/uuid/lever-soleil
---
## Migration
MariaDB
↓
PostgreSQL
↓
sans renumérotation
---
## Sécurité
Masquer :
volumétrie
ordre création
structure interne
---
## Conséquences
Positives :
portabilité
fusion
import
API
---
Négatives :
taille index
lecture humaine
---
## Alternatives rejetées
BIGINT
Motif :
couplage.
---
slug uniquement
Motif :
instabilité.
---
## Révision
Réévaluer :
jamais