@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Modifier un joueur
  </div>
  <div class="card-body">
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('player.update', $player->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="firstname">Prénom du joueur :</label>
          <input type="text" class="form-control" name="firstname" value={{ $player->firstname }} />
        </div>
        <div class="form-group">
          <label for="lastname">Nom du joueur :</label>
          <input type="text" class="form-control" name="lastname" value={{ $player->lastname }} />
        </div>
        <div class="form-group">
          <label for="goals">Nombre de buts :</label>
          <input type="number" class="form-control" name="goals" value={{ $player->goals }} />
        </div>
        <div class="form-group">
          <label for="age">Âge :</label>
          <input type="number" class="form-control" name="age" value={{ $player->age }} />
        </div>
        <div class="form-group">
          <label for="age">Anniversaire :</label>
          <input type="date" class="form-control" name="birthdate" value={{ $player->birthdate }} />
        </div>
        <div class="form-group">
          <label for="height">Taille :</label>
          <input type="number" step="0.01" class="form-control" name="height" value={{ $player->height }} />
        </div>
        
        <div class="form-group">
          <label for="weight">Poids :</label>
          <input type="number" step="0.01" class="form-control" name="weight" value={{ $player->weight }} />
        </div>

        <div class="form-group">
          <label for="teams_id">Equipe :</label>
          <input type="number" class="form-control" name="teams_id" value={{ $player->teams_id }} />
        </div>
        <div class="form-group">
          <label for="position">Position :</label>
          <select name="position" >
            <option value={{ $player->position }} selected disabled hidden>{{ $player->position }}</option>
            <option value="Attrapeur">Attrapeur</option>
            <option value="Fonceur">Fonceur</option>
            <option value="Défonseur">Défonseur</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button><br>
        <button><a  href="{{route('player.index')}}">Retour</a></button>
      </form>
  </div>
</div>
@endsection