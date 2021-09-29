@extends('templetes.template')
@section('content')
<div class="col-8  m-auto mt-5">
  <h1 class="text-center">
    Cadastro de Animais
  </h1>
  <div class="col-8 m-auto text-center">
    <form class="formEdit" action="{{url("dogs/$dog->id")}}" method="post">
      @csrf
      @method('PUT')

      <span class=" mt-5">Colocado para adoção por {{$dog->relausers->name}}</span>
      <input class="form-control" type="text" id="raca" name="raca" value="{{$dog->raca ?? ''}}" placeholder="Raça" >
      <input class="form-control" type="text" id="nome" name="nome" value="{{$dog->nome ?? ''}}" placeholder="Nome">
      <input class="form-control" type="text" id="cor" name="cor" value="{{$dog->cor ?? ''}}" placeholder="Cor">
      <input class="form-control" type="text" id="idade" name="idade" value="{{$dog->idade ?? ''}}" placeholder="Idade">
      <input class="btn btn-success mt-2 mb-2" type="submit" name="" value="Editar">
    </form>
    <a href="{{'/dogs'}}">
      <button class="btn btn-dark mt-2 mb-2" type="button" name="button">Voltar</button>
    </a>
  </div>
</div>
<div class="col-8 m-auto">


@if ($errors->any())
    <div class="text-center mt-5">
        <ul >
            @foreach ($errors->all() as $error)
                <li class="list-group-item list-group-item-danger">{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>


@endsection
