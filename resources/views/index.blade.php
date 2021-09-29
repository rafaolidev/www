@extends('templetes.template')
@section('content')
<div class="text-center mt-3 mb-4">
  <a href="{{"dogs/create"}}">
    <button class="btn btn-success mt-2 mb-2" type="button" name="button">Cadastrar Animal</button>
  </a>
</div>
<h1 class="text-center mt-5">Animais para Adoção</h1>
<div class="col-8  m-auto mt-5">
  @csrf
  <table class="table table-striped">
    <thead>
      <tr  class="small">
        <th scope="col">ID</th>
        <th scope="col">Raça</th>
        <th scope="col">Nome</th>
        <th scope="col">Cor</th>
        <th scope="col">Idade</th>
        <th scope="col">Disponivel desde</th>
        <th scope="col">Responsavel</th>
        <th scope="col">Telefone</th>
        <th scope="col">Ações</th>
      </tr>
    </thead>
    <tbody>

      @foreach($dogs as $dog)
      <tr>
        <th scope="row">{{$dog->id}}</th>
        <td>{{$dog->raca}}</td>
        <td>{{$dog->nome}}</td>
        <td>{{$dog->cor}}</td>
        <td>{{$dog->idade}}</td>
        <td>{{substr($dog->created_at, 8,2)."|".substr($dog->created_at, 5,2)."|".substr($dog->created_at, 0,4)}}</td>
        <td>{{$dog->relausers->name}}</td>
        <td>{{$dog->relausers->tel}}</td>
        <td>
          <a href="{{url("dogs/$dog->id")}}">
            <button class="btn btn-dark mt-2 mb-2" type="button" name="button">Visualizar</button>
          </a>
          <a href="{{url("dogs/$dog->id/edit")}}">
            <button class="btn btn-primary mt-2 mb-2" type="button" name="button">Editar</button>
          </a>
          <form action="{{url("/delete/dogs/$dog->id")}}" method="post">
            @csrf
            @method('DELETE')
              <button class="btn btn-danger mt-2 mb-2" type="submit" name="button">Deletar</button>
          </form>
          </a>
        </td>
      </tr>
            @endforeach

    </tbody>
  </table>
</div>

@endsection
