@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1 text-center">Balsavimai</div>
    <div class="row">
        @foreach($info as $key => $strawpoll)
<?php
    $ats = explode("|", $strawpoll['answers']);
?>
            <div class="col">
                <div class="card m-3">
                    <div class="card-body text-center">
                        <div class="card-title h2"><i><u>{{ $strawpoll->name }}</u></i> balsavimas</div>
                        <hr>
                        <div class="card-text text-left">
                            <div class="h4">Klausimas:</div>
                            {{$strawpoll->question}}
                        </div>
                        <hr>
                        <div class="card-text text-left">
                        <div class="h4">Pasirinkimai:</div>
                        {{$ats[0]}}<br>
                        {{$ats[1]}}<br>
                        {{$ats[2]}}
                        </div>
                        <hr>
                        <div class="card-text text-left">
                            <div class="h4">Kurejas:</div>
                            {{$strawpoll->creator}}
                        </div>
                        <hr>
                        <a href="/admin/delete-strawpoll/{{ $strawpoll->id }}" class="btn btn-danger">Istrinti</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
