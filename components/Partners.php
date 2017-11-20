<?php namespace Abnmt\TheaterPartners\Components;

use Abnmt\TheaterPartners\Models\Category as CategoryModel;
use Abnmt\TheaterPartners\Models\Partner as PartnerModel;
use Cms\Classes\ComponentBase;

class Partners extends ComponentBase
{

    public function componentDetails()
    {
        return [
            'name'        => 'abnmt.theaterpartners::lang.components.partners.name',
            'description' => 'abnmt.theaterpartners::lang.components.partners.description',
        ];
    }

    public function defineProperties()
    {
        return [
            'category' => [
                'title'       => 'Категории',
                'description' => 'Загружает выбранную категорию',
                'type'        => 'dropdown',
            ],
        ];
    }

    public function getCategoryOptions()
    {
        return CategoryModel::orderBy('name')->lists('name', 'slug');
    }

    /**
     * A collection of partners to display
     * @var Collection
     */
    public $partners;
    /**
     * If the post list should be filtered by a category, the model to use.
     * @var Model
     */
    public $category;

    public function onRun()
    {
        $this->prepareVars();
        $this->partners = $this->page['partners'] = $this->listPartners();
    }

    protected function prepareVars()
    {
        $this->category = $this->page['category'] = $this->property('category');
    }

    private function listPartners()
    {
        $category = $this->property('category');

        if (!is_null($category)) {
            $partners = PartnerModel::getCategory($category);

            return $partners;
        } else {
            return null;
        }
    }

}
