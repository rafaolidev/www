@extends('templetes.template')
@section('content')
<div class="col-8  m-auto mt-5">
  <h1 class="text-center">
    Cadastro de Animais
  </h1>
  <div class="col-8 m-auto">
    <form class="formCad" action="/dogs" method="post">
      @csrf

      <select class="form-control" name="id_user" id="">
        <option value="">Quem esta colocando para adoção</option>
          @foreach($users as $user)
          <option value="{{$user->id}}">{{$user->name}}</option>
          @endforeach
      </select>
      <input class="form-control" type="text" id="raca" name="raca" value="" placeholder="Raça" >
      <input class="form-control" type="text" id="nome" name="nome" value="" placeholder="Nome">
      <input class="form-control" type="text" id="cor" name="cor" value="" placeholder="Cor">
      <input class="form-control" type="text" id="idade" name="idade" value="" placeholder="Idade">
      <input class="btn btn-success mt-2 mb-2" type="submit" name="" value="Cadastrar">
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
