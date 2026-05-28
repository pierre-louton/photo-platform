# Disaster Recovery Plan
Version : V1
Objectif :
Définir les procédures de retour
en fonctionnement après incident.
Le plan couvre :
- perte de données ;
- perte stockage ;
- compromission ;
- erreur humaine ;
- migration échouée.
---
# Principes
Le système :
doit être reconstruisible.
Aucune restauration :
ne dépend :
de WordPress.
---
# Définitions
RTO
Recovery Time Objective
temps maximal arrêt
---
RPO
Recovery Point Objective
perte maximale acceptable
---
# Objectifs
Base :
RTO
30 min
RPO
24 h
---
Médias :
RTO
4 h
RPO
24 h
---
Plateforme :
RTO
8 h
RPO
24 h
---
# Sources restauration
Priorité :
backup
↓
export
↓
reconstruction
---
Sources :
DB
storage
export
git
documentation
---
# Architecture restauration
Infra
↓
DB
↓
Storage
↓
Plugin
↓
WordPress
↓
Validation
↓
Ouverture
---
# Scénario 1
Perte WordPress
Impact :
faible
Actions :
réinstaller
↓
restaurer plugin
↓
connecter DB
↓
validation
---
Objectif :
30 min
---
# Scénario 2
Perte MariaDB
Impact :
élevé
Actions :
stop
↓
restore dump
↓
restore export
↓
vérification
↓
reprise
---
Objectif :
2 heures
---
# Scénario 3
Perte stockage
Impact :
critique
Actions :
restaurer originaux
↓
vérifier checksum
↓
reconstruire dérivés
↓
publier
---
Objectif :
4 heures
---
# Scénario 4
Compromission WordPress
Impact :
moyen
Actions :
isoler
↓
couper accès
↓
réinstaller
↓
rotation secrets
↓
audit
---
Règle :
ne jamais restaurer
sans comprendre.
---
# Scénario 5
Corruption données
Impact :
critique
Actions :
identifier
↓
export
↓
rollback
↓
rejouer
---
# Scénario 6
Migration échouée
Impact :
faible
Actions :
stop bascule
↓
rollback
↓
retour lecture
↓
analyse
---
# Scénario 7
Perte totale VPS
Impact :
critique
Actions :
provision
↓
base
↓
storage
↓
code
↓
tests
↓
ouverture
---
# Reconstruction complète
Ordre :
serveur
↓
base
↓
stockage
↓
plugin
↓
frontend
↓
cache
↓
DNS
---
# Validation
Contrôler :
photos
galeries
relations
médias
export
---
Comparer :
manifest
checksum
volumes
---
# Communication
Incident :
ouvrir ticket
↓
journal
↓
rapport
---
Conserver :
date
durée
cause
impact
solution
---
# Tests
Exercices :
trimestriels
---
Inclure :
DB
storage
migration
compromission
---
# Monitoring
Mesurer :
temps restauration
écart RPO
erreurs
---
# Amélioration
Chaque incident :
produit :
documentation
automation
test
---
# Politique
Une restauration :
n’est réussie
que si :
le site fonctionne
et
les données sont validées.
---
# Objectif final
Reconstruire :
plateforme
+
catalogue
+
stockage
+
publication
sans dépendre :
d’un composant unique.