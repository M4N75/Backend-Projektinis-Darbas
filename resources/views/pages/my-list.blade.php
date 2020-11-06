@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1 text-center">Balsavimai</div>
    <div class="row">
        @foreach($list as $strawpoll) <!-- Balsavimo isvedimas -->
            <div class="card m-3">
                <div class="card-body text-center">
                    <div class="card-title h2"><i><u>{{ $strawpoll->name }}</u></i> balsavimas</div>
                    <hr>
                    <a href="/edit-strawpoll/{{ $strawpoll->id }}" class="btn btn-primary">Daugiau</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
