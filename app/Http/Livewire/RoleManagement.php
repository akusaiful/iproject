<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleManagement extends Component
{

    public $idKey;

    public $model;

    public $name;

    public $updateMode = false;

    public function render()
    {
        $this->model = Role::all();
        return view('livewire.role-management.table');
    }

    private function resetInputFields()
    {
        $this->name = '';
    }

    public function store()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        if ($this->idKey) {
            $model = Role::find($this->idKey);

            $model->update([
                'name' => $this->name,
            ]);
        } else {
            Role::create($validatedDate);
        }

        session()->flash('message', 'Rekod berjaya diwujudkan');

        $this->resetInputFields();

        $this->emit('save'); // Close model to using to jquery

    }

    public function edit($id)
    {
        $this->updateMode = true;
        $model = Role::where('id', $id)->first();
        $this->idKey = $id;
        $this->name = $model->name;
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function update()
    {
        $validatedDate = $this->validate([
            'name' => 'required',
        ]);

        if ($this->idKey) {
            $model = Role::find($this->idKey);
            $model->update([
                'name' => $this->name,
            ]);
            $this->updateMode = false;
            session()->flash('message', 'Users Updated Successfully.');
            $this->resetInputFields();

            $this->emit('save'); // Close model to using to jquery
        }
    }

    public function delete($id)
    {
        if ($id) {
            Role::where('id', $id)->delete();
            session()->flash('message', 'Users Deleted Successfully.');
        }
    }
}
