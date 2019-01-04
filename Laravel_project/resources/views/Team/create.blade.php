
@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Créer une équipe
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div>
      `<br />
    @endif

<form action=" {{route('team.store')}} " method="post">
{{ csrf_field() }}
    <div class="form-group">
        <label for="name">Nom de l'Equipe :</label>
        <input class="form-control" type="text" name="name" placeholder="Nom de l'Equipe"><br>
    </div>
    <div class="form-group">
        <label for="country">Pays :</label>
        <input class="form-control" type="text" name="country" placeholder="Pays"><br>
    </div>
    <div class="form-group">
        <label for="flag">Drapeau :</label>
        <input class="form-control" type="file" name="flag" ><br>
    <div class="form-group">
        <label for="numberPlayers">Nombre de Joueurs :</label>
        <input class="form-control" type="number" name="numberPlayers"  placeholder="Nombre de Joueurs"><br>
    </div>
    <div class="form-group">
        <label for="numberMatchesWon">Nombre de Matchs gagnés :</label>
        <input class="form-control" type="number" name="numberMatchesWon" placeholder="Nombre de Matchs gagnés"><br>
    </div>
    <div class="form-group">
        <label for="numberGoals">Nombre de Buts :</label>
        <input class="form-control" type="number" name="numberGoals" placeholder="Nombre de Buts"><br>
    </div>
    <div class="form-group">
        <label for="ranking">Classement :</label>
        <input class="form-control" type="number" name="ranking" placeholder="Classement"><br>
    </div>
   -
    <div class="form-group">
        <button type="submit" class="btn btn-primary" name="valider">
        {{ __('Créer') }}
        </button>
</form>
    </div>
</div>
@endsection