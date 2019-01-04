@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Modifier un match
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
      <form method="post" action="{{ route('match.update', $match->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="scoreBoard">Score :</label>
          <input type="text" class="form-control" name="scoreBoard" value={{ $match->scoreBoard }} />
        </div>
        <div class="form-group">
          <label for="winner_id">Equipe gagnante :</label>
          <select name="winner_id" id="winner_id">
            <option value=''></option>
            <option value="{{ $match->teams1_id }}">Equipe : {{ $match->teams1_id }}</option>
            <option value="{{ $match->teams2_id }}">Equipe : {{ $match->teams2_id }}</option>
        </select>
        </div>
        <div class="form-group">
          <label for="teams1_id">Equipe 1 :</label>
          <input type="text" class="form-control" name="teams1_id" value={{ $match->teams1_id }} />
        </div>
        <div class="form-group">
          <label for="teams2_id">Equipe 2 :</label>
          <input type="text" class="form-control" name="teams2_id" value={{ $match->teams2_id }} />
        </div>
        <div class="form-group">
          <label for="placement">Emplacement :</label>
          <input type="text" class="form-control" name="placement" value={{ $match->placement }} />
        </div>
        <div class="form-group">
          <label for="temperature">Température :</label>
          <input type="text" class="form-control" name="temperature" value={{ $match->temperature }} />
        </div>
        <div class="form-group">
          <label for="nb_faults">Nombre de fautes :</label>
          <input type="text" class="form-control" name="nb_faults" value={{ $match->nb_faults }} />
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection