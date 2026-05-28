# Migration Plan

Version : V1
Objectif :
Préparer dès aujourd’hui la migration future :
WordPress + MariaDB
↓
API + PostgreSQL
sans rupture fonctionnelle.

---
# Principes
Le système est conçu pour :
- supporter plusieurs moteurs SQL ;
- découpler présentation et données ;
- conserver les identifiants ;
- migrer progressivement.

La migration n’est pas un projet futur.
La migration est une capacité.

---
# Architecture cible
V1
WordPress
↓
Plugin métier
↓
MariaDB
↓
Stockage média
---
V2
WordPress
↓
Service métier
↓
MariaDB
↓
Stockage
---
V3
Frontend
↓
API
↓
PostgreSQL
↓
Stockage
---
# Conditions préalables

Avant migration :
✓ UUID partout
✓ aucune FK vers WordPress
✓ stockage abstrait
✓ export automatisé
✓ migrations versionnées

---
# Actifs à migrer
## Domaine
photographer
photo
gallery
taxonomy
event
partner
metadata
entity_relation
---
## Infrastructure
stockage
cache
index recherche
---

## Hors migration
WordPress
Elementor
plugins
SEO historique
---

# Méthode
Méthode :
Expand
→
Synchronize
→
Switch
→
Retire
---

# Phase 1 — Préparation
Objectif :
rendre les systèmes compatibles.
Actions :
- figer schéma
- exporter vues
- tests
Durée :
1 semaine
---
# Phase 2 — Base parallèle

Objectif :
introduire PostgreSQL.
Architecture :
MariaDB
↓
Sync
↓
PostgreSQL
Actions :
- créer schéma
- valider contraintes
- tests volumétriques

Durée :
1 semaine
---
# Phase 3 — Double écriture

Objectif :
écrire simultanément.
Architecture :
Application
↓
MariaDB
+
PostgreSQL

Actions :
insert
update
delete logique

Durée :
2 semaines

Validation :
comparaison des comptages
checksum
---

# Phase 4 — Lecture PostgreSQL

Objectif :
basculer progressivement.
Architecture :
lecture :
PostgreSQL

écriture :
double Contrôle :

temps réponse
logs
erreurs
Durée :
1 semaine

---

# Phase 5 — Coupure

Objectif :
retirer MariaDB.
Architecture :
Application
↓
PostgreSQL
↓
Stockage
Actions :
désactivation
archive
Durée :
1 jour
---

# Synchronisation

Méthodes possibles
V1 :
export JSON

V2 :
CDC

V3 :
Kafka

Décision actuelle :
JSON

---

# Contrôles

Comparer :
nombre photos
nombre taxonomies
nombre relations
checksums

---

# Rollback

Temps maximum :
30 minutes
Actions :
désactiver lecture PostgreSQL
retour MariaDB
vider cache
rejouer logs

---

# Critères de succès

0 perte
0 changement URL
0 changement SEO
0 changement média

---

# Performances cibles

Recherche :
<300 ms

Photo :
<100 ms

Galerie :
<500 ms

---

# Évolutions futures

réplication
partitionnement
cluster PostgreSQL
OpenSearch