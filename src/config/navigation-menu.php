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
            'settings' => [
                'icon' => 'fa fa-home',
                'dashboard' => 'all',
                'title' => 'Profile',
                'route' => 'learner/profile-settings',
                'clickable' => true,
                'navbar' => true,
            ],

        ],
//        'sub-menu-display' => 'hide'
    ],
];
