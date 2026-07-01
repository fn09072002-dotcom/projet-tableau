<?php
function listerProduits(array $products): void {
    if (empty($products)) {
        echo "Aucun produit trouvé !\n";
        return;
    }
    foreach ($products as $product) {
        echo "Libellé : {$product['libele']}\n";
    }
}