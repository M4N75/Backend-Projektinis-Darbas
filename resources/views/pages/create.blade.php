@extends('layouts.app')

@section('content')
<div class="container w-50 p-3">
    <div class="h1 text-center">Kurti Nauja Balsavima</div>
    
    <form class="text-center" action="/create" method="post">
    @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pavadinimas</span>
            </div>
            <input class="form-control" type="text" name="name" placeholder="Mano pirmas balsavimas">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Klausimas</span>
            </div>
            <input class="form-control" type="text" name="question" placeholder="Ar man patinka bananai?">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pasirinkimas #1</span>
            </div>
            <input class="form-control" type="text" name="answer1" placeholder="Taip">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pasirinkimas #2</span>
            </div>
            <input class="form-control" type="text" name="answer2" placeholder="Ne">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pasirinkimas #3</span>
            </div>
            <input class="form-control" type="text" name="answer3" placeholder="Gal">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Galiojimo data</span>
            </div>
            <input class="form-control" type="text" name="delete_at" placeholder="2020-12-20 00:00:00">
        </div>
        
        <input type="submit" value="Issaugoti" class="btn btn-success">
    </form>
</div>
@endsection
