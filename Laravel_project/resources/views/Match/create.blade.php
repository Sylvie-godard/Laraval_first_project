@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Créer un match
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

<form action=" {{route('match.store')}} " method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="scoreBoard">Score :</label>
            <input type="text" name="scoreBoard" placeholder="Score"><br>
        </div>
        <div class="form-group">
            <label for="winner_id">Equipe gagnante :</label>
            <input type="number" name="winner_id" placeholder="Equipe gagnante"><br>
        </div>
        <div class="form-group">
            <label for="teams1_id">Equipe 1 :</label>
            <input type="number" name="teams1_id" placeholder="Equipe 1"><br>
        </div>
        <div class="form-group">
            <label for="teams2_id">Equipe 2 :</label>
            <input type="number" name="teams2_id" placeholder="Equipe 2"><br>
        </div>
        <div class="form-group">
        <label for="placement">Emplacement :</label>
        <select name="placement" id="placement">
            <option value="Poudlard">Poudlard</option>
            <option value="Miraille">Miraille</option>
            <option value="Darmstrang">Darmstrang</option>
            <option value="Darmstrang">Darmstrang</option>
        </select><br>
        </div>
        <button type="submit" class="btn btn-primary" name="valider">
        {{ __('Créer') }}
        </button>
</form>
</div>
</div>
@endsection