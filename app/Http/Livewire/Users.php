<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class Users extends Component
{
    use WithPagination;

    public $search;
    protected $queryString = ['search'];
    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.users',[
            'items' => User::where([['name', 'like', '%'.$this->search.'%'], ['id', '!=', auth()->user()->id]])
                        ->orderBy('created_at','asc')
                            ->paginate(15)
        ]);
    }
}
