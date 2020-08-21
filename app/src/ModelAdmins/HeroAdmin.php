<?php

namespace SS4Research\ModelAdmins;

use SilverStripe\Admin\ModelAdmin;
use SS4Research\DataObjects\Hero;

class HeroAdmin extends ModelAdmin
{
    /**
     * @var array
     */
    private static $managed_models = [
        Hero::class
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
}
