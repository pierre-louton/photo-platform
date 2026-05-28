# Deployment
Version : V1
Objectif :
Définir le mode de déploiement
de la plateforme.
Contraintes :
- pas de Docker ;
- simplicité ;
- migration possible ;
- sauvegarde facile.
---
# Principes
Le déploiement :
doit rester compréhensible.
Chaque composant :
installable
séparément.
---
# Environnements
local
↓
integration
↓
preproduction
↓
production
---
# Architecture
Internet
↓
CDN
↓
Nginx
↓
PHP-FPM
↓
WordPress
↓
Plugin métier
↓
MariaDB
↓
Stockage
---
# Hébergement
V1
VPS
---
Évolution :
serveurs séparés
---
# Distribution
Linux
Préférence :
Debian
Alternative :
Rocky
Ubuntu LTS
---
# Répertoires
/var/www/site
/var/www/plugin
/var/storage
/var/log
/var/backup
---
# Séparation
Code :
lecture
---
Storage :
lecture écriture
---
Logs :
écriture
---
# Web
Serveur :
Nginx
---
HTTP
↓
HTTPS
↓
PHP-FPM
---
# PHP
Version :
8.4
Extensions :
opcache
curl
intl
gd
imagick
mbstring
zip
pdo
pgsql
mysqli
redis
---
# WordPress
Rôle :
présentation
Administration
SEO
---
Interdit :
stockage métier
---
# Plugin
Déploiement :
répertoire dédié
Exemple :
wp-content/plugins/photo-platform
---
# Base
V1 :
MariaDB
Version :
LTS
---
Préparer :
PostgreSQL
---
Comptes :
app_read
app_write
admin
---
# Cache
V1
Redis
Usages :
objet
session
requêtes
---
# Stockage
Interdit :
wp-content/uploads
---
Autorisé :
/var/storage
---
Structure :
original
preview
cache
archive
---
# Déploiement
Étapes :
backup
↓
code
↓
migration
↓
warmup
↓
switch
↓
validation
---
# Migrations
Versionnées.
Exemple :
V001
V002
V003
---
# Configuration
Interdit :
config dans dépôt
---
Autorisé :
env
config locale
---
# Sauvegarde
Base :
quotidienne
---
Storage :
quotidien
---
Code :
git
---
Conserver :
30 jours
---
# Restauration
Tester :
mensuellement
---
Objectif :
< 1 heure
---
# Logs
Séparer :
nginx
php
plugin
import
audit
---
# Monitoring
Mesures :
cpu
ram
io
temps réponse
volume stockage
---
# Mise à jour
Ordre :
OS
↓
PHP
↓
Plugin
↓
WordPress
↓
Thème
---
# Rollback
Étapes :
stop
↓
restore
↓
cache clear
↓
validation
---
# Disponibilité
Objectif :
99.5 %
---
# Migration future
Le déploiement doit permettre :
séparer :
DB
↓
API
↓
Frontend
sans :
réécriture.
---
# V2
Séparer :
web
db
storage
---
# V3
API dédiée
---
# V4
headless
---
# Objectif final
Pouvoir remplacer :
WordPress
sans :
redéployer
le domaine métier.