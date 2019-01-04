@extends('layouts.app')

@section('content')
<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Modifier un utilisateur
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
      <form method="post" action="{{ route('user.update', $user->id) }}">
        @method('PATCH')
        @csrf
        <div class="form-group">
          <label for="name">Nom d'utilisateur :</label>
          <input type="text" class="form-control" name="name" value={{ $user->name }} />
        </div>
        <div class="form-group">
          <label for="email">Email utilisateur :</label>
          <input type="text" class="form-control" name="email" value={{ $user->email }} />
        </div>
        <div class="form-group">
          <label for="password">Mot de passe utilisateur :</label>
          <input type="password" class="form-control" name="password" value="" />
        </div>
        <div class="form-group">
          <label for="password_confirmation">Confirmation du mot de passe utilisateur :</label>
          <input type="password" class="form-control" name="password_confirmation" value="" />
        </div>
        <div class="form-group">
          <label for="role">Statut :</label>
          <select name="role">
            <option value={{ $user->role }} selected disabled hidden>{{ $user->role }}</option>
            <option value="admin">admin</option>
            <option value="user">user</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
      </form>
  </div>
</div>
@endsection