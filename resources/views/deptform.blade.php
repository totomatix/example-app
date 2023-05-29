@extends('templates.app')

@section('content')
<h1>Création d'un nouveau département</h1>
<form action="{{route('dept.store')}}" method="post">
    @csrf
    <label for="deptno">Numéro</label>
    <input id="deptno" name="deptno" type="number">
    @error('deptno')
        {{$message}}
    @enderror
    <label for="dname">Nom</label>
    <input id="dname" name="dname" type="text">
    @error('dname')
        {{$message}}
    @enderror
    <label for="loc">Localisation</label>
    <input id="loc" name="loc" type="text">
    @error('loc')
        {{$message}}
    @enderror
    <button type="submit">Valider</button>
    <button type="reset">Vider les champs</button>
</form>

<a href="{{route('dept.displayAll')}}">Retour à la liste de départements</a>

@isset($errorMessage)
{{$errorMessage}}
@endisset



@endsection
