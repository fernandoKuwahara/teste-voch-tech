<?php

namespace App\Livewire;

use Livewire\Component;

class PageController extends Component
{
    public $page = "page.dashboard";

    public function render()
    {
        return view('livewire.page-controller');
    }
}
