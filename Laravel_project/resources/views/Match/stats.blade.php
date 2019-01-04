@extends('layouts.app')

@section('content')


<div class="container">
    <div class="row">
        <div class="col-md-10">
            <h3>Statistiques des matchs</h3>
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
        <th width = "300px"><b>Température moyenne</b></th>
        <th width = "300px"><b>Nombre de fautes moyen</b></th>

    </tr>

    <tr>
        <td><b><?= $avr_temp ?></b></td>
        <td><b><?= $avr_faults ?></b></td>
    </tr>

</table>


@endsection