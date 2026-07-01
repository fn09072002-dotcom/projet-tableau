<?php
function saveProduct(): void {
    global $products;
    do {
        $errors = [];
        $libelle = saisie("Entrez le libellé: ");
        required($libelle, $errors, "Le libellé est obligatoire");
        unique($products, $libelle, $errors, "Ce libellé existe déjà");

        $prix = (int)saisie("Entrez le prix: ");
        if ($prix <= 0) {
            $errors['prix']['positif'] = "Le prix doit être positif";
        }

        $quantite = (int)saisie("Entrez la quantité: ");
        if ($quantite <= 0) {
            $errors['quantite']['positif'] = "La quantité doit être positive";
        }

        showError($errors);
    } while (count($errors) != 0);

    $newProduct = [
        "ref"      => genererReference($products),
        "libele"   => $libelle,
        "prix"     => $prix,
        "quantite" => $quantite,
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