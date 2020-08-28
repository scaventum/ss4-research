<?php

namespace SS4Research\DataObjects;

use SilverStripe\ORM\DataObject;
use SilverStripe\Versioned\Versioned;
use SS4Research\DataObjects\Hero;

class Role extends DataObject
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
    private static $table_name = 'Role';

    /**
     * @var string
     */
    private static $plural_name = 'Roles';
    private static $singular_name = 'Role';

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar(255)',
    ];

    /**
     * @var string
     */
    private static $default_sort = 'Name Asc';

    /**
     * @var array
     */
    private static $belongs_many_many = [
        "Heroes" => Hero::class,
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'ID' => 'Role ID',
        'Name' => 'Name',
    ];
}
