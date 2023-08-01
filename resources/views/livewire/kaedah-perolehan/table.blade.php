<div>

    @include('livewire.kaedah-perolehan.form')

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">

                    <div class="d-flex bd-highlight">
                        <div class="p-2 flex-grow-1 bd-highlight">
                            <h5 class="card-title">Keadah Perolehan</h5>
                        </div>
                        <div class="p-2 bd-highlight"></div>
                        <div class="pt-4 bd-highlight">
                            <x-livewire-lookup-new-button />
                        </div>
                    </div>

                    <table class="table">
                        <thead>
                            <tr class="table-dark">
                                <th style="width: 3%">No.</th>
                                <th>Nama</th>
                                <th style="width: 10%" nowrap>Tindakan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $key => $item)
                                <tr>
                                    <td class="text-center">{{ $key + 1 }}</td>
                                    <td>{{ $item->nama }}</td>
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
