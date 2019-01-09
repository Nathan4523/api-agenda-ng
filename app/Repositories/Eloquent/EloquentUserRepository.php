<?php

namespace App\Repositories\Eloquent;

use App\User;
use App\Repositories\Contracts\UserRepository;

use Kurt\Repoist\Repositories\Eloquent\AbstractRepository;

class EloquentUserRepository extends AbstractRepository implements UserRepository
{
    public function entity()
    {
        return User::class;
    }

    public function listarTodosUsuarios()
    {
        return User::listarTodos();
    }

    public function listandoPorId($id)
    {
        return User::listarPorId($id);
    }

    public function cadastroContato($data)
    {
        if(empty($data)){
            return array('error', 'Não existe informação para cadastrar');        
        }

        return User::cadastrar($data);
    }

    public function altararCadastro($data)
    {
        if(empty($data)){
            return array('error', 'Não existe informação para cadastrar');        
        }

        return User::alterar($data);
    }
}
