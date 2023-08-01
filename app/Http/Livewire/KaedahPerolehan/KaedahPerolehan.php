<?php

namespace App\Http\Livewire\KaedahPerolehan;

use App\Models\KaedahPerolehan as ModelsKaedahPerolehan;
use App\Traits\LookupTableCrudTrait;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class KaedahPerolehan extends Component
{

    use LivewireAlert;
    use LookupTableCrudTrait;

    public $model = ModelsKaedahPerolehan::class;

    public $updateMode = false;

    public function render()
    {        
        return view('livewire.kaedah-perolehan.table', [
            'records' => ModelsKaedahPerolehan::all()
        ]);
    }

}
