<?php
const FIELD_LIBELE    = 'libele';
const FIELD_PRIX      = 'prix';
const FIELD_QUANTITE  = 'quantite';
const FIELD_NOM       = 'nom';
const FIELD_TEL       = 'tel';
const FIELD_ADRESSE   = 'adresse';


const ERROR_REQUIRED  = 'required';
const ERROR_UNIQUE    = 'unique';
const ERROR_POSITIF   = 'positif';


const MSG_LIBELE_REQUIRED  = "Le libellé est obligatoire";
const MSG_LIBELE_UNIQUE    = "Ce libellé existe déjà";
const MSG_PRIX_POSITIF     = "Le prix doit être positif";
const MSG_QUANTITE_POSITIF = "La quantité doit être positive";
const MSG_NOM_REQUIRED     = "Le nom est obligatoire";
const MSG_TEL_REQUIRED     = "Le téléphone est obligatoire";
const MSG_TEL_UNIQUE       = "Ce téléphone existe déjà";

function showError(array $errors): void {
    foreach ($errors as $errorField) {
        foreach ($errorField as $error) {
            echo "$error \n";
        }
    }
}