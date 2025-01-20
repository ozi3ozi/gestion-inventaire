# Réponse à la question 2 du test technique en PHP

## Fonctionnalités

- Trouver le ou les produits les plus cher dans l'inventaire
- Filtrer les produits par prix maximum

## Installation

1. Cloner le projet
2. Installer les dépendances :
```bash
composer install
```

## Tests

Pour exécuter les tests :
```bash
./vendor/bin/phpunit tests
```

## Exemple d'utilisation

```php
$produits = [
    ["id" => 1, "nom" => "Chaise", "prix" => 199.99],
    ["id" => 2, "nom" => "Table", "prix" => 299.99],
    ["id" => 3, "nom" => "Stylo", "prix" => 2.50]
];

$gestion = new App\GestionProduits();

// Trouver le produit le plus cher
$nomPlusCher = $gestion->trouverProduitPlusCher($produits);

// Filtrer les produits moins chers que 200€
$produitsFiltres = $gestion->filtrerProduitsParPrix($produits, 200.00);
```
