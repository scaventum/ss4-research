<?php

namespace SS4Research\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use SS4Research\DataObjects\Affiliation;
use SS4Research\DataObjects\Hero;
use SS4Research\DataObjects\Role;

class HeroAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = [
        Hero::class,
        Affiliation::class,
        Role::class,
    ];

    /**
     * @var string
     */
    private static $url_segment = 'heroes';


    /**
     * @var string
     */
    private static $menu_title = 'Heroes Admin';

    /**
     * @var string
     */
    private static $menu_icon_class = 'font-icon-happy';

    /**
     * @var string
     */
    public static $model_admin_filter = 'font-icon-happy';

    /**
     * {@inheritdoc}
     */
    public function getList()
    {
        $list = parent::getList();

        $list = $this->getFilteredList($list);

        return $list;
    }

    /**
     * List of ModelAdminFilter custom fields
     */
    public function extraFilterFields(): array
    {
        $fields = [];

        if ($this->modelClass === Hero::class) {
            $fields =  [
                [
                    'fieldName' => 'BirthDate',
                    'fieldType' => 'dateRange',
                    'options' => [
                        'beginTitle' => 'Birth Date From',
                        'endTitle' => 'Birth Date To',
                    ],
                ],
                [
                    'fieldName' => 'BaseAttackDamage',
                    'fieldType' => 'numericRange',
                    'options' => [
                        'beginTitle' => 'Base Attack Damage From',
                        'endTitle' => 'Base Attack Damage To',
                    ],
                ],
            ];
        }

        return $fields;
    }

    /**
     * List of fields filtered by keyword
     */
    public function keywordSearchFilter(): array
    {
        $field = [];

        if ($this->modelClass === Hero::class) {
            $field = [
                'fieldsToMatch' => [
                    'Name' => 'PartialMatch',
                    'Occupation' => 'PartialMatch',
                ],
                'options' => [
                    'title' => 'Search by Keyword',
                ],
            ];
        } else if ($this->modelClass === Affiliation::class) {
            $field = [
                'fieldsToMatch' => [
                    'Name' => 'PartialMatch',
                ],
                'options' => [
                    'title' => 'Search by Keyword',
                ],
            ];
        } else if ($this->modelClass === Role::class) {
            $field = [
                'fieldsToMatch' => [
                    'Name' => 'PartialMatch',
                ],
                'options' => [
                    'title' => 'Search by Keyword',
                ],
            ];
        }

        return $field;
    }

    /**
     * Hide default filters of data objects
     */
    public function hideDefaultFilters(): bool
    {
        return true;
    }
}
