@extends('layout.layout')

<style>
* {
  box-sizing: border-box;
}

body {
  font: 16px Arial;  
}

/*the container must be positioned relative:*/
.autocomplete {
  position: relative;
  display: inline-block;
}

input {
  border: 1px solid transparent;
  background-color: #f1f1f1;
  padding: 10px;
  font-size: 16px;
}

input[type=text] {
  background-color: #f1f1f1;
  width: 100%;
}

input[type=submit] {
  background-color: DodgerBlue;
  color: #fff;
  cursor: pointer;
}

.autocomplete-items {
  position: absolute;
  border: 1px solid #d4d4d4;
  border-bottom: none;
  border-top: none;
  z-index: 99;
  /*position the autocomplete items to be the same width as the container:*/
  top: 100%;
  left: 0;
  right: 0;
}

.autocomplete-items div {
  padding: 10px;
  cursor: pointer;
  background-color: #fff; 
  border-bottom: 1px solid #d4d4d4; 
}

/*when hovering an item:*/
.autocomplete-items div:hover {
  background-color: #e9e9e9; 
}

/*when navigating through the items using the arrow keys:*/
.autocomplete-active {
  background-color: DodgerBlue !important; 
  color: #ffffff; 
}
</style>

@section('content')

    <div class="row">
        <div class="col-md-8"><h1>Liste des utilisateurs</h1></div>
        <div class="col-md-4">

            <form class="form-inline" autocomplete="off">
                <div class="form-group autocomplete">
                <input id="input-search" type="text" name="input-search" class="autocomplete" placeholder="Nom">
                </div>
            </form>
        </div>
    </div>
    

    <table class="table table-hover">
        <thead>
            <tr class="success">
                <th>Nom</th>
                <th>Prenom</th>
                <th>Pseudo</th>
            </tr>
        </thead>
        <tbody id="list-nom">
        @foreach ($users as $user)
            <tr>
                <td><strong><a href="profil/{{$user->id_user}}">{{$user->last_name}}</a></strong></td>
                <td>{{ $user->first_name }}</td>
                <td>{{ $user->pseudo }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        // Création du tableau vide
        let nom = [];
        @foreach ($users as $user)
            nom.push('{{$user->last_name}}');
        @endforeach

            
    </script>

@endsection

@section('custom-js')
    <script type="text/javascript" src="{{ URL::asset('js/dashboard.js') }}"></script>
@endsection
