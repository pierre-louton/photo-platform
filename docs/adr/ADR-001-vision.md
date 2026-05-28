# ADR-001 — Vision d’architecture

Statut : ACCEPTÉ

Date : 2026-05

---

## Contexte

Le projet démarre avec un seul photographe.

Le système doit permettre :

- l’arrivée de nouveaux photographes ;
- la montée en charge ;
- une migration hors WordPress.

---

## Décision

WordPress est utilisé uniquement pour :

- présentation ;
- administration ;
- SEO.

Le domaine métier est externalisé.

---

## Conséquences

Positives :

- migration facilitée ;
- indépendance technique ;
- stabilité du modèle.

Négatives :

- développement initial plus important ;
- couche d’abstraction supplémentaire.

---

## Alternatives rejetées

### Tout dans WordPress

Refusée :

couplage trop fort.

### Headless immédiat

Refusée :

complexité trop élevée pour V1.