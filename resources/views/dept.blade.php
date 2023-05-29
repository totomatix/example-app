@extends('templates.app')

@section('content')
<h1>Departement N°{{$departement->DEPTNO}}</h1>
<p>Nom : {{$departement->DNAME}}</p>
<p>Localisation : {{$departement->LOC}}</p>

<button>
<a href="{{route('dept.modify',$departement->DEPTNO)}}">Modifier</a>
</button>
<form action="{{route('dept.delete')}}" method="post">
    @csrf
    <input type="hidden" name="id" value="{{$departement->DEPTNO}}">
    <button type="submit">Supprimer</button>
</form>
<button>
<a href="{{route('dept.displayAll')}}">Voir tous les départements</a>
</button>

@if(session()->has('success'))
    {{session()->get('success')}}
@endif
@endsection
