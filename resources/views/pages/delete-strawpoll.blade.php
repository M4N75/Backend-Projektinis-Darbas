@extends('layouts.app')

@section('content')

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Balsavimo ID</th>
            <th scope="col">Balsavimo Pavadinimas</th>
            <th scope="col">Balsavimo Klausimas</th>
            <th scope="col">Atsakymai</th>
            <th scope="col">Balsai</th>
            <th scope="col">Kūrėjas</th>
            <th scope="col">Sukūrimo data</th>
            <th scope="col">Atnaujinimo data</th>
            @if( Auth::check()) <!-- Jeigu vartotojas prisijunges, tikrina ar isai yra administatorius (status == 1). Viska tikrinu atsikai nes jeigu darysiu,
                                 viena eilute su && bus erroru jeigu vartotojas neprisijunges-->
                @if( $user->status == 1) <!-- Tikrina ar administratorius -->
                    <th scope="col">Veiksmai</th>
                @else
                @endif
            @endif
        </tr>
        </thead>
        <tbody>
        @foreach($strawpolls as $strawpoll) <!-- Balsavimo isvedimas -->
            <tr>
                <th scope="row">{{ $strawpoll->id }}</th>
                <td>{{ $strawpoll->name }}</td>
                <td>{{ $strawpoll->question }}</td>
                <td>{{ $strawpoll->answers }}</td>
                <td>{{ $strawpoll->votes }}</td>
                <td>{{ $strawpoll->creator }}</td>
                <td>{{ $strawpoll->created_at }}</td>
                <td>{{ $strawpoll->updated_at }}</td>
                @if( Auth::check()) <!-- Tas pats kaip ir virsui, jei prisijunges ir jei administatorius tada rodo delete linka -->
                    @if( $user->status == 1)
                        <td>
                            <a href="{{ route('delete-strawpoll', $strawpoll->id) }}">
                                <i class="fas fa-trash-alt"></i> <!-- FontAwesome icona -->
                            </a>
                        </td>
                    @else
                    @endif
                @endif
            </tr>
        </tbody>

    @endforeach
@endsection
