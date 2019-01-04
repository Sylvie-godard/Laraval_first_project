@extends('layouts.app')

@section('content')

<style>
  .uper {
    margin-top: 40px;
  }
</style>
<div class="card uper">
  <div class="card-header">
    Créer un utilisateur
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

<form action=" {{route('user.store')}} " method="post">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Nom d'utilisateur :</label>
            <input type="text" name="name" placeholder="Nom d'utilisateur"><br>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="text" name="email" placeholder="Email"><br>
        </div>
        <div class="form-group">
            <label for="password">Mot de passe :</label>
            <input type="password" name="password" placeholder="Mot de passe"><br>
        </div>
        <div class="form-group">
            <label for="password_confirmation">Confirmation du mot de passe :</label>
            <input type="password" name="password_confirmation" placeholder="Confirmation du mot de passe"><br>
        </div>
        <div class="form-group">
            <label for="role">Statut :</label>
                <select name="role" >
                    <option value="admin">Admin</option>
                    <option value="user" selected>Utilisateur</option>
                </select>
            </select><br>
        </div>
        <button type="submit" class="btn btn-primary" name="valider">
        {{ __('Créer') }}
        </button>
</form>
</div>
</div>
@endsection