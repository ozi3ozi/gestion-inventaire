<?php

namespace Tests;

use PHPUnit\Framework\TestCase;
use App\GestionProduits;

class GestionProduitsTest extends TestCase
{
    private $gestionProduits;
    private $produits;

    protected function setUp(): void
    {
        $this->gestionProduits = new GestionProduits();
        $this->produits = [
            ["id" => 1, "nom" => "Chaise", "prix" => 199.99],
            ["id" => 2, "nom" => "Bureau", "prix" => 299.99],
            ["id" => 3, "nom" => "Stylo", "prix" => 2.50]
        ];
    }

    /**
     * Test pour trouver le produit le plus cher (cas unique)
     */
    public function testTrouverProduitPlusCher(): void
    {
        $resultat = $this->gestionProduits->trouverProduitPlusCher($this->produits);
        $this->assertIsArray($resultat);
        $this->assertCount(1, $resultat);
        $this->assertEquals(["Bureau"], $resultat);
    }

    /**
     * Test pour trouver les produits les plus chers (cas multiple)
     */
    public function testTrouverProduitsPlusCherMultiple(): void
    {
        $produitsMultiples = [
            ["id" => 1, "nom" => "Chaise", "prix" => 199.99],
            ["id" => 2, "nom" => "Bureau", "prix" => 299.99],
            ["id" => 3, "nom" => "Armoire", "prix" => 299.99],
            ["id" => 4, "nom" => "Stylo", "prix" => 2.50]
        ];
        
        $resultat = $this->gestionProduits->trouverProduitPlusCher($produitsMultiples);
        $this->assertIsArray($resultat);
        $this->assertCount(2, $resultat);
        $this->assertEquals(["Bureau", "Armoire"], $resultat);
        // Vérifie sans tenir compte de l'ordre
        $this->assertEqualsCanonicalizing(["Bureau", "Armoire"], $resultat);
    }

    /**
     * Test pour vérifier l'exception avec un tableau vide
     */
    public function testTrouverProduitPlusCherTableauVide(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->gestionProduits->trouverProduitPlusCher([]);
    }

    /**
     * Test pour filtrer les produits par prix
     */
    public function testFiltrerProduitsParPrix(): void
    {
        $resultat = $this->gestionProduits->filtrerProduitsParPrix($this->produits, 100.00);
        $this->assertCount(1, $resultat);
        $produitFiltre = reset($resultat);
        $this->assertEquals("Stylo", $produitFiltre['nom']);
    }

    /**
     * Test pour vérifier l'exception avec un tableau vide
     */
    public function testFiltrerProduitsParPrixTableauVide(): void
    {
        $this->expectException(\InvalidArgumentException::class);
        $this->gestionProduits->filtrerProduitsParPrix([], 100.00);
    }
}
