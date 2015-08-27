<?php namespace Abnmt\TheaterPartners\Controllers;

use BackendMenu;
use Backend\Classes\Controller;
use Flash;
use Lang;

/**
 * Partners Back-end Controller
 */
class Partners extends Controller
{
    public $implement = [
        'Backend.Behaviors.FormController',
        'Backend.Behaviors.ListController'
    ];

    public $formConfig = 'config_form.yaml';
    public $listConfig = 'config_list.yaml';

    public function __construct()
    {
        parent::__construct();

        BackendMenu::setContext('Abnmt.TheaterPartners', 'theaterpartners', 'partners');
    }

    /**
     * Deleted checked partners.
     */
    public function index_onDelete()
    {
        if (($checkedIds = post('checked')) && is_array($checkedIds) && count($checkedIds)) {

            foreach ($checkedIds as $partnerId) {
                if (!$partner = Partner::find($partnerId)) continue;
                $partner->delete();
            }

            Flash::success(Lang::get('abnmt.theaterpartners::lang.partners.delete_selected_success'));
        }
        else {
            Flash::error(Lang::get('abnmt.theaterpartners::lang.partners.delete_selected_empty'));
        }

        return $this->listRefresh();
    }
}