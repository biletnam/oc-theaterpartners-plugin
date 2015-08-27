<?php namespace Abnmt\TheaterPartners;

use System\Classes\PluginBase;


use Illuminate\Foundation\AliasLoader;
/**
 * TheaterPartners Plugin Information File
 */
class Plugin extends PluginBase
{

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'abnmt.theaterpartners::lang.plugin.name',
            'description' => 'abnmt.theaterpartners::lang.plugin.description',
            'author'      => 'Abnmt',
            'icon'        => 'icon-leaf'
        ];
    }

    public function registerNavigation()
    {
        return [
            'theaterpartners' => [
                'label' => 'Партнеры',
                'url' => \Backend::url('abnmt/theaterpartners/partners'),
                'icon' => 'icon-pencil',
                'order' => 600,
                'sideMenu' => [
                    'partners' => [
                        'label' => 'Партнеры',
                        'icon'  => 'icon-pencil',
                        'url'   => \Backend::url('abnmt/theaterpartners/partners'),
                    ],
                    'categories' => [
                        'label' => 'Категории',
                        'icon'  => 'icon-list',
                        'url'   => \Backend::url('abnmt/theaterpartners/categories'),
                    ],
                ],
            ],
        ];
    }

    /**
     * Register Components
     * @return array
     */
    public function registerComponents()
    {
        return [
            'Abnmt\TheaterPartners\Components\Partners' => 'theaterPartners',
        ];
    }

    public function boot()
    {
        $alias = AliasLoader::getInstance();
        $alias->alias( 'CW', '\Clockwork\Support\Laravel\Facade' );
    }
}
