<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadDocument extends Component
{
    use WithFileUploads;

    public $document;

    public $model;

    public $success;

    public $documentFilename;

    public function updatedDocument()
    {
        $this->validate([
            'document' => 'mimes:ppt,pptx,doc,docx,pdf|max:5120', // 5MB Max
        ]);
    }

    public function save()
    {

        $this->document->storeAs('document', $this->document->getClientOriginalName());
        $this->model->file_proses_semasa = $this->document->getClientOriginalName();
        if ($this->model->save()) {
            $this->documentFilename = $this->document->getClientOriginalName();
            $this->success = true;
            $this->emit('upload-document');
        }
    }

    public function render()
    {
        return view('livewire.upload-document');
    }
}
