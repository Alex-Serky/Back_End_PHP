<?php

require 'vendor/autoload.php';

class Demo {

    private $eleves = [
        [
            'nom' => 'Anne',
            'age' => 18,
            'moyenne' => 15
        ],
        [
            'nom' => 'Marc',
            'age' => 21,
            'moyenne' => 13
        ],
        [
            'nom' => 'Jean',
            'age' => 20,
            'moyenne' => 18
        ],
        [
            'nom' => 'Gabin',
            'age' => 25,
            'moyenne' => 9
        ],
        [
            'nom' => 'Blandine',
            'age' => 20,
            'moyenne' => 7
        ]
    ];

    public function bonsEleves() {
        return array_filter($this->eleves, function ($eleve) {
            return $eleve['moyenne'] > 10;
        });
    }

    /* Autre méthode */

    public function filterFunction($eleve)
    {
        return $eleve['age'] < 20;
    }

    public function agesEleves () {
        return array($this->eleves, [$this, 'filterFunction']);
    }
}

$demo = new Demo();
dump($demo->bonsEleves());
dump($demo->agesEleves());
