<?php

return [
    'public' => [
        [
            'label' => 'Home',
            'route' => 'home',
            'anchor' => null,
            'active' => ['home'],
        ],
        [
            'label' => 'Properties',
            'route' => 'properties',
            'anchor' => null,
            'active' => ['properties', 'properties.*'],
        ],
        [
            'label' => 'Why LuxSecure',
            'route' => 'home',
            'anchor' => '#why-luxsecure',
            'active' => ['home'],
        ],
        [
            'label' => 'Contact',
            'route' => 'contact',
            'anchor' => null,
            'active' => ['contact'],
        ],
    ],

    'user' => [
        [
            'label' => 'Home',
            'route' => 'home',
            'anchor' => null,
            'active' => ['home'],
        ],
        [
            'label' => 'Properties',
            'route' => 'properties',
            'anchor' => null,
            'active' => ['properties', 'properties.*'],
        ],
        [
            'label' => 'Favorites',
            'route' => 'profile',
            'anchor' => '#favorites',
            'active' => ['profile'],
        ],
        [
            'label' => 'Contact',
            'route' => 'contact',
            'anchor' => null,
            'active' => ['contact'],
        ],
    ],

    'admin' => [
        [
            'label' => 'Dashboard',
            'route' => 'admin.dashboard',
            'anchor' => null,
            'active' => ['admin.dashboard'],
        ],
        [
            'label' => 'Manage Properties',
            'route' => 'admin.properties.index',
            'anchor' => null,
            'active' => ['admin.properties.*'],
        ],
        [
            'label' => 'Inquiries',
            'route' => 'admin.inquiries.index',
            'anchor' => null,
            'active' => ['admin.inquiries.*'],
        ],
        [
            'label' => 'Users',
            'route' => 'admin.users.index',
            'anchor' => null,
            'active' => ['admin.users.*'],
        ],
    ],
];

