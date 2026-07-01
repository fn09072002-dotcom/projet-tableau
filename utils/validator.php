<?php
function required(string $value, array &$errors, string $errorRequired, string $fieldName = "libele"): void {
    if (empty($value)) {
        $errors[$fieldName]['required'] = $errorRequired;
    }
}

function unique(array $datas, string $value, array &$errors, string $errorUnique, string $key = 'libele'): void {
    foreach ($datas as $data) {
        if ($data[$key] === $value) {
            $errors[$key]['unique'] = $errorUnique;
        }
    }
}