# MLD v1

## photographer
- id UUID PK
- name

## gallery
- id UUID PK
- photographer_id FK
- title
- slug
- status
- created_at

## photo
- id UUID PK
- gallery_id FK
- filename
- checksum
- captured_at
- metadata_json
- created_at

## collection
- id UUID PK
- photographer_id FK
- name
- slug
- parent_id NULL
- created_at

## classification
- id UUID PK
- photo_id FK
- collection_id FK
- source
- state
- confidence NULL
- validated_at NULL
- created_at
- updated_at

## Contraintes
- unicité photo_id + collection_id + state actif
- suppression gallery => suppression photo => suppression classification
