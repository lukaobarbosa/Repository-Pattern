@extends('masterPage')
@section('login')
<div class="container-fluid" style="width: 330px; margin-top: 240px">
    <form action="{{route('authPage')}}" method="POST">
        @csrf
        <div class="mb-3 mt-3">
            <label for="email" class="form-label">Email:</label>
            <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
        </div>
        <div class="mb-3">
            <label for="pwd" class="form-label">Password:</label>
            <input type="password" class="form-control" id="pwd" placeholder="Enter password" name="password">
        </div>

        <button type="submit" class="btn btn-primary">Entrar</button>
        <a class="btn btn-primary" href="{{route('index')}}">Voltar</a>

    </form>
    @if ($errors->any())
    <div class="alert">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
</div>
@endsection