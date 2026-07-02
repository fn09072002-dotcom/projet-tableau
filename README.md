# Projet Tableau

Application PHP en ligne de commande pour la gestion des produits, clients, commandes et paiements d'un point de vente. Architecture inspirée du pattern MVC, développée par incréments.

## Structure du projet

```
projet-tableau/
├── index.php                          # Point d'entrée, orchestre les appels
├── model/
│   ├── product.model.php              # $products, $productsArchived
│   ├── client.model.php               # $clients
│   └── commande.model.php             # $commandes, $paiements
├── service/
│   └── service.php                    # Logique métier réutilisable
├── controller/
│   ├── product.controller.php         # Saisie + orchestration produits
│   └── client.controller.php          # Saisie + orchestration clients
├── view/
│   ├── product.view.php               # Affichage produits
│   └── client.view.php                # Affichage clients
└── utils/
    ├── validator.php                  # required(), unique()
    ├── error.php                      # Constantes + showError()
    └── view.utils.php                 # saisie()
```

## Prérequis

- PHP 8+ (CLI)

## Lancer le projet

```bash
php index.php
```

Le script est interactif : il demande les saisies au clavier au fur et à mesure de son exécution.

## Fonctionnalités

### Increment 1 — Gestion des produits

- **Enregistrer un produit** (`saveProduct`)
  - RG1 : le libellé est obligatoire et unique
  - RG2 : la référence est générée automatiquement au format `REF001`, `REF010`, `REF100`
  - RG3 : le prix et la quantité doivent être positifs
- **Archiver un produit** (`archiverProduit`) : déplace un produit de `$products` vers `$productsArchived` à partir de son libellé
- **Lister les produits** (`listerProduits`) : affiche les produits archivés ou non archivés

### Increment 2 — Gestion des clients

- **Enregistrer un client** (`saveClient`)
  - RG1 : le téléphone est obligatoire et unique
  - RG2 : le nom et prénom sont obligatoires
- **Lister les clients sans commande** (`listerClientsSansCommande`) : affiche les clients qui n'apparaissent dans aucune commande de `$commandes`

## Conventions de code

- Toutes les clés de champs (`libele`, `prix`, `nomPrenom`, `tel`, `address`...) et les messages d'erreur sont centralisés en constantes dans `utils/error.php` (ex. `FIELD_LIBELE`, `MSG_TEL_UNIQUE`), afin d'éviter les fautes de frappe silencieuses dans les tableaux associatifs.
- Chaque couche a une responsabilité unique :
  - **model** : données brutes
  - **service** : règles métier réutilisables (ex. `genererReference`, `clientsSansCommande`)
  - **controller** : saisie utilisateur + orchestration (appelle service et view)
  - **view** : affichage uniquement
  - **utils** : fonctions transverses (validation, saisie, gestion des erreurs)

## Workflow Git

Le projet suit un flux à plusieurs branches :

```
feat/<nom-feature>  →  increment/<n>  →  develop  →  master
```

- Chaque fonctionnalité est développée sur une branche `feat/...`, avec un commit par sous-fonctionnalité.
- La branche `feat/...` est fusionnée dans `increment/<n>` correspondant.
- `increment/<n>` est fusionné dans `develop`.
- `develop` est fusionné dans `master`, puis un tag de version est posé.

### Historique des versions

| Tag | Contenu |
|---|---|
| `v1.0.0` | Gestion des produits (increment 1) |
| `v1.1.0` | Correctifs increment 1 |
| `v2.0.0` | Gestion des clients (increment 2) |

## À venir

- Modification / suppression d'un client
- Gestion des commandes (création, calcul du montant, changement d'état PAYER/IMPAYER)
- Gestion des paiements et facturation
