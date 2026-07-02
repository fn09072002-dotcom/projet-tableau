<?php
function saveProduct(): void {
    global $products;
    do {
        $errors = [];
        $libelle = saisie("Entrez le libellé: ");
        required($libelle, $errors, MSG_LIBELE_REQUIRED, FIELD_LIBELE);
        unique($products, $libelle, $errors, MSG_LIBELE_UNIQUE, FIELD_LIBELE);

        $prix = (int)saisie("Entrez le prix: ");
        if ($prix <= 0) {
            $errors[FIELD_PRIX][ERROR_POSITIF] = MSG_PRIX_POSITIF;
        }

        $quantite = (int)saisie("Entrez la quantité: ");
        if ($quantite <= 0) {
            $errors[FIELD_QUANTITE][ERROR_POSITIF] = MSG_QUANTITE_POSITIF;
        }

        showError($errors);
    } while (count($errors) != 0);

    $newProduct = [
        "ref"      => genererReference($products),
        FIELD_LIBELE   => $libelle,
        FIELD_PRIX     => $prix,
        FIELD_QUANTITE => $quantite,
    ];
    $products[] = $newProduct;
    echo "Produit enregistré avec succès !\n";
}

function archiverProduit(): void {
    global $productsArchived, $products;
    $value = saisie("Veuillez renseigner le libellé : ");
    $indexArchived = getProductByLibele($products, $value);
    if ($indexArchived !== -1) {
        $productArchived = supprimerProduit($indexArchived, $products);
        $productsArchived[] = $productArchived;
        echo "Produit archivé avec succès !\n";
    } else {
        echo "Produit non trouvé !\n";
    }
}