<?php

namespace App\Http\Livewire\KaedahPembangunan;

use App\Models\KaedahPembangunan as Kaedah;
use App\Traits\LookupTableCrudTrait;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class KaedahPembangunan extends Component
{

    use LivewireAlert;
    use LookupTableCrudTrait;

    public $model = Kaedah::class;

    public function render()
    {
        return view('livewire.kaedah-pembangunan.table', [
            'records' => Kaedah::all()
        ]);
    }

    
}
