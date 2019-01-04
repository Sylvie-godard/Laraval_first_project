@extends('layouts.app')

@section('content')


<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Parier sur un match
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
      <form method="POST" action="{{ route('match.pariStore')}}">
        @csrf
        <div class="form-group">
        <label for="teams_id">Equipe gagnante pari :</label>
        <select name="teams_id" id="teams_id">
            <option value="{{ $match->teams1_id }}">Equipe : {{ $match->teams1_id }}</option>
            <option value="{{ $match->teams2_id }}">Equipe : {{ $match->teams2_id }}</option>
        </select><br>
    </div>
        <div class="form-group">
          <label for="amount">Montant €:</label>
          <input type="number" class="form-control" name="amount" value="10"> 
          <input type="hidden" class="form-control" name="matches_id" value="{{$match->id}}"> 
          <input type="hidden" class="form-control" name="users_id" value="{{ Auth::user()->id }}"> 
        </div>
        
        <button type="submit" class="btn btn-primary">Parier</button>
      </form>
  </div>
</div>
@endsection