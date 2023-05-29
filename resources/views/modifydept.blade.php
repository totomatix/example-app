@extends('templates.app')

@section('content')
<h1>Modication du département N°{{$dept->DEPTNO}}</h1>
<form action="{{route('dept.update',$dept->DEPTNO)}}" method="post">
    @csrf

    <label for="dname">Nom</label>
    <input id="dname" name="dname" type="text" value="{{$dept->DNAME}}">
    @error('dname')
        {{$message}}
    @enderror
    <label for="loc">Localisation</label>
    <input id="loc" name="loc" type="text" value="{{$dept->LOC}}">
    @error('loc')
        {{$message}}
    @enderror
    <button type="submit">Valider</button>
    <button type="reset">Vider les champs</button>
</form>

@isset($errorMessage)
{{$errorMessage}}
@endisset

@if(session()->has('success'))
    {{session()->get('success')}}
@endif

@endsection
