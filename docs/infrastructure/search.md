# Search Architecture

Version : V1

Objectif :

Définir le système de recherche
et de découverte.

La recherche doit :

- rester indépendante du stockage ;
- être progressive ;
- supporter plusieurs moteurs.

---

# Principes

La recherche :

n’est pas :

la base.

La recherche :

est :

une projection.

---

# Architecture

Utilisateur

↓

UI

↓

Search API

↓

Search Service

↓

Search Index

↓

Base métier

---

# Responsabilités

Base :

source de vérité

---

Index :

optimisation lecture

---

API :

accès

---

UI :

présentation

---

# Stratégie

V1

SQL

↓

V2

Full Text

↓

V3

OpenSearch

---

# Modes recherche

Recherche libre

Recherche guidée

Navigation

Suggestions

Découverte

---

# Recherche libre

Entrée :

texte

Exemple :

mer noir blanc

Résultat :

photos

galeries

tags

---

# Recherche guidée

Filtres :

photographe

date

catégorie

style

objectif

appareil

lieu

partenaire

évènement

---

# Navigation

Exemples :

Paysages

↓

Montagnes

↓

Brume

↓

Noir et blanc

---

# Suggestions

Exemple :

alp

↓

alpes

↓

alpin

↓

alpage

---

# Découverte

Objectif :

faire apparaître :

similaire

récent

populaire

lié

---

# Modèle index

Document :

photo

Structure :

{

 uuid,

 title,

 description,

 photographer,

 gallery,

 taxonomy,

 metadata,

 location,

 capture_date

}

---

# Champs indexés

Photo :

titre

description

---

Taxonomie :

label

---

Technique :

objectif

boîtier

---

Lieu :

ville

région

pays

---

Métadonnées :

iptc

xmp

---

# Champs filtrés

visibility

status

gallery

taxonomy

capture_date

---

# Facettes

Compteurs :

catégorie

style

année

localisation

photographe

---

# Tri

récent

ancien

pertinence

aléatoire

populaire

---

# Pagination

cursor

préféré

Alternative :

page

---

# Mises à jour

V1

batch

---

V2

temps réel

---

V3

évènementiel

---

# Réindexation

Modes :

totale

partielle

par domaine

---

# Recherche SQL

V1

LIKE

↓

FULLTEXT

↓

index

---

# Recherche OpenSearch

Index :

photo

gallery

taxonomy

---

Pipeline :

DB

↓

projection

↓

index

---

# Cache

Niveaux :

résultat

facettes

requêtes

---

# Sécurité

Interdit :

photos privées

Interdit :

originaux

Interdit :

stockage

---

# Monitoring

Mesures :

temps

cache

requêtes

volume

---

# SLA

Recherche :

<300 ms

Suggestions :

<100 ms

Facettes :

<200 ms

---

# Export

Le moteur :

doit être reconstruisible

à partir :

de l’export métier

---

# Objectif final

La recherche doit continuer
à fonctionner

même après :

changement CMS

ou

changement DB.