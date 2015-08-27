<?php namespace Abnmt\TheaterPartners\Components;

use Cms\Classes\ComponentBase;

class Partners extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'abnmt.theaterpartners::lang.components.partners.name',
            'description' => 'abnmt.theaterpartners::lang.components.partners.description'
        ];
    }

    public function defineProperties()
    {
        return [];
    }

}