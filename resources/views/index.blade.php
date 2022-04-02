@extends('masterPage')
@section('index')
<div class="container-fluid">
    <div class="row">
        <div class="col-4">
            <form action="{{route('postUser')}}" method="POST">
                @csrf
                @method('post')
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
                </div>
                <div class="mb-3">
                    <label for="pwd" class="form-label">Password:</label>
                    <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
                </div>

                <button type="submit" class="btn btn-primary">Cadastrar</button>

                <a class="btn btn-primary" href="{{route('loginPage')}}">Entrar</a>
            </form>
            @if ($errors->any())
            <div class="alert  mt-3">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            @if (session('status'))
            <div class="alert">
                {{session('status')}}
            </div>
            @endif
        </div>


        <div class="col-8">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    @foreach ($users as $user )
                    <tr>
                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            <form action="{{route('deleteUser', ['id' => $user->id])}}" method="post">
                                @csrf
                                @method('delete')
                                <button class="btn btn-danger" type="submit">Deletar</button>
                                <a class="btn btn-primary" href="{{route('updatePage', ['id' => $user->id])}}">Atualizar</a>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection