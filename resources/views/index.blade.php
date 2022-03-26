<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Document</title>
</head>

<body>
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
                </form>
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

    <!--bootstrap-->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
</body>

</html>