<?php
function saveClient(): void {
    global $clients;
    do {
        $errors = [];
        $nomPrenom = saisie("Entrer votre nom: ");
        required($nomPrenom, $errors, MSG_NOM_PRENOM_REQUIRED, FIELD_NOM_PRENOM);

        $telephone = saisie("Entrer le telephone: ");
        required($telephone, $errors, MSG_TEL_REQUIRED, FIELD_TEL);
        if (!empty($telephone)) {
            unique($clients, $telephone, $errors, MSG_TEL_UNIQUE, FIELD_TEL);
        }

        $adress = saisie("Entrer votre address: ");
        showError($errors);
    } while (count($errors) != 0);

    $newClient = [
        FIELD_NOM_PRENOM => $nomPrenom,
        FIELD_TEL         => $telephone,
        FIELD_ADRESSE     => $adress,
    ];
    $clients[] = $newClient;
    echo "Client enregistré avec succès !\n";
}