<div>

    <h1 class="mt-5">Jumlah Kiraan Undi : {{ $counter }}</h1>

    <button class="btn btn-primary" wire:click="count">Kira Undi</button>

    <button class="btn btn-danger" wire:click="minus">Tolak Undi</button>
    
    <h3 class="mt-5">Hello : {{ $name }}</h3>

    <input type="text" class="form-control" wire:model='email'>
    
    <button type="submit" class="btn btn-success mt-2" wire:click="semak">Semak Penggguna</button>

    {{-- Close your eyes. Count to one. That is how long forever feels. --}}

</div>

