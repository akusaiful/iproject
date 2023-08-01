<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class File extends Model
{
    use HasFactory;

    /**
     * Get File link
     */
    public function getFileLink()
    {
        if ($this->fileExist()) {
            return route('download.file', [
                'file' => $this
            ]);
        }
    }

    // public function getSize()
    // {
    //     return round($this->size / 1024 / 1024, 4) . ' MB';
    // }

    public function getType()
    {
        return $this->type;
    }

    public function fileExist()
    {
        if (
            $this->path &&
            Storage::exists($this->path)
        ) {
            return true;
        }
        return false;
    }

    /**
     * Format bytes to kb, mb, gb, tb
     *
     * @param  integer $size
     * @param  integer $precision
     * @return integer
     */
    public function getSize()
    {
        if ($this->size > 0) {
            $size = (int) $this->size;
            $base = log($size) / log(1024);
            $suffixes = array(' bytes', ' KB', ' MB', ' GB', ' TB');

            return round(pow(1024, $base - floor($base)), 2) . $suffixes[floor($base)];
        } else {
            return $this->size;
        }
    }
}
