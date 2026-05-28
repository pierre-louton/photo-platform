# Export Contract

Version : V1
Objectif :
Définir le format officiel de sortie
des données métier.
Ce document constitue un contrat.
Les consommateurs externes doivent
utiliser cet export.

---

# Principes

Le format export :

- est indépendant du moteur SQL ;
- est indépendant de WordPress ;
- reste stable ;
- est versionné.

Format :
JSON

Encodage :
UTF-8

Compression :
gzip

Version :
v1

---

# Organisation

archive
export.json
manifest.json
checksums.txt

---

# Manifest

Nom :
manifest.json
Objectif :
décrire le contenu.

Exemple :
{
  "version":"v1",
  "created_at":"2026-05-27T10:00:00Z",
  "photos":1023,
  "galleries":17,
  "taxonomies":412,
  "checksum":"..."
}

---

# Export photo

Nom :
photo.json
Structure :
[
 {
  "uuid":"",
  "title":"",
  "slug":"",
  "description":"",
  "capture_date":"",
  "publish_date":"",
  "visibility":"",
  "status":"",
  "photographer_uuid":"",
  "media_uuid":"",
  "taxonomy":[
  ],

  "metadata":[
  ]
 }
]

Règles :
UUID obligatoire

---
# Export photographe
Nom :
photographer.json
Structure :
[
 {
  "uuid":"",
  "display_name":"",
  "website":""
 }
]

---
# Export galerie

Nom :
gallery.json
Structure :
[
 {
  "uuid":"",
  "name":"",
  "visibility":""
 }
]

---

# Export taxonomie
Nom :
taxonomy.json
Structure :
[
 {
  "uuid":"",
  "type":"",
  "label":"",
  "parent_uuid":""
 }
]

Types :

category
style
keyword
location
technique

---

# Export média

Nom :
media.json
Structure :
[
 {
  "uuid":"",
  "provider":"",
  "storage_key":"",
  "mime_type":"",
  "width":0,
  "height":0
 }
]

Important :

jamais de chemin disque.
---

# Export relations

Nom :
relation.json
Structure :
[
 {
  "source_uuid":"",
  "target_uuid":"",
  "relation_type":""
 }
]

---
# Export métadonnées
Nom :
metadata.json
Structure :
[
 {
  "entity_uuid":"",
  "namespace":"",
  "payload":{}
 }
]

Namespaces :
exif
iptc
lightroom
custom

---

# Export événements
Nom :
event.json
Structure :
[
 {
  "uuid":"",
  "title":"",
  "start_date":"",
  "end_date":""
 }
]

---
# Cohérence
Validation :
manifest
↓
nombre objets
↓
checksum
↓
import

---
# Compatibilité
Compatible :
MariaDB
PostgreSQL
OpenSearch
API
S3

---
# Politique de version
Ajout :
autorisé
Suppression :
interdite
Renommage :
interdit
Version :
v1
v2
v3

---
# Import cible
Exemple :
export
↓
validate
↓
transform
↓
load
---

# Sauvegarde

Une sauvegarde complète
doit toujours être :
exportable
et
réimportable.

---

# Objectif final

Le système doit pouvoir être recréé :
uniquement
à partir de l’export.