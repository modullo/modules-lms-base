<?php

return [
    'tenant-base-home' => [
        'audience' => 'tenant',
        'icon' => 'fa fa-home',
        'dashboard' => 'all',
        'title' => 'Home',
        'route' => 'admin-dashboard',
        'clickable' => true,
        'navbar' => true,
        'visibility' => true,
        'order' => 0,
        'sub-menu' => []
    ],
    'learner-base-home' => [
        'audience' => 'learner',
        'icon' => 'fa fa-home',
        'dashboard' => 'all',
        'title' => 'Home',
        'route' => 'learner-dashboard',
        'clickable' => true,
        'navbar' => true,
        'visibility' => true,
        'order' => 0,
        'sub-menu' => [],
    ],
    'base-settings' => [
        'audience' => 'learner',
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
    ],
];
