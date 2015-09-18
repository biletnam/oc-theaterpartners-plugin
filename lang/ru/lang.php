<?php

return [
    'plugin' => [
        'name' => 'Партнеры',
        'description' => 'Плагин управления партнерами для театра',
    ],
    'components' => [
        'partners' => [
            'name' => 'Партнеры',
            'description' => 'Выводит партнеров и спонсоров',
        ],
    ],
    'partner' => [
        'label' => 'Партнер',
        'create_title' => 'Создание',
        'update_title' => 'Обновление',
        'preview_title' => 'Просмотр',
        'list_title' => 'Партнеры',
        'new' => 'Новый',
        'title' => 'Заголовок',
        'title_placeholder' => 'Введите заголовок',
        'slug' => 'Слаг',
        'slug_placeholder' => 'Введите слаг',
        'tab_manage' => 'Редактироваие',
        'cover' => 'Обложка',
        'logo_color' => 'Цветной логотип',
        'logo_bw' => 'Черно-белый логотип',
    ],
    'partners' => [
        'menu_label' => 'Партнеры',
        'return_to_list' => 'Вернуться к списку',
        'delete_confirm' => 'Удалить?',
        'delete_selected_confirm' => 'Удалить выбранные?',
        'delete_selected_success' => 'Удалено!',
        'delete_selected_empty' => 'Выбор пуст!',
    ],
    'category' => [
        'label' => 'Категория',
        'create_title' => 'Создание',
        'update_title' => 'Обновление',
        'preview_title' => 'Просмотр',
        'list_title' => 'Категории',
        'new' => 'Новая',
        'name' => 'Имя',
        'partners' => 'Партнеры',
        'name_placeholder' => 'Введите имя категории',
        'slug' => 'Слаг',
        'slug_placeholder' => 'Введите слаг',
    ],
    'categories' => [
        'menu_label' => 'Категории',
        'return_to_list' => 'Вернуться к списку',
        'delete_confirm' => 'Удалить',
        'delete_selected_confirm' => 'Удалить выбранные?',
        'delete_selected_success' => 'Удалено!',
        'delete_selected_empty' => 'Выбор пуст',
    ],
    'post' => [
        'title' => 'Заголовок',
        'category' => 'Категория',
        'published' => 'Опубликовано',
        'category_comment' => 'Выберите категорию',
        'category_placeholder' => 'Выберите категорию',
    ],
];