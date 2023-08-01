<?php

namespace App\Http\Livewire\SumberPeruntukan;

use App\Models\SumberPeruntukan as ModelsSumberPeruntukan;
use App\Traits\LookupTableCrudTrait;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SumberPeruntukan extends Component
{

    use LivewireAlert;
    use LookupTableCrudTrait;
    public $model = ModelsSumberPeruntukan::class;

    public function render()
    {
        return view('livewire.sumber-peruntukan.table', [
            'records' => ModelsSumberPeruntukan::all()
        ]);
    }
}
