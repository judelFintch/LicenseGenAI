<?php

namespace App\Livewire\Pages\Prompt;

use Livewire\Component;
use Livewire\Attributes\Layout;

#[Layout('layouts.guest')]

class Chat extends Component
{
    public function render()
    {
        return view('livewire.pages.prompt.chat');
    }
}
