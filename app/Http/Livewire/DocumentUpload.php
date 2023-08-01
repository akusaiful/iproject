<?php

namespace App\Http\Livewire;

use App\Models\File;
use App\Models\Mohon;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

// dia akan tengok dlm batch table 'migrations'
// php artisan migrate --seed 

// dia akan run dan drop semua table dalm database 
// semua table yg ada dkt migration dlm folder apps dan vendor akan rerun
// php artisan migrate:fresh --seed

class DocumentUpload extends Component
{
    use WithFileUploads;
    use LivewireAlert;

    /**
     * Propety file
     */
    public $field = ['file_proses_semasa', 'file_proses_cadangan'];
    // public $document;

    public $file_proses_semasa;

    public $file_proses_cadangan;

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

    public $removeFile = false;

    public function removeFile()
    {
        $this->removeFile = true;
    }

    public function save()
    {
        $this->validate([
            'file_proses_semasa' => 'max:5120|mimes:pdf,png,jpg', // 5MB Max
            'file_proses_cadangan' => 'max:5120|mimes:pdf,png,jpg', // 5MB Max
        ],[
            'mimes' => 'Format dokumen tidak sah.'
        ]);

        // $this->document->store('document');



        foreach ($this->field as $field) {
            if ($this->$field) {
                $filename = auth()->id() . '-' . $this->$field->getClientOriginalName();
                $this->$field->storeAs(Mohon::DOCUMENT_FOLDER, $filename);
                $filePath = Mohon::DOCUMENT_FOLDER . '/' . $filename;
                $tmpFile[$field] = [
                    'filename' => $filename,
                    'type' => Storage::mimeType($filePath),
                    'size' => Storage::size($filePath),
                    'path' => $filePath
                ];
            }
        }

        if ($this->model->save()) {

            foreach ($tmpFile as $field => $fileTmp) {
                $file = File::whereKey($field)->where('mohon_id', $this->model->id)->firstOrNew();
                if ($file->fileExist() ) {
                    Storage::delete(Mohon::DOCUMENT_FOLDER . '/' . $file->filename);
                } 
                $file->key = $field;
                $file->path = $fileTmp['path'];
                $file->filename = $fileTmp['filename'];
                $file->size = $fileTmp['size'];
                $file->type = $fileTmp['type'];

                $this->model->files()->save($file);

            }


            //$this->removeOldFile();
            $this->success = true;
            $this->alert('success', 'Fail berjaya dimuat naik');
        }
    }

    public function removeOldFile()
    {
        // dd($this->model->tmpFile);
        if ($this->model->tmpFile) {
            foreach ($this->model->tmpFile as $file) {
                if (Storage::exists(Mohon::DOCUMENT_FOLDER . '/' . $file)) {
                    Storage::delete(Mohon::DOCUMENT_FOLDER . '/' . $file);
                }
            }
        }
    }

    public function render()
    {
        return view('livewire.document-upload');
    }
}
