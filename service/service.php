<?php
function genererReference(array $products): string {
    $taille = count($products) + 1;
    if ($taille <= 9) {
        $ref = "REF00";
    } elseif ($taille <= 99) {
        $ref = "REF0";
    } else {
        $ref = "REF";
    }
    return $ref . $taille;
}
function getProductByLibele(array $products, string $value): int {
    foreach ($products as $index => $product) {
        if ($product["libele"] == $value) {
            return $index;
        }
    }
    return -1;
}

function supprimerProduit(int $index, array &$products): array {
    return array_splice($products, $index, 1)[0];
}

function clientADesCommandes(int $indexClient, array $commandes): bool {
    foreach ($commandes as $commande) {
        if ($commande['client'] === $indexClient) {
            return true;
        }
    }
    return false;
}

function clientsSansCommande(array $clients, array $commandes): array {
    $resultat = [];
    foreach ($clients as $index => $client) {
        if (!clientADesCommandes($index, $commandes)) {
            $resultat[$index] = $client;
        }
    }
    return $resultat;
}