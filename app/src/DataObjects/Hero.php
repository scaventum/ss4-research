<?php

namespace SS4Research\DataObjects;

use SilverStripe\ORM\DataObject;

class Hero extends DataObject
{
    /**
     * @var string
     */
    private static $table_name = 'Hero';

    /**
     * @var array
     */
    private static $db = [
        'Name' => 'Varchar(255)',
        'Occupation' => 'Varchar(255)',
        'BirthDate' => 'Date',
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'ID' => 'Hero ID',
        'Name' => 'Name',
        'Occupation' => 'Occupation',
        'BirthDate.Nice' => 'Birth Date',
        'LastEdited.Nice' => 'Last Edit Time',
    ];
}
