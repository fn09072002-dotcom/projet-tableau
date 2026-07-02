<?php
function listerClients(array $clients): void {
    if (empty($clients)) {
        echo "Aucun client trouvé !\n";
        return;
    }
    foreach ($clients as $client) {
        echo "Nom : {$client[FIELD_NOM_PRENOM]} - Tel : {$client[FIELD_TEL]}\n";
    }
}