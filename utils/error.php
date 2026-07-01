<?php
function showError(array $errors): void {
    foreach ($errors as $errorField) {
        foreach ($errorField as $error) {
            echo "$error \n";
        }
    }
}