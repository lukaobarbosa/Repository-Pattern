<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\CadastroRequest;
use App\Repositories\Contracts\RepositoriesContractsInterface;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\UpdateRequest;

class UserController extends Controller
{
    public function getUser(RepositoriesContractsInterface $model)
    {
        $users = $model->all();

        return view ('index', compact('users'));   
    }

    public function postUser(RepositoriesContractsInterface $model, CadastroRequest $request)
    {
        $model->create([
            'name' => $request->name, 'email' => $request->email, 'password' => Hash::make($request->password)]);

        return redirect()->route('index')->with(['status' => 'Criado com sucesso !!']);
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

    public function updateUser(RepositoriesContractsInterface $model, UpdateRequest $request, $id)
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

        return redirect()->route('loginPage')->withErrors([
            'wrongPassword' => 'Senha ou Email incorretos'
        ]);
    }

    public function authContent(RepositoriesContractsInterface $model)
    {
        $user = Auth::user();
        return view ('authContent', compact('user'));
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('index');
    }

}
