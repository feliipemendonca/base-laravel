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
                    'name' => 'Slides',
                    'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
                    'link' => 'dashboard.slides.index',
                    'links' => [
                        ['link' => 'dashboard.slides.index'],
                        ['link' => 'dashboard.slides.create'],
                        ['link' => 'dashboard.slides.show'],
                        ['link' => 'dashboard.slides.edit']
                    ]
                ],
                [
                    'name' => 'Blog',
                    'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
                    'link' => 'dashboard.blog.index',
                    'links' => [
                        ['link' => 'dashboard.blog.index'],
                        ['link' => 'dashboard.blog.create'],
                        ['link' => 'dashboard.blog.show'],
                        ['link' => 'dashboard.blog.edit']
                    ]
                ],
                [
                    'name' => 'Páginas Estáticas',
                    'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
                    'link' => 'dashboard.pages.index',
                    'links' => [
                        ['link' => 'dashboard.pages.index'],
                        ['link' => 'dashboard.pages.create'],
                        ['link' => 'dashboard.pages.show'],
                        ['link' => 'dashboard.pages.edit']
                    ]
                ],
                [
                    'name' => 'Configurações',
                    'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
                    'link' => 'dashboard.settings.index',
                    'links' => [
                        ['link' => 'dashboard.settings.index'],
                        ['link' => 'dashboard.settings.create'],
                        ['link' => 'dashboard.settings.show'],
                        ['link' => 'dashboard.settings.edit']
                    ]
                ],
                [
                    'name' => 'Produtos',
                    'icon' => "<i class='ni ni-briefcase-24 text-danger'></i>",
                    'link' => 'dashboard.products.index',
                    'links' => [
                        ['link' => 'dashboard.products.index'],
                        ['link' => 'dashboard.products.create'],
                        ['link' => 'dashboard.products.show'],
                        ['link' => 'dashboard.products.edit']
                    ]
                ],
            ]
        ]);
    }


}
