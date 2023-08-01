<?php

namespace App\Http\Livewire;

use Livewire\Component;

class DocumentCard extends Component
{
    public $model;
    
    public $field;
    
    public $title;

    protected $listeners = [
        'upload-document' => '$refresh'
    ];

    public function render()
    {
        return view('livewire.document-card');
    }
}
