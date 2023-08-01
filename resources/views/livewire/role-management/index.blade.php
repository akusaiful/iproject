@extends('layouts.main')

@section('content')

    @livewire('role-management')

    @push('js')
        <script type="text/javascript">
            window.livewire.on('save', () => {
                var myModalEl = document.getElementById('modal');
                var modal = bootstrap.Modal.getInstance(myModalEl)
                modal.hide();
            });
        </script>
    @endpush
@endsection
