<?php

namespace SS4Research\DataObjects;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class Hero extends DataObject
{
    /**
     * @var array
     */
    private static $extensions = [
        Versioned::class,
    ];

    /**
     * @var string
     */
    private static $table_name = 'Hero';

    /**
     * @var string
     */
    private static $plural_name = 'Heroes';
    private static $singular_name = 'Hero';

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar(255)',
        'Occupation' => 'Varchar(255)',
        'BirthDate' => 'Date',
        'BaseAttackDamage' => 'Int',
        'BaseArmor' => 'Int',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'ID' => 'Hero ID',
        'Name' => 'Name',
        'Occupation' => 'Occupation',
        'BirthDate.Nice' => 'Birth Date',
        'BaseAttackDamage' => 'Base Attack Damage',
        'BaseArmor' => 'Base Armor',
    ];
}
