@extends('layouts.app')

@section('content')
<div class="container w-50 p-3">
    <div class="h1 text-center">Redaguoti <u>{{$info['name']}}</u> Balsavima</div>
    
    <form class="text-center" action="/edit/{{$info['id']}}" method="post">
    @csrf
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pavadinimas</span>
            </div>
            <input class="form-control" type="text" name="name" value="{{$info['name']}}">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Klausimas</span>
            </div>
            <input class="form-control" type="text" name="question" value="{{$info['question']}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pasirinkimas #1</span>
            </div>
            <input class="form-control" type="text" name="answer1" value="{{$ats[0]}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pasirinimas #2</span>
            </div>
            <input class="form-control" type="text" name="answer2" value="{{$ats[1]}}">
        </div>

        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Pasirinkimas #3</span>
            </div>
            <input class="form-control" type="text" name="answer3" value="{{$ats[2]}}">
        </div>
        
        <div class="input-group mb-3">
            <div class="input-group-prepend">
                <span class="input-group-text">Galiojimo data</span>
            </div>
            <input class="form-control" type="text" name="delete_at" value="{{$info['delete_at']}}">
        </div>
        
        <input type="submit" value="Redaguoti" class="btn btn-success">
    </form>
    <div class="h2 text-center mt-5 mb-5">Rezultatai</div>
    <div class="container w-50">
        <div class="">{{$ats[0]}}</div>
        <div class="progress mt-3 mb-3">
            <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: {{$result['pirmas'][0]}}%;" aria-valuenow="{{$result['pirmas'][0]}}" aria-valuemin="0" aria-valuemax="100">{{$result['pirmas'][0]}}%</div>
        </div>

        <div class="">{{$ats[1]}}</div>
        <div class="progress mt-3 mb-3">
            <div class="progress-bar progress-bar-striped bg-info" role="progressbar" style="width: {{$result['antras'][0]}}%;" aria-valuenow="{{$result['antras'][0]}}" aria-valuemin="0" aria-valuemax="100">{{$result['antras'][0]}}%</div>
        </div>

        <div class="">{{$ats[2]}}</div>
        <div class="progress mt-3">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$result['trecias'][0]}}%;" aria-valuenow="{{$result['trecias'][0]}}" aria-valuemin="0" aria-valuemax="100">{{$result['trecias'][0]}}%</div>
        </div>
        </div>
    </div>
</div>
@endsection
