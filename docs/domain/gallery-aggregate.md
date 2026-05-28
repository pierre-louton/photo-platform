# Gallery Aggregate

## Rôle
La galerie est l'agrégat propriétaire des photos.

## Structure

Photographer
 └── Gallery
       └── Photo

## Responsabilités
- import des photos ;
- cohérence éditoriale ;
- publication ;
- archivage ;
- suppression en cascade.

## Invariants
- une photo appartient à une seule galerie ;
- une galerie publiée ne peut pas être vide ;
- suppression galerie => suppression photos ;
- une photo ne peut pas être importée deux fois dans la même galerie.

## Relations avec les collections
Les collections ne possèdent pas les photos.
Elles utilisent des classifications transversales.
