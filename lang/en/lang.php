<?php

return [
    'plugin' => [
        'name' => 'TheaterPartners',
        'description' => 'No description provided yet...',
    ],
    'components' => [
        'partners' => [
            'name' => 'Partners Component',
            'description' => 'No description provided yet...',
        ],
    ],
    'partner' => [
        'label' => 'Partner',
        'create_title' => 'Create Partner',
        'update_title' => 'Edit Partner',
        'preview_title' => 'Preview Partner',
        'list_title' => 'Manage Partners',
        'new' => 'New Partner',
        'title' => 'abnmt.theaterpartners::lang.partner.title',
        'title_placeholder' => 'abnmt.theaterpartners::lang.partner.title_placeholder',
        'slug' => 'abnmt.theaterpartners::lang.partner.slug',
        'slug_placeholder' => 'abnmt.theaterpartners::lang.partner.slug_placeholder',
        'tab_manage' => 'abnmt.theaterpartners::lang.partner.tab_manage',
        'cover' => 'abnmt.theaterpartners::lang.partner.cover',
        'logo_color' => 'abnmt.theaterpartners::lang.partner.logo_color',
        'logo_bw' => 'abnmt.theaterpartners::lang.partner.logo_bw',
    ],
    'partners' => [
        'menu_label' => 'Partners',
        'return_to_list' => 'Return to Partners',
        'delete_confirm' => 'Do you really want to delete this partner?',
        'delete_selected_confirm' => 'Delete the selected partners?',
        'delete_selected_success' => 'Successfully deleted the selected partners.',
        'delete_selected_empty' => 'There are no selected :name to delete.',
    ],
    'category' => [
        'label' => 'Category',
        'create_title' => 'Create Category',
        'update_title' => 'Edit Category',
        'preview_title' => 'Preview Category',
        'list_title' => 'Manage Categories',
        'new' => 'New Category',
        'name' => 'abnmt.theaterpartners::lang.category.name',
        'partners' => 'abnmt.theaterpartners::lang.category.partners',
        'name_placeholder' => 'abnmt.theaterpartners::lang.category.name_placeholder',
        'slug' => 'abnmt.theaterpartners::lang.category.slug',
        'slug_placeholder' => 'abnmt.theaterpartners::lang.category.slug_placeholder',
    ],
    'categories' => [
        'menu_label' => 'Categories',
        'return_to_list' => 'Return to Categories',
        'delete_confirm' => 'Do you really want to delete this category?',
        'delete_selected_confirm' => 'Delete the selected categories?',
        'delete_selected_success' => 'Successfully deleted the selected categories.',
        'delete_selected_empty' => 'There are no selected :name to delete.',
    ],
    'post' => [
        'title' => 'abnmt.theaterpartners::lang.post.title',
        'category' => 'abnmt.theaterpartners::lang.post.category',
        'published' => 'abnmt.theaterpartners::lang.post.published',
    ],
];