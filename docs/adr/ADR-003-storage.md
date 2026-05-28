# ADR-003 — Stratégie de stockage
Statut : ACCEPTÉ
Date : 2026-05
---
## Contexte
Les photographies constituent
le patrimoine principal.
Les exigences :
- pas de dépendance WordPress ;
- migration future ;
- protection originaux ;
- stockage interchangeable.
---
## Décision
Le stockage est abstrait.
Le domaine ne connaît jamais :
chemin
bucket
URL
---
## Contrat
StorageInterface
put()
get()
delete()
exists()
metadata()
signedUrl()
---
## Fournisseurs
V1
LocalStorage
---
V2
Cloudflare R2
---
V3
S3
---
## Convention
Le domaine stocke :
storage_provider
storage_key
---
Exemple :
provider
local
key
photo/uuid
---
## Interdictions
wp-content/uploads
URL directe
chemin absolu
---
## Distribution
/media/{uuid}
↓
service
↓
validation
↓
réponse
---
## Originaux
Privés
---
## Dérivés
Publics
↓
thumbnail
preview
gallery
---
## Conséquences
Positives :
migration
sécurité
coût maîtrisé
---
Négatives :
plus d’abstraction
---
## Alternatives rejetées
WordPress Media Library
Motif :
couplage.
---
## Révision
Réévaluer :
100000 photos