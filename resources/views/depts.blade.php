@extends('templates.app')

@section('content')
<table>
    <thead>
        <tr>
            <th>Dept No</th>
            <th>Dept name</th>
            <th>Dept Location</th>
            <th>Détail</th>
        </tr>
    </thead>
    <tbody>
        @forelse($departements as $dept)
        <tr>
            <td>{{$dept->DEPTNO}}</td>
            <td>{{$dept->DNAME}}</td>
            <td>{{$dept->LOC}}</td>
            <td><button><a href="{{route('dept.detail',['id'=>$dept->DEPTNO])}}">Détail</a></button></td>
            <td><button><a href="{{route('dept.modify',['id'=>$dept->DEPTNO])}}">Modifier</a></button></td>
            <td>
                <form action="{{route('dept.delete')}}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{$dept->DEPTNO}}">
                    <button type="submit">Supprimer</button>
                </form>
            </td>
        </tr>
        @empty
        <p>Pas de départements.</p>
        @endforelse
    </tbody>
</table>

<button><a href="{{route('dept.create')}}">Nouveau département</a></button>
@endsection
