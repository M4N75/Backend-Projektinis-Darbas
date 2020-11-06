@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1 text-center">Balsavimai</div>
    <div class="row">
        @foreach($strawpolls as $strawpoll) <!-- Balsavimo isvedimas -->
            <div class="card m-3">
                <div class="card-body">
                    <div class="card-title h2 text-center">{{ $strawpoll->name }}</div>
                    <hr>
                    <div class="card-text">
                        <div class="text-left">
                            {{ $strawpoll->creator }}
                        </div>
                        <div class="text-right">
                            {{ $strawpoll->created_at }}
                        </div>
                    </div>
                    <hr>
                    <a href="/view-strawpoll/{{ $strawpoll->id }}" class="btn btn-primary">Daugiau</a>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
