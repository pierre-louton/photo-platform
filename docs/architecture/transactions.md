# Transactions

## Principe directeur

```text
1 use case = 1 transaction
```

## Objectif

Garantir :
- cohérence ;
- atomicité ;
- invariants métier.

## Exemple

```text
PublishGallery

BEGIN

load aggregate
gallery.publish()
persist aggregate

COMMIT
```

## Interdictions

- Transactions dans Presentation
- Transactions dans Domain
- Transactions imbriquées non maîtrisées
