<?php

$admin = [
    [
       'type' => 'header',
        'text' => 'Cadastrar',
    ],
    [
        'text' => 'Ramais',
        'url' =>  'telefones/create',
        'can' => 'manager',
    ],
    [
        'text' => 'Cadastrar Divisões',
        'url' =>  'telefones/divisas/create',
        'can' => 'admin',
    ],
    [
        'text' => 'Cadastrar Endereços',
        'url' =>  'telefones/enderecos/create',
        'can' => 'admin',
    ],
    [
        'type' => 'divider',
    ],
    [
        'type' => 'header',
         'text' => 'Listagens',
         
     ],
     [
        'text' => 'Ramais',
        'url' =>  'telefones',
        'can'=> 'user',
        
    ],
    [
        'text' => 'Divisões',
        'url' =>  'telefones/divisas',
        'can' => 'user',
        
    ],
    [
        'text' => 'Endereços',
        'url' =>  'telefones/enderecos',
        'can'=> 'user',
        
    ],


];


$menu = [
     [
        'text' => 'Menu',
        'submenu' => $admin,
        'can' => 'user',
    ],
];

$right_menu = [
    [
        // menu utilizado para views da biblioteca senhaunica-socialite.
        'key' => 'senhaunica-socialite',
    ],
    [
        'key' => 'laravel-tools',
    ],
    
];


return [
    # valor default para a tag title, dentro da section title.
    # valor pode ser substituido pela aplicação.
    'title' => config('app.name'),

    # USP_THEME_SKIN deve ser colocado no .env da aplicação
    'skin' => env('USP_THEME_SKIN', 'uspdev'),

    # chave da sessão. Troque em caso de colisão com outra variável de sessão.
    'session_key' => 'laravel-usp-theme',

    # usado na tag base, permite usar caminhos relativos nos menus e demais elementos html
    # na versão 1 era dashboard_url
    'app_url' => config('app.url'),

    # login e logout
    'logout_method' => 'POST',
    'logout_url' => 'logout',
    'login_url' => 'login',

    # menus
    'menu' => $menu,
    'right_menu' => $right_menu,

    # mensagens flash - https://uspdev.github.io/laravel#31-mensagens-flash
    'mensagensFlash' => true,

    # container ou container-fluid
    'container' => 'container-fluid',
];
