@extends('layout')
@section('content')





<form class='form' action="{{route('pro.update',$var->id)}}" method='POST'>
    @method('PUT')
<h1>Modifier un produit</h1>
    @csrf
  <label for="nom">Nom:</label>
  <input type="text" id="nom" name="nom" value="{{$var->nom}}"><br>
  @error('nom')
<div class="form-error">
    {{$message}}
</div>
@enderror
  <label for="description">description:</label>
  <textarea id="description" name="description">{{$var->description}}</textarea><br>
  @error('description')
<div class="form-error">
    {{$message}}
</div>
@enderror
  <label for="quantite">quantité:</label>
  <input type="number" id="quantite" name="quantite" value="{{$var->quantite}}"><br>
  @error('quantite')
<div class="form-error">
    {{$message}}
</div>
@enderror
  <label for="prix">prix:</label>
  <input type="number" id="prix" name="prix" value="{{$var->prix}}"><br>
  @error('prix')
<div class="form-error">
    {{$message}}
</div>
@enderror
 
  <label for="image">Image :</label>
 <input type="file" name="image" class="form-control">

 @error('image')
<div class="form-error">
    {{$message}}
</div>
@enderror

  <!--<label for="img">image:</label>
  <input type="img" id="img" name="img"><br>-->

  <button type="submit">Ajouter</button> 
</form>

@endsection