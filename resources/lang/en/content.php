<?php

return [
    'login' => [
        'title' => 'Login',
        'labels' => [
            'email' => 'Email Address',
            'password' => 'Password',
            'remember' => 'Remember Me'
        ],
        'buttons' => [
            'login' => 'Login',
            'logout' => 'Logout'
        ]
    ],
    'register' => [
        'title' => 'Register',
        'labels' => [
            'name' => 'Name',
            'email' => 'Email Address',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ],
        'buttons' => [
            'register' => 'Register'
        ]
    ],
    'users' => [
        'table' => [
            'filters' => [
                'trashed' => [
                    'options' => [
                        'all' => 'All Users',
                        'deleted' => 'Deleted Users'
                    ]
                ]
            ],
            'headers' => [
                'id' => 'ID',
                'name' => 'Name',
                'email' => 'E-Mail Address',
                'created_at' => 'Created At',
                'updated_at' => 'Updated At',
                'deleted_at' => 'Deleted At',
                'actions' => 'Actions'
            ]
        ],
        'labels' => [
            'name' => 'Name',
            'email' => 'E-Mail Address',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ],
        'buttons' => [
            'store' => 'Create',
            'update' => 'Update'
        ]
    ],
];