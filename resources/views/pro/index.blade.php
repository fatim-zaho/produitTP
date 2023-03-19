
@extends('layout')
@section('content')
<table class="table">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">NOM</th>
      <th scope="col">Description</th>
      <th scope="col">Quantite</th>
      <th scope="col">PRIX</th>
      <th scope="col">Image</th>
      <th scope="col">Modifier</th>
      <th scope="col">Suprimer</th>
    </tr>
  </thead>
  <tbody>

@foreach($vars as $var)
    <tr>
      <th scope="row">{{$var->id}}</th>
      <td>{{$var->nom}}</td>
      <td>{{$var->description}}</td>
      <td>{{$var->quantite}}</td>
      <td>{{$var->prix}}DH</td>
      <td><img src="/image/{{ $var->image }}" width="64" height="64"></td>
      
      <td>  
        <a class="btn btn-primary" href="{{route('pro.edit',$var->id)}}" role="button">Edit</a>
        </td>
        <td>
        <form   action="{{route('pro.destroy',$var->id)}}" method='post'>
           @method('delete')
           @csrf
        <button  class="hind"type='submit'>Dlete</button>
        </form>
        </td>
        <!--//<a class="btn btn-danger" href="{{route('pro.destroy',$var->id)}}" role="button">Delete</a>------>
      
    </tr>
    @endforeach
    
  </tbody>
</table>


@endsection