<?php

namespace SS4Research\DataObjects;

use SilverStripe\ORM\DataObject;

class Hero extends DataObject
{
    /**
     * @var string
     */
    private static $table_name = 'HeroImage';

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar(255)',
        'Occupation' => 'Varchar(255)',
        'BirthDate' => 'Date',
    ];
}
