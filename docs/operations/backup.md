# Backup Strategy
Version : V1
Objectif :
Garantir :
- récupération ;
- continuité ;
- migration ;
- intégrité.
Le système doit pouvoir être reconstruit.
---
# Principes
La sauvegarde :
n’est pas :
un export.
La sauvegarde :
inclut :
données
médias
configuration
contrats
---
# Périmètre
Inclure :
DB
storage
configuration
exports
logs critiques
---
Exclure :
cache
miniatures reconstruisibles
temp
---
# Architecture
Production
↓
Backup Local
↓
Backup Distant
↓
Archive
---
# Sources
Base
↓
MariaDB
---
Médias
↓
originaux
preview
cache critique
---
Configuration
↓
env
nginx
php
plugin
---
Documentation
↓
docs
ADR
MCD
MLD
---
# Niveaux
Niveau 1
base
---
Niveau 2
médias
---
Niveau 3
plateforme complète
---
# Base
Mode :
dump logique
+
snapshot
---
Fréquence :
quotidienne
---
Conservation :
30 jours
---
Format :
sql
json export
---
# Médias
Méthode :
incremental
↓
full
---
Conserver :
originaux
dérivés essentiels
manifest
checksum
---
Fréquence :
quotidienne
---
# Exports
Conserver :
export-contract
↓
photo
gallery
taxonomy
metadata
---
Objectif :
reconstruction.
---
# Configuration
Conserver :
configuration active
↓
historique
---
Interdit :
secret en clair
---
# Chiffrement
Sauvegarde distante :
obligatoire
---
Algorithme :
AES-256
---
Clés :
hors serveur
---
# Rotation
Règle :
3-2-1
3 copies
2 supports
1 hors site
---
# Intégrité
Calcul :
sha256
---
Validation :
après écriture
---
# Restauration
Tests :
mensuels
---
Objectifs :
base :
30 min
---
plateforme :
2 heures
---
médias :
4 heures
---
# Procédure restauration
Étapes :
stop
↓
restauration DB
↓
restauration storage
↓
validation
↓
warmup
↓
ouverture
---
# Validation
Comparer :
volume
hash
manifest
nombre objets
---
# Journal
Conserver :
date
durée
taille
résultat
---
Table :
backup_log
---
# Monitoring
Mesures :
âge
taille
échec
temps
---
Alertes :
24 h
72 h
échec
---
# Incident
Perte DB
↓
restore
↓
replay
---
Perte média
↓
restore
↓
validation
---
Perte complète
↓
rebuild
↓
export
---
# Migration
Une sauvegarde :
doit permettre :
MariaDB
↓
PostgreSQL
sans perte.
---
# Politique
Toute évolution :
doit préciser :
impact backup
impact restauration
---
# Objectif final
Recréer :
plateforme
+
catalogue
+
métadonnées
+
stockage
sans dépendre :
du CMS.