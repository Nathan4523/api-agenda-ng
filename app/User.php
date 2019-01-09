<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class User extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'id','name', 'email', 'password', 'favorite', 'blocked' 
    ];

    protected $dates = ['created_at', 'updated_at', 'deleted_at'];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    protected function listarTodos()
    {
        try{
            $sql = User::paginate();

            return $sql;

        }catch(\Throwable $erro){
            return array('error', 'Error: ' . $erro->getMessage()); 
        }
    }

    protected function listarPorId($id)
    {
        try{
            $sql = User::where('id', $id)->get();
            
            return $sql;

        }catch(\Throwable $erro){
            return array('error', 'Error: ' . $erro->getMessage()); 
        }
    }

    protected function cadastrar($request)
    {
        try{
            $sql = User::create($request);
        }catch(\Throwable $erro){
            return array('error', 'Error: ' . $erro->getMessage()); 
        }
    }

    protected function alterar($request)
    {
        try{
            
            $sql = User::find($request['id']);
            
            $sql->save();

            return $sql;

        }catch(\Throwable $erro){
            return array('error', 'Error: ' . $erro->getMessage()); 
        }
    }
}
