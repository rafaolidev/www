@extends('templetes.template')
@section('content')
<div class="text-center mt-3 mb-4">
  <div class="col-8  m-auto mt-5">
    @csrf
    <table class="table table-dark table-striped">
      <thead>
        <tr  class="small">
          <th scope="col">ID</th>
          <th scope="col">Raça</th>
          <th scope="col">Nome</th>
          <th scope="col">Cor</th>
          <th scope="col">Idade</th>
          <th scope="col">Disponivel desde</th>
        </tr>
      </thead>
      <tr>
        <th scope="row">{{$dog->id}}</th>
        <td>{{$dog->raca}}</td>
        <td>{{$dog->nome}}</td>
        <td>{{$dog->cor}}</td>
        <td>{{$dog->idade}}</td>
        <td>{{substr($dog->created_at, 8,2)."|".substr($dog->created_at, 5,2)."|".substr($dog->created_at, 0,4)}}</td>
    </table>
<a href="{{'/dogs'}}">
  <button class="btn btn-dark mt-2 mb-2" type="button" name="button">Voltar</button>
</a>
  </div>
</div>
@endsection
