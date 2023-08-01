<div>

    @include('livewire.role-management.form')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight"><h5 class="card-title">Role Management</h5></div>
                        <div class="p-2 bd-highlight"></div>
                        <div class="pt-4 bd-highlight"><button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modal">
                            Daftar Baru
                        </button></div>
                      </div>

                    



                    @if (session()->has('message'))
                        <div class="alert alert-success" style="margin-top:30px;">x
                            {{ session('message') }}
                        </div>
                    @endif

                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th style="width: 3%">No.</th>
                                <th>Name</th>
                                <th style="width: 10%" nowrap></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($model as $item)
                                <tr>
                                    <td class="text-center">{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td nowrap>
                                        <button data-bs-toggle="modal" data-bs-target="#modal"
                                            wire:click="edit({{ $item->id }})"
                                            class="btn btn-primary btn-sm">Edit</button>
                                        <button wire:click="delete({{ $item->id }})"
                                            class="btn btn-danger btn-sm">Delete</button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
