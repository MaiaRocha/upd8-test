<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
        integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Editar Cliente</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('clients.update', ['client' => $client->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="cpf">CPF</label>
                                <input id="cpf" type="text" class="form-control" name="cpf"
                                    placeholder="000.000.000-00" maxlength="11" minlength="11" required autofocus
                                    value="{{ $client->cpf }}">
                            </div>

                            <div class="form-group">
                                <label for="name">Nome</label>
                                <input id="name" type="text" class="form-control" name="name"
                                    value="{{ $client->name }}" required>
                            </div>

                            <div class="form-group">
                                <label for="date_of_birth">Data de Nascimento </label>
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth"
                                    value="{{ $client->date_of_birth }}" required>
                            </div>

                            <div class="form-group">
                                <label>Gênero</label><br>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="gender" value="F"
                                        {{ $client->gender === 'F' ? 'checked' : '' }}>
                                    <label class="form-check-label">Feminino</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input type="checkbox" class="form-check-input" name="gender" value="M"
                                        {{ $client->gender === 'M' ? 'checked' : '' }}>
                                    <label class="form-check-label">Masculino</label>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="address">Endereço</label>
                                <input id="address" type="text" class="form-control" name="address"
                                    value="{{ $client->address }}" required>
                            </div>

                            <div class="form-group">
                                <label for="state">Estado</label>
                                <select id="state" class="form-control" name="state" required>
                                    <option value="">Selecione</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state }}"
                                            @if ($client->state === $state) selected @endif>{{ $state }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="city">Cidade</label>
                                <select id="city" class="form-control" name="city" required>
                                    <option value="">Selecione</option>
                                    @foreach ($cities as $city)
                                        <option value="{{ $city }}"
                                            @if ($client->city === $city) selected @endif>{{ $city }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Salvar</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"
        integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous">
    </script>
</body>

</html>
