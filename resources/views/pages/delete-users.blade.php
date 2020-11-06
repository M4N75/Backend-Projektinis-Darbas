@extends('layouts.app')

@section('content')
<div class="container p-3">
<div class="h2 text-center mt-3 mb-5">Vartotoju Sarasas</div>
    <table class="table">
        <thead>
        <tr class="text-center">
            <th scope="col">Vartotojo Slapyvardis</th>
            <th scope="col">Vartotojo Tipas</th>
            <th scope="col">Registracijos Data</th>
            <th scope="col">Veiksmai</th>
        </tr>
        </thead>
        <tbody>
        @foreach($allUsers as $data)
        <tr class="text-center">
            <td>{{ $data->username }}</td>
            @if ($data->status === 0)
                <td>Vartotojas</td>
            @endif
            @if ($data->status === 1)
                <td>Administratorius</td>
            @endif
            <td>{{ $data->created_at }}</td>
                <td>
                    <a href="{{ route('delete-user', $data->id) }}">
                        <i class="fas fa-trash-alt"></i>
                    </a>
                </td>
        </tr>
        </tbody>

    @endforeach
</div>
@endsection
