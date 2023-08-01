<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class DownloadDocument extends Component
{
    public function export()
    {
        return Storage::disk('exports')->download('export.csv');
    }
}
