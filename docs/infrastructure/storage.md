# Storage Architecture

Version : V1

Objectif :
Définir la stratégie de stockage
des médias.

Le stockage doit :

- être indépendant du CMS ;
- être remplaçable ;
- protéger les originaux ;
- permettre la migration.

---
# Principes

Le domaine métier :
ne connaît jamais :
- le chemin disque ;
- le bucket ;
- l’URL publique.

Le domaine connaît uniquement :
storage_provider
storage_key

---

# Architecture
Utilisateur
↓
CDN
↓
Media Service
↓
Storage Provider
↓
Fichiers

---

# Responsabilités

## Domaine

Connaît :

media_uuid
storage_provider
storage_key

Ignore :
disque
bucket
URL

---

## Storage Service

Responsable :
lecture
écriture
suppression
signature
conversion
cache

---

## Fournisseur

Responsable :
persistance physique

---

# Interface

Contrat :
put()
get()
exists()
delete()
publicUrl()
signedUrl()
metadata()
copy()

---
# Fournisseurs supportés

V1
LocalStorage
---
V2
Cloudflare R2
---
V3
S3
---
V4
Archive froide
---

# LocalStorage

Objectif :
développement
petit volume

Structure :
/media
/photo
/original
/derivative
/cache

Exemple :
media/
photo/
original/
uuid.ext

---

# CloudStorage

Structure :
bucket
↓
photos
↓
year
↓
uuid

Exemple :
photos/
2026/
uuid
---
# Types média

original
thumbnail
preview
web
archive

---
# Pipeline image

Import
↓
validation
↓
hash
↓
stockage
↓
miniatures
↓
publication

---
# Formats
Entrée :
jpg
png
tiff
raw
webp

Sortie :

avif
webp
jpg
---
# Transformation

Original :
jamais modifié

Dérivés :
générés

Exemples :
thumbnail
preview
gallery
mobile

---
# Protection

Interdiction :
accès direct

Interdiction :
listing répertoire

Interdiction :
URL permanente stockage

---
# Distribution

Autorisé :
/media/{uuid}

Interdit :
/uploads/...

---

# Signature URL
Exemple :
/media/uuid
↓
token
↓
expiration
Durée :

5 minutes

---
# Téléchargement
Par défaut :
désactivé
Option :
autorisation explicite
Règle :
jamais original

---
# Cache

Niveaux :

browser
↓
cdn
↓
application
↓
storage

---
# Métadonnées

Stockage :
DB
Jamais :
dans le nom fichier
Exemple :
OK :
uuid

Interdit :
IMG_1234.jpg

---
# Intégrité

Calcul :
sha256

Validation :
avant publication

---
# Sauvegarde

Inclure :
originaux
dérivés
manifest
checksum

---
# Migration

Stratégie :

copy
↓
verify
↓
switch
↓
clean

---

# Monitoring

Mesures :
volume
temps lecture
temps génération
erreurs
coût

---

# Objectif final

Le stockage doit pouvoir changer

sans modifier :

- le domaine
- la base
- le frontend
