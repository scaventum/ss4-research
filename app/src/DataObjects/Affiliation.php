<?php

namespace SS4Research\DataObjects;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;

class Affiliation extends DataObject
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
    private static $table_name = 'Affiliation';

    /**
     * @var string
     */
    private static $plural_name = 'Affiliations';
    private static $singular_name = 'Affiliation';

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar(255)',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'ID' => 'Affiliation ID',
        'Name' => 'Name',
    ];
}
