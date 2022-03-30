@extends('masterPage')
@section('updatePage')
<div class="container-fluid">
    <div style="width: 300px; margin-left:600px; margin-top:200px">
        <form action="{{route('updateUser', ['id' => $id])}}" method="POST">
            @csrf
            @method('put')
            <div class="mb-3 mt-3">
                <label for="name" class="form-label">Name:</label>
                <input type="text" class="form-control" id="name" placeholder="Enter name" name="name" value="{{$id->name}}">
            </div>
            <div class="mb-3 mt-3">
                <label for="email" class="form-label">Email:</label>
                <input type="email" class="form-control" id="email" placeholder="Enter email" name="email" value="{{$id->email}}">
            </div>
            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>
</div>
@endsection