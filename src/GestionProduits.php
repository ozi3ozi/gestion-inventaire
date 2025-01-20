<?php

namespace App;

class GestionProduits
{
    /**
     * Trouve le(s) nom(s) du/des produit(s) le(s) plus cher(s) dans le tableau
     * 
     * @param array $produits Tableau de produits
     * @return array Tableau des noms des produits les plus chers
     * @throws \InvalidArgumentException Si le tableau de produits est vide
     */
    public function trouverProduitPlusCher(array $produits): array
    {
        if (empty($produits)) {
            throw new \InvalidArgumentException("Le tableau de produits ne peut pas être vide");
        }
        
        $maxPrix = max(array_column($produits, 'prix'));
        $produitsPlusCher = array_filter($produits, fn($p) => $p['prix'] === $maxPrix);
        
        return array_column($produitsPlusCher, 'nom');
    }

    /**
     * Filtre les produits dont le prix est inférieur à une valeur donnée
     * 
     * @param array $produits Tableau de produits
     * @param float $prixMax Prix maximum
     * @return array Tableau des produits filtrés
     * @throws \InvalidArgumentException Si le tableau de produits est vide
     */
    public function filtrerProduitsParPrix(array $produits, float $prixMax): array
    {
        if (empty($produits)) {
            throw new \InvalidArgumentException("Le tableau de produits ne peut pas être vide");
        }

        return array_filter($produits, function($produit) use ($prixMax) {
            return $produit['prix'] < $prixMax;
        });
    }
}
