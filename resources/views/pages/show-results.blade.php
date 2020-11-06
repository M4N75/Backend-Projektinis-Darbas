@extends('layouts.app')

@section('content')
<div class="container">
    <div class="h1 text-center mt-5 mb-5"><i><u>{{$info['name']}}</u></i> Rezultatai</div>
    <div class="text-center h4">{{$info['question']}}</div>
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
        <div class="progress mt-3 mb-3">
            <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: {{$result['trecias'][0]}}%;" aria-valuenow="{{$result['trecias'][0]}}" aria-valuemin="0" aria-valuemax="100">{{$result['trecias'][0]}}%</div>
        </div>
        </div>
    </div>
</div>
@endsection
