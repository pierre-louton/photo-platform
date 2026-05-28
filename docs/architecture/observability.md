# Observability Architecture
Version : V1
Objectif :
Rendre observable :
- le fonctionnement ;
- les performances ;
- les incidents ;
- la croissance.
Le système doit :
permettre de comprendre
sans reproduire.
---
# Principes
Observer :
avant incident.
Mesurer :
avant optimiser.
---
# Piliers
Logs
↓
Metrics
↓
Traces
↓
Alertes
---
# Architecture
Application
↓
Logs
↓
Collecte
↓
Visualisation
↓
Alertes
---
# Sources
Infrastructure
Application
Base
Storage
Import
Recherche
Publication
---
# Journalisation
Types :
audit
métier
technique
sécurité
---
# Format
JSON
UTC
corrélation
---
# Champs minimum
timestamp
level
service
event
duration
user
trace_id
message
---
# Niveaux
ERROR
WARN
INFO
DEBUG
---
Production :
INFO
---
Interdit :
DEBUG permanent
---
# Corrélation
Chaque requête :
reçoit :
request_id
trace_id
---
Exemple :
Import
↓
Photo
↓
Storage
↓
DB
↓
Réponse
---
# Métriques
Disponibilité
latence
erreurs
volume
cache
---
# Infrastructure
CPU
RAM
IO
disque
réseau
---
# Application
temps réponse
requêtes
exceptions
temps import
---
# Base
connexions
requêtes
temps SQL
verrous
index
---
# Storage
volume
lecture
écriture
coût
cache hit
---
# Import
images importées
échecs
temps
doublons
---
# Recherche
temps recherche
volume index
facettes
cache
---
# Publication
temps galerie
temps photo
trafic
---
# Dashboards
Exploitation
↓
santé
---
Performance
↓
latence
---
Business
↓
photos
galeries
imports
---
# Alertes
Critique :
site indisponible
---
Import :
échec
---
Stockage :
95 %
---
DB :
temps
---
Backup :
absence
---
# Seuils
Erreur :
>1 %
---
Latence :
>500 ms
---
Import :
>5 min
---
Stockage :
>80 %
---
# Traces
Conserver :
entrée
service
sortie
durée
---
# Rétention
Logs :
30 jours
---
Audit :
365 jours
---
Metrics :
180 jours
---
# Confidentialité
Interdit :
mot de passe
clé
secret
URL signée
---
Autorisé :
UUID
trace_id
---
# Runbook
Toute alerte :
doit pointer :
procédure
responsable
validation
---
# Évènements métier
Tracer :
photo publiée
photo importée
galerie créée
migration
suppression
---
# Santé
Endpoints :
/health
/ready
/version
---
Réponse :
UP
DEGRADED
DOWN
---
# Objectifs
Détecter :
<5 minutes
---
Diagnostiquer :
<15 minutes
---
Corriger :
<60 minutes
---
# Évolutions
V2
centralisation
---
V3
tracing distribué
---
V4
prédiction
---
# Politique
Tout nouveau composant :
doit exposer :
logs
metrics
health
---
# Objectif final
Comprendre : ce qui s’est passé
sans : accès serveur ni analyse manuelle.