@extends('templates.app')

@section('content')
@if (session('status'))
<div>{{ session('status') }}</div>
@endif

<div>
    <p>Bonjour {{ auth()->user()->name }}, vous êtes bien connecté !</p>
    @if(auth()->user()->isAdmin())
    <p>Vous êtes administrateur</p>
    @else
    <p>Vous n'êtes pas administrateur</p>
    @endif
    <ul>
        <li><a href="{{route('dept.displayAll')}}">Afficher tous les départements</a></li>
    </ul>
</div>

<form method="POST" action="{{ route('logout') }}">
    @csrf

    <button type="submit">Se déconnecter</button>
</form>

<hr>

@endsection
