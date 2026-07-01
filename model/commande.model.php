<?php
$commandes = [
    0 => [
        'client'   => 1,
        'date'     => '12/06/2026',
        'montant'  => 0,
        'etat'     => 'PAYER',
        'product'  => [
            0 => ['quantite'=>5, 'productIndex'=>0],
            1 => ['quantite'=>2, 'productIndex'=>1],
        ],
        'paiement' => 'reference1'
    ],
    1 => [
        'client'   => 1,
        'date'     => '16/06/2026',
        'montant'  => 0,
        'etat'     => 'IMPAYER',
        'product'  => [
            0 => ['quantite'=>7, 'productIndex'=>0],
            1 => ['quantite'=>3, 'productIndex'=>1],
        ],
        'paiement' => null
    ]
];

$paiements = [
    0 => [
        'date'      => '20/06/2026',
        'reference' => 'reference1',
        'facture'   => [
            'date'      => '14/06/2026',
            'reference' => 1
        ]
    ]
];