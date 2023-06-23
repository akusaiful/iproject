<?php

namespace App\Http\Livewire;

use App\Models\Mohon;
use Livewire\Component;
use Livewire\WithFileUploads;

class DocumentUpload extends Component
{
    use WithFileUploads;

    /**
     * Propety file
     */
    public $document;

    /**
     * Hold model object dari frontend component
     */
    public $model;

    /**
     * Untuk hold nama file asal yang dimuatnaik
     */
    public $filename;

    /**
     * Public property untuk detect dokumen berjaya di upload
     */
    public $success = false;
   
    public function save()
    {    
        $this->validate([
            'document' => 'required|max:5120|mimes:pdf,png,jpg', // 5MB Max
        ]);
 
        // $this->document->store('document');

        $this->filename = $this->document->getClientOriginalName();
        $this->document->storeAs('document', $this ->filename);
        $this->model->file_dokumen_proses_semasa = $this->filename;

        if($this->model->save()){
            // kalau berjaya simpan nak buat apa
            $this->success = true;
        }

    }

    public function render()
    {
        return view('livewire.document-upload');
    }

}
