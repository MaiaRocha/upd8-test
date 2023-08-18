<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listagem dos Clientes</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-12">
        <h2 class="text-center">Listagem dos Clientes</h2>
        <form action="{{ route('clients.index') }}" method="GET">
            <div class="bg-light p-3 mb-4">
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="cpf" placeholder="CPF">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" placeholder="Nome">
                            </div>
                            <div class="col-md-6">
                                <input type="date" class="form-control" name="date_of_birth"
                                    placeholder="Data de Nascimento">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="gender" placeholder="Gênero">
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="address" placeholder="Endereço">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="city" placeholder="Cidade">
                            </div>
                            <div class="col-md-6">
                                <input type="text" class="form-control" name="state" placeholder="Estado">
                            </div>
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-primary">Pesquisar</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <div class="row mb-4">
            <div class="col-md-12">
                <a href="{{ route('clients.create') }}" class="btn btn-success">Novo Cliente</a>
            </div>
        </div>


        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">CPF</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Data de Nascimento</th>
                    <th scope="col">Sexo</th>
                    <th scope="col">Endereço</th>
                    <th scope="col">Cidade</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->cpf }}</td>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->formatted_date_of_birth }}</td>
                        <td>{{ $client->gender }}</td>
                        <td>{{ $client->address }}</td>
                        <td>{{ $client->city }}</td>
                        <td>{{ $client->state }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="{{ route('clients.edit', ['client' => $client->id]) }}"
                                    class="btn btn-primary btn-sm">Editar</a>
                                <form action="{{ route('clients.destroy', ['client' => $client->id]) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Excluir</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="d-flex justify-content-center">
            {{ $clients->links('pagination::bootstrap-4') }} <!-- Adiciona a paginação aqui -->
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn
</body>

</html>
