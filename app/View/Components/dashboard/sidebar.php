<?php

namespace App\View\Components\dashboard;

use Illuminate\View\Component;

class sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.dashboard.sidebar',
        [
            'items' => [
                [
                    'name' => 'Dashbord',
                    'icon' => "<i class='ni ni-tv-2 text-primary'></i>",
                    'link' => 'home'
                ],
                [
                    'name' => 'Categorias',
                    'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
                    'link' => 'categories.index',
                    'links' => [
                        ['link' => 'categories.index'],
                        ['link' => 'categories.create'],
                        ['link' => 'categories.show'],
                        ['link' => 'categories.edit']
                    ]
                ],
                [
                    'name' => 'Usuarios',
                    'icon' => "<i class='fas fa-users text-warning'></i>",
                    'link' => 'users.index',
                    'links' => [
                        ['link' => 'users.index'],
                        ['link' => 'users.create'],
                        ['link' => 'users.show'],
                        ['link' => 'users.edit']
                    ]
                ],
                [
                    'name' => 'Postagens',
                    'icon' => "<i class='fas fa-mail-bulk text-danger'></i>",
                    'link' => 'posts.index',
                    'links' => [
                        ['link' => 'posts.index'],
                        ['link' => 'posts.create'],
                        ['link' => 'posts.show'],
                        ['link' => 'posts.edit']
                    ]
                ],
                [
                    'name' => 'Paginas Estáticas',
                    'icon' => "<i class='fas fa-file text-blue'></i>",
                    'link' => 'pages.index',
                    'links' => [
                        ['link' => 'pages.index'],
                        ['link' => 'pages.create'],
                        ['link' => 'pages.show'],
                        ['link' => 'pages.edit']
                    ]
                ]
            ]
        ]);
    }


}
