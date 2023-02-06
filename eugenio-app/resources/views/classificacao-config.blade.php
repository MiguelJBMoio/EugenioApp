<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <style>
    .container {
      width: 80%;
      margin: 0 auto;
    }
    table {
        width: 100%;
        text-align: center;
        border-collapse: collapse;
        margin-top: 1.5rem;
        background-color: rgba(26, 188, 156, 0.2);
        border-radius: 0.5rem;
    }

    th, td {
        padding: 1rem;
    }

    thead tr {
        background-color: rgba(164, 233, 219, 0.5);
        border-bottom: 2px solid #16a085;
    }

    tr:nth-child(even) {
        background-color: rgba(149, 165, 166, 0.1);
    }

    tr.highlighted {
        background-color: rgba(18, 115, 243, 0.2);
    }

    th {
        font-weight: 600;
    }
</style>
</head>
<body class="font-mono text-2xl">
  <div class="container ">
    <a href="/" class="bg-red-500 text-white p-2 rounded-lg float-left text-sm">Menu Principal</a>
    <h1 class="text-center text-3xl m-4 text-blue-700">Configuração {{ $idConfiguracao }}</h1>
    <table class="rounded-lg border shadow-2xl ">
      <thead>
        <tr>
          <th>Jogador / Equipa</th>
          <th>WPM</th>
          <th>Quantidade de Erros</th>
          <th>Quantidade de Certas</th>
          <th>Tempo</th>
          <th>Pontuação Final</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($classificacoes->sortByDesc('Pontuacao_Final') as $classificacao)
            @if($classificacao->id_configuracao == $idConfiguracao)
                <tr class="@if($classificacao->id_jogador == $jogadorAtual) animate-pulse @endif {{ $classificacao->id_jogador == $jogadorAtual ? 'highlighted' : '' }}">
                    <td>{{ $classificacao->Nome_Jogador }}</td>
                    <td>{{ $classificacao->WPM }}</td>
                    <td>{{ $classificacao->QTD_Erros }}</td>
                    <td>{{ $classificacao->QTD_Certas }}</td>
                    <td>{{ $classificacao->Tempo }}</td>
                    <td>{{ $classificacao->Pontuacao_Final }}</td>
                </tr>
            @endif
        @endforeach
      </tbody>
    </table>
    <div class="container">
      <!-- outro código aqui -->
      <div class="text-center">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full mt-6" onclick="location.href='{{url('iniciar-desafio')}}'">Iniciar Desafio</button>
      </div>
    </div>
  </div>
</body>
</html>