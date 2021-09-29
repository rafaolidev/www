<?php

namespace App\Http\Controllers;
use Illuminate\Pagination\CursorPaginator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\Rule;
use App\Models\ModelDog;
use App\Models\User;

class DogController extends Controller
{

    public function __construct()
    {
      $this->objUser=new User();
      $this->objDog=new ModelDog();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dogs = ModelDog::paginate(10);
        //var_dump($dogs);
        return view('index',['dogs'=>$dogs]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $users=$this->objUser->all();
        return view('create',['users'=>$users]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validated = $request->validate([
        'raca' => 'required',
        'nome' => 'required|'.Rule::unique('dogs')->where(function ($query) use ($request) {
              return $query->where('id_user', $request->id_user);
          }),
        'cor' => 'required',
        'idade' => 'required',
        'id_user' => 'required',
      ],
      [
        'raca.required' => 'O Campo Raça é Obrigatório',
        'nome.required' => 'O Campo Nome é Obrigatório',
        'nome.unique' => 'Você ja colocou para adoção um cão com esse nome',
        'cor.required' => 'O Campo Cor é Obrigatório',
        'idade.required' => 'O Campo Idade é Obrigatório',
      ]);

        $dog = new ModelDog;
        $dog -> raca=$request->raca;
        $dog -> nome=$request->nome;
        $dog -> cor=$request->cor;
        $dog -> idade=$request->idade;
        $dog -> id_user=$request->id_user;
        $dog -> save();
        $dogs = ModelDog::all()->sortBy('nome');
        return view('index',['dogs'=>$dogs]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $dog =$this->objDog->find($id);
        return view('showDog',['dog'=>$dog]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id'
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $dog =$this->objDog->find($id);
      $users=$this->objUser->all();
      return view('update',['users'=>$users],['dog'=>$dog]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      ModelDog::where(['id'=>$id])->update([
           'raca'=>$request->raca,
           'nome'=>$request->nome,
           'cor'=>$request->cor,
           'idade'=>$request->idade
       ]);
       return redirect('dogs');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $del=ModelBook::destroy($id);
        return($del)?"sim":"não";
    }
}
