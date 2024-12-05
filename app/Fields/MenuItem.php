<?php

namespace App\Fields;

use Log1x\AcfComposer\Builder;
use Log1x\AcfComposer\Field;

class MenuItem extends Field
{
    /**
     * The field group.
     */
    public function fields(): array
    {
        $fields = Builder::make('menu_item');

        $fields
            ->setLocation('nav_menu_item', '==', 'location/primary_navigation');

        $fields
            ->addTrueFalse('enable_megamenu', ['label' => 'Megamenü']);

        return $fields->build();
    }
}
