<html>
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
<body class="font-mono text-2xl">
</head>
  <div class="container">
    <a href="/" class="bg-red-500 text-white p-2 rounded-lg float-left text-sm">Menu Principal</a>

    <h1 class="text-center text-3xl m-4 text-blue-700">Classificação Geral</h1>
    <table class="rounded-lg border shadow-2xl">
        <thead class="text-xl">
          <tr>
            <th>Jogador / Equipa</th>
            <th>Média de WPM</th>
            <th>Total de certas</th>
            <th>Total de erradas</th>
            <th>Total de tempo</th>
            <th>Total de pontuação final</th>
          </tr>
        </thead>
        <tbody>
          @foreach($classificacoes->sortByDesc('Pontuacao_Final') as $classificacao)
                <tr>
                <td>{{ $classificacao->Nome_Jogador }}</td>
                <td>{{ $classificacao->WPM }}</td>
                <td>{{ $classificacao->QTD_Certas }}</td>
                <td>{{ $classificacao->QTD_Erradas }}</td>
                <td>{{ $classificacao->Tempo }}</td>
                <td>{{ $classificacao->Pontuacao_Final }}</td>
                </tr>
          @endforeach
        </tbody>
      </table>
    </body>   
    
    
</html>