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
    'profile' => [
        'labels' => [
            'name' => 'Name',
            'email' => 'E-Mail Address',
            'current_password' => 'Current Password',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ],
        'buttons' => [
            'update' => 'Update',
            'update-password' => 'Update Password'
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
    'roles' => [
        'table' => [
            'headers' => [
                'id' => 'ID',
                'name' => 'Role',
                'guard_name' => 'Guard Name',
                'readonly' => 'Readonly',
                'created_at' => 'Created At',
                'updated_at' => 'Updated At',
                'actions' => 'Actions'
            ]
        ],
        'labels' => [
            'name' => 'Role'
        ],
        'legends' => [
            'permissions' => 'Permissions'
        ],
        'buttons' => [
            'store' => 'Create',
            'update' => 'Update'
        ]
    ],
    'permissions' => [
        'table' => [
            'headers' => [
                'id' => 'ID',
                'name' => 'Name',
                'guard_name' => 'Guard Name',
                'created_at' => 'Created At',
                'updated_at' => 'Updated At',
                'actions' => 'Actions'
            ]
        ],
        'labels' => [
            'name' => 'Name',
            'guard_name' => 'Guard Name'
        ],
        'legends' => [
            'roles' => 'Roles'
        ],
        'buttons' => [
            'update' => 'Update'
        ]
    ]
];
