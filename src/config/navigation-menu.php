<?php

return [
    'settings' => [
        'icon' => 'fa fa-home',
        'dashboard' => 'all',
        'title' => 'Settings',
        'route' => 'settings',
        'clickable' => true,
        'navbar' => true,
        'visibility' => false,
        'sub-menu' => [
            'product' => [
                'icon' => 'fa fa-home',
                'dashboard' => 'all',
                'title' => 'Password',
                'route' => 'password',
                'clickable' => true,
                'navbar' => true,
            ],

        ],
//        'sub-menu-display' => 'hide'
    ]
];
