@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Liste des Pari</h3>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p> {{$message}} </p>
    </div>
@endif

<table class ="table table-hover table-sm">
        <tr>
            <th>N° du parieur</th>
            <th>N° de l'équipe pariée</th>
            <th>N° du match</th>
            <th>Montant</th>
            <th>Date du pari</th>
        </tr>

    @foreach($paris as $pari)
        <tr>
            <td><b> {{$pari->users_id}} </b></td>
            <td><b> {{$pari->teams_id}} </b></td>
            <td><b> {{$pari->matches_id}} </b></td>
            <td><b> {{$pari->amount}} € </b></td>
            <td><b> {{$pari->created_at}} </b></td>
            
            </td>
        </tr>
    @endforeach

</table>


@endsection