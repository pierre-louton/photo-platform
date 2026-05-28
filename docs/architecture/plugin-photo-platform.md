# Plugin Photo Platform
Version : V1
Objectif :
Définir le rôle du plugin WordPress.
Le plugin est :
une couche d’intégration.
Le plugin n’est pas :
le domaine métier.
---
# Responsabilités
Le plugin :
- expose des écrans ;
- publie des endpoints ;
- appelle les services ;
- fournit des widgets.
Le plugin ne :
- stocke pas les données ;
- ne fait pas de SQL direct ;
- ne possède pas les médias.
---
# Architecture
Elementor
↓
Controllers
↓
Services
↓
Repositories
↓
Storage
↓
Base
---
# Structure
photo-platform/
src/
Domain/
Application/
Infrastructure/
Presentation/
Rest/
Cli/
Import/
Storage/
config/
tests/
---
# Domain
Responsabilité :
règles métier.
Contient :
Photo
Gallery
Partner
Event
Taxonomy
Import
Interdit :
WordPress
---
# Application
Responsabilité :
cas d’usage.
Exemples :
PublishPhoto
ImportPhoto
SearchPhoto
GenerateGallery
---
# Infrastructure
Responsabilité :
accès externes.
Contient :
MariaDB
PostgreSQL
Storage
Cache
REST
---
# Presentation
Responsabilité :
WordPress.
Contient :
pages
widgets
admin
Elementor
---
# Rest
Responsabilité :
API interne.
Routes :
GET /photos
GET /gallery
POST /import
---
# CLI
Responsabilité :
opérations système.
Exemples :
import
cleanup
cache
export
---
# Services
Exemples :
PhotoService
GalleryService
ImportService
SearchService
StorageService
ExportService
---
# Repositories
Interdiction :
SQL dans Services
Autorisé :
Repository
Exemple :
PhotoRepository
---
# Flux publication
Elementor
↓
Controller
↓
PhotoService
↓
Repository
↓
DB
↓
Storage
↓
DTO
↓
Widget
---
# Widgets Elementor
Objectif :
consommer les services.
Widgets :
Photo Grid
Photo Viewer
Gallery
Photographer
Search
Map
Partner
Event
---
# Administration
Écran :
Gestion Photos
↓
Import
↓
Validation
↓
Publication
↓
Monitoring
---
# Permissions
WordPress :
éditeur
administrateur
photographe
Domain :
publish
import
archive
---
# Cache
Niveaux :
widget
↓
API
↓
DB
↓
storage
---
# Observabilité
Mesures :
temps réponse
erreurs
cache hit
volume
---
# Journal
Tables :
system_log
import_log
audit_log
---
# Tests
Unitaires
Intégration
Fonctionnels
Migration
---
# Évolutions
V2
API externe
---
V3
headless
---
V4
microservice
---
# Objectif final
Remplacer WordPress
sans modifier :
Domain
Application
Infrastructure