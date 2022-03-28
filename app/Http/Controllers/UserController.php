<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Repositories\Contracts\RepositoriesContractsInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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
    
    public function loginPage()
    {
        return view('login');
    }

    public function authPage(LoginRequest $request)
    {
       $user = $request->validated();
        
        if (Auth::attempt($user)){
            $request->session()->regenerate();

            return redirect()->intended('/authContent');
        }

        return redirect()->route('index');
    }

    public function authContent()
    {
        return view ('auth');
    }

}
