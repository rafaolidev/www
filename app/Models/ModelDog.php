<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelDog extends Model
{
    use HasFactory;
    protected $table = 'dogs';
    protected $fillable=['raca','nome','cor','idade', 'id_user'];


    public function relausers()
    {
    return $this->belongsTo(User::class, 'id_user');
    }
    /**
    *Ordenação da listagem
    */
    public function dogs_ordenados()
    {
            $dogs = Dog::join('dogs', 'id_user', '=', 'users.id')
                                    ->orderBy('users.id','ASC')
                                    ->orderBy('dogs.id','ASC')
                                    ->get(['dogs.*','users.id','users.id_user as ideTeste']);
            return ($dogs);
    }


}
