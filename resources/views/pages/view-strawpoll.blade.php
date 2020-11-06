@extends('layouts.app')

@section('content')
<div class="container border border-secondary rounded p-4 w-25">
    <div class="h2 text-center">{{$info['name']}} Balsavimas</div>
    <div class="h4">{{$info['question']}}</div>

    <form class="text-center" action="/vote/{{$info['id']}}" method="post">
    @csrf
    @foreach($ats as $atss)
        <div class="check-form pl-5 pr-5 text-left">
            <input class="form-check-input" name="answer" id="{{$atss}}" type="radio" value="{{$atss}}">
            <label class="form-check-label" for="{{$atss}}">{{$atss}}</label>
        </div>
    @endforeach
        <input type="submit" value="Balsuoti" class="btn btn-success text-center mx-auto">
    </form>
</div>
@endsection
