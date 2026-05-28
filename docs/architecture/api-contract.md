# API Contract

Version : V1

Objectif :

Définir le contrat d’accès
au domaine métier.

L’API est :

stable

versionnée

indépendante du frontend.

---

# Principes

Le frontend :

ne connaît jamais :

SQL

storage

CMS

---

Le frontend :

connaît :

REST

DTO

pagination

---

# Base URL

/api/v1

Convention :

version obligatoire

---

# Format

JSON

UTF-8

Dates :

ISO-8601 UTC

UUID :

texte

---

# Réponse standard

Succès :

{
 "data":{},
 "meta":{}
}

Erreur :

{
 "error":{
  "code":"",
  "message":""
 }
}

---

# Pagination

Paramètres :

page

limit

sort

Réponse :

meta

↓

count

page

limit

total

---

# Authentification

V1 :

session WordPress

---

V2 :

JWT

---

V3 :

OIDC

---

# Domaine Photo

GET

/photos

Description :

liste.

Filtres :

photographer

gallery

taxonomy

visibility

capture_date

---

Réponse :

{
 "data":[]
}

---

GET

/photos/{uuid}

Description :

détail.

---

POST

/photos

Description :

création.

---

PATCH

/photos/{uuid}

Description :

mise à jour.

---

DELETE

/photos/{uuid}

Description :

archivage logique.

---

# Domaine Galerie

GET

/galleries

---

GET

/galleries/{uuid}

---

POST

/galleries

---

# Domaine Taxonomie

GET

/taxonomies

Filtres :

type

parent

---

GET

/taxonomies/tree

Description :

arbre.

---

# Domaine Photographe

GET

/photographers

---

GET

/photographers/{uuid}

---

# Domaine Import

POST

/import

Description :

déclenchement.

---

GET

/import/{uuid}

Description :

suivi.

---

# Domaine Recherche

GET

/search

Paramètres :

q

type

filters

---

Réponse :

{
 "photos":[],
 "gallery":[],
 "taxonomy":[]
}

---

# Domaine Média

GET

/media/{uuid}

Description :

lecture.

---

POST

/media/sign

Description :

URL signée.

---

Réponse :

{
 "url":"",
 "expires_at":""
}

---

# Domaine Export

POST

/export

Description :

génération.

---

GET

/export/{uuid}

Description :

état.

---

# DTO

Interdiction :

retour DB direct.

Toujours :

DTO

Exemple :

PhotoDTO

GalleryDTO

---

# Versionning

Autorisé :

ajout champ

Interdit :

suppression

Interdit :

renommage

Évolution :

v1

v2

v3

---

# Cache

Headers :

etag

cache-control

last-modified

---

# Performance

Photo :

<100 ms

Recherche :

<300 ms

Galerie :

<500 ms

---

# Monitoring

Mesures :

volume

temps

erreurs

cache hit

---

# Sécurité

Interdit :

exposition stockage

Interdit :

identifiants internes

Interdit :

chemins physiques

---

# Compatibilité

Clients :

WordPress

Elementor

CLI

Import

Mobile

API externe

---

# Objectif final

Le remplacement du frontend

ne doit nécessiter :

aucune modification métier.