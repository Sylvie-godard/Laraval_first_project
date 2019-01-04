@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Créer un joueur
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

<form action=" {{route('player.store')}} " method="post">
{{ csrf_field() }}
    <div class="form-group">
        <label for="age">Prénom :</label>
        <input class="form-control" type="text" name="firstname" placeholder="Prénom"><br>
    </div>
    <div class="form-group">
        <label for="age">Nom de Famille :</label>
        <input class="form-control" type="text" name="lastname" placeholder="Nom de famille"><br>
    </div>
    <div class="form-group">
        <label for="age">Nombre de buts :</label>
        <input class="form-control" type="number" name="goals" placeholder="Nombre de buts"><br>
    <div class="form-group">
        <label for="age">Taille :</label>
        <input class="form-control" type="number" name="height" step="0.01" placeholder="Taille"><br>
    </div>
    <div class="form-group">
        <label for="age">Âge :</label>
        <input class="form-control" type="number" name="age" placeholder="Âge"><br>
    </div>
    <div class="form-group">
        <label for="birthdate">Anniversaire :</label>
        <input class="form-control" type="date" name="birthdate" placeholder="Anniversaire"><br>
    </div>
    <div class="form-group">
        <label for="weight">Poids :</label>
        <input class="form-control" type="number" step="0.01" name="weight" placeholder="Poids"><br>
    </div>
    <div class="form-group">
        <label for="position">Position :</label>
        <select name="position" id="position">
            <option value="Attrapeur">Attrapeur</option>
            <option value="Fonceur">Fonceur</option>
            <option value="Défonseur">Défonseur</option>
        </select><br>
    </div>
    <div class="form-group">
        <label for="weight">Teams :</label>
        <input class="form-control" type="number" name="teams_id" placeholder="Teams"><br>
        <button type="submit" class="btn btn-primary" name="valider">
        {{ __('Créer') }}
        </button>
</form>
    </div>
</div>
@endsection