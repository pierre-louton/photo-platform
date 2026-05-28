# Security Architecture

Version : V1

Objectif :

Définir les règles de sécurité
de la plateforme.

La sécurité doit :

- protéger les médias ;
- protéger les données ;
- protéger les accès ;
- rester compatible avec l’évolution.

---
# Principes

Sécurité :
par couches.
Aucune protection unique.

---
# Architecture

Utilisateur
↓
CDN
↓
Reverse Proxy
↓
WordPress
↓
Plugin
↓
API
↓
DB
↓
Storage

---
# Zones

Zone publique
pages
galeries
recherche
---
Zone authentifiée
administration
publication
import
---

Zone privée
stockage
base
journaux
---

# Responsabilités

WordPress :
authentification
---

Plugin :
autorisation
---

Domaine :
règles métier
---

Infrastructure :
protection
---

# Identité

Identifiant public :

UUID
Interdit :
ID techniques
---

# Authentification

V1
WordPress Session
---
V2
JWT
---
V3
OIDC
---

# Autorisation
Principe :
deny by default
---
Permissions :
view
publish
archive
import
export
admin
---
# Rôles
visiteur
photographe
éditeur
administrateur
---
# Médias
Interdiction :
accès direct stockage
---

Autorisé :
/media/{uuid}
↓
service
↓
validation
---

Interdiction :
/uploads/
---

# Originaux

Jamais exposés.
Règle :
lecture privée uniquement.
---
# Dérivés
Uniquement :
preview
gallery
web
---
# Téléchargement
Par défaut :
désactivé
---
Téléchargement :
explicite
journalisé
---
# Signature URL
Format :
resource
expiration
signature
---
Durée :
300 secondes
---
# Protection contenu

Mesures :
watermark optionnel
désactivation index
anti hotlink
cache contrôlé

---
# Métadonnées

Avant publication :
suppression :
gps
série
appareil
optionnel :
conservation IPTC
---
# Import

Contrôles :
checksum
format
scan
taille
doublon
---
# Secrets

Interdiction :
clé dans dépôt
---
Autorisé :
variables environnement
vault
---
# Base

Comptes séparés :
lecture
écriture
admin
---
Principe :
moindre privilège
---

# API
Interdiction :
SQL direct
---

Validation :
entrée
sortie
journal
---

# Journalisation

Conserver :
connexion
publication
import
export
suppression
---

Tables :
audit_log
security_log
---
# Audit
Tracer :
qui
quand
quoi
résultat
---
# Monitoring
Mesures :
erreurs
temps
tentatives
origine
volume
---
# Sauvegardes
Inclure :
base
médias
manifest
checksum
---

Règle :
test restauration
mensuel
---

# Incident
Étapes :
détection
isolation
analyse
restauration
rapport

---

# Disponibilité

Objectif :

99.5 %

---
# Migration
La migration :
ne doit jamais :
exposer :
stockage
identités
secrets
---

# Politique sécurité
Toute nouvelle fonctionnalité :
doit :
fonctionner
sans :
accès direct DB
sans :
accès direct stockage
sans :
privilèges admin

---
# Objectif final
Compromettre :
WordPress
ne doit pas permettre :
compromettre
les médias
ou
les données métier.