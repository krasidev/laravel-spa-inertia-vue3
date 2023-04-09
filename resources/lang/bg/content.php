<?php

return [
    'login' => [
        'title' => 'Влизане',
        'labels' => [
            'email' => 'Имейл адрес',
            'password' => 'Парола',
            'remember' => 'Запомни'
        ],
        'buttons' => [
            'login' => 'Влизане',
            'register' => 'Регистрация'
        ]
    ],
    'register' => [
        'title' => 'Регистрация',
        'labels' => [
            'name' => 'Име',
            'email' => 'Имейл адрес',
            'password' => 'Парола',
            'password_confirmation' => 'Потвърди парола'
        ],
        'buttons' => [
            'register' => 'Регистрация'
        ]
    ],
    'profile' => [
        'labels' => [
            'name' => 'Име',
            'email' => 'Имейл адрес',
            'role' => 'Роля',
            'current_password' => 'Текуща парола',
            'password' => 'Парола',
            'password_confirmation' => 'Потвърди парола'
        ],
        'placeholders' => [
            'role' => '-- Избери --'
        ],
        'buttons' => [
            'update' => 'Обнови',
            'update-password' => 'Обнови парола'
        ]
    ],
    'dashboard' => [
        'content' => 'Вие сте влезли!'
    ],
    'users' => [
        'table' => [
            'filters' => [
                'trashed' => [
                    'options' => [
                        'all' => 'Всички потребители',
                        'deleted' => 'Изтрити потребители'
                    ]
                ]
            ],
            'headers' => [
                'id' => 'ID',
                'name' => 'Име',
                'email' => 'Имейл адрес',
                'roles' => 'Роля',
                'created_at' => 'Добавен',
                'updated_at' => 'Обновен',
                'deleted_at' => 'Изтрит',
                'actions' => 'Действия'
            ]
        ],
        'labels' => [
            'name' => 'Име',
            'email' => 'Имейл адрес',
            'role' => 'Роля',
            'password' => 'Парола',
            'password_confirmation' => 'Потвърди парола'
        ],
        'placeholders' => [
            'role' => '-- Избери --'
        ],
        'buttons' => [
            'store' => 'Добави',
            'update' => 'Обнови'
        ]
    ],
    'roles' => [
        'table' => [
            'headers' => [
                'id' => 'ID',
                'name' => 'Роля',
                'guard_name' => 'Guard Name',
                'readonly' => 'Само за четене',
                'created_at' => 'Добавен',
                'updated_at' => 'Обновен',
                'actions' => 'Действия'
            ]
        ],
        'labels' => [
            'name' => 'Роля'
        ],
        'legends' => [
            'permissions' => 'Разрешения'
        ],
        'buttons' => [
            'store' => 'Добави',
            'update' => 'Обнови'
        ]
    ],
    'permissions' => [
        'table' => [
            'headers' => [
                'id' => 'ID',
                'name' => 'Име',
                'guard_name' => 'Guard Name',
                'created_at' => 'Добавен',
                'updated_at' => 'Обновен',
                'actions' => 'Действия'
            ]
        ],
        'labels' => [
            'name' => 'Име',
            'guard_name' => 'Guard Name'
        ],
        'legends' => [
            'roles' => 'Роли'
        ],
        'buttons' => [
            'update' => 'Обнови'
        ]
    ]
];
