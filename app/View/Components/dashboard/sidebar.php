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
            ]
        ]);
    }


}
