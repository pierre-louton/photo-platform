Infrastructure dépend du domaine et jamais l’inverse.

# allowed:
Presentation:
 - Application
 - Shared
Application:
 - Domain
 - Shared
Infrastructure:
 - Domain
 - Shared
Domain:
 - Shared

# Important forbidden:
- Domain->Infrastructure
- Domain->Wordpress
- Application->Presentation
- Infrastructure->Application

# exemple
             +------------------+
             |  Presentation    |
             |------------------|
             | REST             |
             | Elementor        |
             | Admin            |
             +--------+---------+
                      |
                      v
             +------------------+
             |  Application     |
             |------------------|
             | Use Cases        |
             | Commands         |
             | Queries          |
             +--------+---------+
                      |
                      v
             +------------------+
             |     Domain       |
             |------------------|
             | Gallery          |
             | Rules            |
             | Invariants       |
             +--------+---------+
                      ^
                      |
             +------------------+
             | Infrastructure   |
             |------------------|
             | SQL              |
             | Storage          |
             | Wordpress        |
             +------------------+
			 
# règles absolues 
# 1. Domain ne dépend de RIEN
Le domaine :
	ignore WordPress ;
	ignore SQL ;
	ignore HTTP ;
	ignore JSON ;
	ignore le cache ;
	ignore Elementor.
Le domaine doit pouvoir tourner dans un test PHP vide sans WordPress installé.

# 2. domaine Application orchestre uniquement
Application :
	ne fait pas de SQL ;
	ne fait pas de HTML ;
	ne fait pas de WP_Query ;
	ne connaît pas le frontend.

Ce qu'elle fait:
	ouvre transaction ;
	charge agrégat ;
	appelle métier ;
	persiste ;
	émet événements.

# 3. Infrastructure implémente

Infrastructure :
	adapte ;
	persiste ;
	traduit ;
	connecte.
Mais :
	aucune règle métier ;
	aucun workflow métier.
	
# 4. Presentation traduit le monde extérieur

REST :
	HTTP → Command
Admin :
	formulaire → Command
CLI :
	terminal → Command
Presentation ne doit jamais :
	manipuler SQL ;
	charger repository directement ;
	appeler le domaine directement.
	


## Règles renforcées

```text
Presentation → Application
Application → Domain
Infrastructure → Domain
Domain → Shared
```

Interdictions :

```text
Domain → Wordpress
Domain → SQL
Presentation → Domain
Infrastructure → Application
```
