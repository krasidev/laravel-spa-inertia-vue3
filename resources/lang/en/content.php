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
            'register' => 'Register'
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
            'role' => 'Role',
            'current_password' => 'Current Password',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ],
        'placeholders' => [
            'role' => '-- Choose --'
        ],
        'buttons' => [
            'update' => 'Update',
            'update-password' => 'Update Password'
        ]
    ],
    'dashboard' => [
        'content' => 'You are logged in!'
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
                'roles' => 'Role',
                'created_at' => 'Created At',
                'updated_at' => 'Updated At',
                'deleted_at' => 'Deleted At',
                'actions' => 'Actions'
            ]
        ],
        'labels' => [
            'name' => 'Name',
            'email' => 'E-Mail Address',
            'role' => 'Role',
            'password' => 'Password',
            'password_confirmation' => 'Confirm Password'
        ],
        'placeholders' => [
            'role' => '-- Choose --'
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
