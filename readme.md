# E-boutique

## Description du Projet

Ce projet représente une e-boutique permettant aux utilisateurs de naviguer à travers des catégories de produits, ajouter des articles à leur panier, ajuster les quantités, et effectuer des commandes. L’application inclut également un système d’inscription et de connexion pour gérer les utilisateurs, ainsi que des fonctionnalités permettant d’ajouter de nouveaux produits et catégories.

Le code source de ce projet est disponible sur Github. Le projet est en production sur alwaysdata. La version déployée en production est identique à celle du dépôt.

**Lien site hébergé** : https://milton.alwaysdata.net/eboutique

**Lien repository github** :https://github.com/Oxydase/eboutique

---

## Fonctionnalités

| Fonctionnalité                             | Statut           |
|--------------------------------------------|------------------|
| **Login (connexion)**                      | OK               |
| **Inscription**                            | OK               |
| **Parcours par catégorie**                 | OK               |
| **Parcours des articles**                  | OK               |
| **Mise au panier**                         | OK               |
| **Ajustement des quantités avec le prix total** | OK            |
| **Message de commande effectuée**          | A IMPLEMENTER, ACTUELLEMENT LE PANIER SE VIDE SANS MESSAGE DE COMMANDE EFFECTUEE               |
| **Ajout d'un nouveau produit**             | OK               |
| **Ajout d'une nouvelle catégorie**         | OK               |
| **Restriction d'accès par rôle utilisateur** | OK             |
| **Affichage du profil utilisateur**        | OK               |

### Détails des Fonctionnalités Implémentées :

1. **Inscription** : L'utilisateur peut créer un compte en remplissant un formulaire avec ses informations personnelles.
2. **Connexion** : Un système de login sécurisé pour les utilisateurs enregistrés.
3. **Gestion des utilisateurs** : Les utilisateurs peuvent se connecter, s’inscrire et consulter leur profil.
4. **Gestion des catégories et produits** : Les administrateurs peuvent ajouter de nouvelles catégories et de nouveaux produits.
5. **Parcours des catégories et des produits** : Les utilisateurs peuvent naviguer à travers différentes catégories de produits et consulter les détails des articles.
6. **Mise au panier** : Les utilisateurs peuvent ajouter des produits à leur panier.
7. **Ajustement des quantités au panier** : Les utilisateurs peuvent modifier la quantité d’articles dans leur panier avec recalcul du prix total.
8. **Message de commande effectuée** : Lors de la validation de la commande, un message de confirmation est affiché à l'utilisateur.
9. **Restriction d'accès en fonction des rôles** : Certaines pages sont accessibles uniquement aux utilisateurs ayant des rôles spécifiques (ex : administrateur, utilisateur classique).
10. **Affichage du profil utilisateur** : Les utilisateurs peuvent consulter leur profil, afficher leurs informations personnelles et modifier celles-ci si nécessaire.

---

### Améliorations possibles :

1. Modification du mot de passe depuis le profil utilisateur
2. Ajout média pour un article lors d'un ajout d'article depuis le dashboard