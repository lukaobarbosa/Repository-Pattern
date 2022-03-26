<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\Contracts\RepositoriesContractsInterface;



class UserController extends Controller
{
    public function getUser(RepositoriesContractsInterface $model)
    {
        $users = $model->all();

        return view ('index', compact('users'));   
    }

    public function postUser(RepositoriesContractsInterface $model, Request $request)
    {
        $model->create($request->all());

        return redirect()->route('index')->with('sucess', 'Criado com sucesso !!');
    }

    public function deleteUser(RepositoriesContractsInterface $model, $id)
    {
        $model->delete($id);

        return redirect()->route('index');
    }

    public function updatePage(RepositoriesContractsInterface $model, $id)
    {
        $id = $model->getId($id);

        return view('updateContent', compact('id'));
    }

    public function updateUser(RepositoriesContractsInterface $model, Request $request, $id)
    {
        $model->update($id, $request->all());

        return redirect()->route('index');
    }
}
