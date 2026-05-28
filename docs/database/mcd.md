# Modèle Conceptuel de Données

## Relations principales

Photographer
 1 --- n Gallery

Gallery
 1 --- n Photo

Photo
 1 --- n Classification

Collection
 1 --- n Classification

## Concepts métier

### Gallery
Contexte propriétaire des photos.

### Collection
Vocabulaire éditorial.
Pas de possession.

### Classification
Association riche entre Photo et Collection.

Attributs métier envisagés :
- source ;
- state ;
- confidence ;
- validated_at ;
- created_at ;
- updated_at.

## Sources possibles
- manual
- exif
- lightroom
- ai
- imported

## États possibles
- suggested
- accepted
- rejected
- manual
