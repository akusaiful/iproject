<?php

namespace App\Traits;

trait LookupTableCrudTrait
{

    public $idKey, $nama;
    public $updateMode = false;

    public function new()
    {
        $this->resetInputFields();
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'nama' => 'required',
        ]);

        if ($this->idKey) {
            $model = $this->model::find($this->idKey);
            $model->update([
                'nama' => $this->nama,
            ]);
            $this->alert('success', 'Rekod berjaya dikemaskini');
        } else {
            $this->model::create($validatedDate);
            $this->alert('success', 'Rekod berjaya diwujudkan');
        }

        // $this->alert('success', 'Rekod berjaya diwujudkan');
        $this->resetInputFields();
        $this->emit('save'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $model = $this->model::where('id', $id)->first();
        $this->idKey = $id;
        $this->nama = $model->nama;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    // public function update()
    // {
    //     $validatedDate = $this->validate([
    //         'name' => 'required',
    //     ]);

    //     if ($this->idKey) {
    //         $model = $this->model::find($this->idKey);
    //         $model->update([
    //             'nama' => $this->name,
    //         ]);            
    //         $this->alert('success', 'Rekod telah dikemaskini');
    //         $this->resetInputFields();
    //         $this->emit('save'); // Close model to using to jquery
    //     }
    // }

    public function delete($id)
    {
        if ($id) {
            try {
                $this->model::where('id', $id)->delete();
                $this->alert('success', 'Rekod telah dihapuskan');
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() == 23000) {
                    $this->alert('warning', $e->getMessage(), [
                        'position' => 'center',
                        'showConfirmButton' => true
                    ]);
                }
            }
        }
    }

    public function resetInputFields()
    {
        $this->updateMode = false;
        $this->idKey = '';
        $this->nama = '';
    }
}
