# ADR-005 — Collections are editorial vocabularies

## Status
Accepted

## Context
Les collections ne doivent pas posséder les photos.
Le système doit permettre plusieurs classifications transversales.

## Decision
Les collections sont des vocabulaires éditoriaux.
Les associations Photo <-> Collection passent par l'entité Classification.

## Consequences
- taxonomie évolutive ;
- reclassification possible ;
- import Lightroom souple ;
- futures suggestions IA.
