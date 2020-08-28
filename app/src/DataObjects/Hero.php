<?php

namespace SS4Research\DataObjects;

use SilverStripe\Forms\CheckboxSetField;
use SilverStripe\ORM\DataObject;
use SilverStripe\ORM\FieldType\DBField;
use SilverStripe\Versioned\Versioned;
use SS4Research\DataObjects\Affiliation;
use SS4Research\DataObjects\Role;

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
     * @var string
     */
    private static $default_sort = 'Name Asc';

    /**
     * @var array
     */
    private static $many_many = [
        "Affiliations" => Affiliation::class,
        "Roles" => Role::class,
    ];

    /**
     * @var array
     */
    private static $summary_fields = [
        'ID' => 'Hero ID',
        'Name' => 'Name',
        'Occupation' => 'Occupation',
        'ListedAffiliations' => 'Affiliations',
        'ListedRoles' => 'Roles',
        'BirthDate.Nice' => 'Birth Date',
        'BaseAttackDamage' => 'Base Attack Damage',
        'BaseArmor' => 'Base Armor',
    ];

    /**
     * {@inheritdoc}
     */
    public function getCMSFields()
    {
        $fields = parent::getCMSFields();

        // Change Affiliations and Roles GridField to CheckboxSetField
        $fields->removeByName('Affiliations');
        $fields->removeByName('Roles');
        $fields->addFieldsToTab(
            'Root.AffiliationsAndRoles',
            [
                CheckboxSetField::create('Affiliations', 'Affiliations', Affiliation::get()->map('ID', 'Name')),
                CheckboxSetField::create('Roles', 'Roles', Role::get()->map('ID', 'Name')),
            ]
        );

        return $fields;
    }

    /**
     * Return stringified Hero Affiliations
     */
    public function getListedAffiliations(): DBField
    {
        return $this->getListedItemsForColumn($this->Affiliations());
    }

    /**
     * Return stringified Hero Roles
     */
    public function getListedRoles(): DBField
    {
        return $this->getListedItemsForColumn($this->Roles());
    }

    /**
     * Return stringified items
     * 
     * @param mixed|ArrayList|DataList
     */
    public function getListedItemsForColumn($items): DBField
    {
        $listedItems = '<ul>';

        foreach ($items as $item) {
            $listedItems .= '<li>' . $item->Name . '</li>';
        }

        $listedItems .= '</ul>';

        return DBField::create_field('HTMLText', $listedItems);
    }
}
