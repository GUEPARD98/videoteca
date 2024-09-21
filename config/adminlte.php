<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    */

    'title' => 'Archivo Fotografico Y Filmico Del Chocó',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Google Fonts
    |--------------------------------------------------------------------------
    */

    'google_fonts' => [
        'allowed' => true,
    ],

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Logo
    |--------------------------------------------------------------------------
    */

    'logo' => '<b>Archivo Fotografico  <br>Y Filmico Del Chocó</b>',
    'logo_img' => 'images/logo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_alt' => 'Admin Logo',

    /*
    |--------------------------------------------------------------------------
    | Authentication Logo
    |--------------------------------------------------------------------------
    */

    'auth_logo' => [
        'enabled' => false,
    ],

    /*
    |--------------------------------------------------------------------------
    | Preloader Animation
    |--------------------------------------------------------------------------
    */

    'preloader' => [
        'enabled' => true,
        'img' => [
            'path' => 'images/logo.png',
            'alt' => 'AdminLTE Preloader Image',
            'effect' => 'animation__shake',
            'width' => 60,
            'height' => 60,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    */

    'usermenu_enabled' => true,
    'usermenu_header' => false,
    'usermenu_image' => false,
    'usermenu_desc' => false,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    */

    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    */

    'classes_body' => '',
    'classes_brand' => 'bg-black',
    'classes_brand_text' => 'text-white',
    'classes_sidebar' => 'sidebar-dark-danger elevation-4',
    'classes_sidebar_nav' => 'nav-child-indent nav-compact',
    'classes_topnav' => 'navbar-dark navbar-black',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    */

    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
            'class'        => 'custom-navbar-search', // Agrega esta línea
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
            'class' => 'custom-sidebar-search', // Agrega esta línea
        ],
        [
            'text' => 'Dashboard',
            'url'  => '/admin',
            'icon' => 'fas fa-tachometer-alt',
            'label_color' => 'success',
        ],
        ['header' => 'Administración'],
        [
            'text' => 'Usuarios',
            'url'  => 'admin/users',
            'icon' => 'fas fa-fw fa-user',
            'active' => ['admin/users*'],
            'can' =>  'admin.users.index'
        ],
        [
            'text' => 'Etiquetas',
            'url'  => 'admin/tags',
            'icon' => 'fas fa-fw fa-tags',
            'active' => ['admin/tags*'],
            'can' =>  'admin.tags.index'
        ],
        [
            'text' => 'Roles',
            'url'  => 'admin/roles',
            'icon' => 'fas fa-fw fa-user-shield',
            'active' => ['admin/roles*'],
            'can' =>  'admin.roles.index'
        ],
        [
            'text' => 'Programas',
            'url'  => 'admin/educacion',
            'icon' => 'fas fa-fw fa-book',
            'active' => ['admin/educacion*'],
            'can' =>  'admin.educacion.index'
        ],
        [
            'text' => 'Contratación',
            'url'  => 'admin/contratacion',
            'icon' => 'fas fa-fw fa-file-contract',
            'active' => ['admin/contratacion*'],
            'can' =>  'admin.contratacion.index'
        ],
        [
            'text' => 'Convocatorias',
            'url'  => 'admin/convocatorias',
            'icon' => 'fas fa-fw fa-bullhorn',
            'active' => ['admin/convocatorias*'],
            'can' =>  'admin.convocatorias.index'
        ],
        [
            'text' => 'peliculas',
            'url'  => 'admin/peliculas',
            'icon' => 'fas fa-fw fa-bullhorn',
            'active' => ['admin/peliculas*'],
            'can' =>  'admin.peliculas.index'
        ],
        [
            'text' => 'Carrusel',
            'url'  => 'admin/sliders',
            'icon' => 'fas fa-fw fa-images',
            'active' => ['admin/sliders*'],
        ],
        ['header' => 'Opciones de comunicación'],
        [
            'text' => 'Lista de Comunicación',
            'url'  => 'admin/posts',
            'icon' => 'far fa-fw fa-envelope',
            'can'  => 'admin.posts.index'
        ],
        [
            'text' => 'Crear Comunicación',
            'url'  => 'admin/posts/create',
            'icon' => 'far fa-fw fa-edit',
            'can'  => 'admin.posts.create'
        ],
        [
            'text' => 'Añadir Película',
            'url'  => 'admin/peliculas/create',
            'icon' => 'fas fa-fw fa-film'
        ],

        [
            'text' => 'Añadir categoría',
            'url'  => 'admin/categories/create',
            'icon' => 'fas fa-fw fa-film'
        ],

        [
            'text' => 'Ver Comentarios',
            'url'  => 'admin/comments',
            'icon' => 'fas fa-fw fa-comments',
            'can'  => 'admin.comments.index'
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
        ],
        'Select2' => [
            'active' => false,
        ],
        'Chartjs' => [
            'active' => false,
        ],
        'Sweetalert2' => [
            'active' => false,
        ],
        'Pace' => [
            'active' => false,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    */

    'livewire' => false,
];