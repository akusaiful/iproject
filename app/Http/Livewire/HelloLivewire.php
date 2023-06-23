<?php

namespace App\Http\Livewire;

use Livewire\Component;

class HelloLivewire extends Component
{

    public $name = 'Siti Nur Haliza';

    public $counter = 0;

    public $email;

    // ni guna method dalam livewire
    public function count()
    {
        $this->counter++;
    }

    public function minus()
    {
        if ($this->counter) $this->counter--;
    }

    public function semak()
    {
        $user = \App\Models\User::whereEmail($this->email)->first();

        //semak daripada objek user
        if ($user) {
            $this->name = $user->name;
        } else {
            $this->name = 'Rekod tidak wujud';
        }
    }

    public function render()
    {
        return view('livewire.hello-livewire');
    }
}
