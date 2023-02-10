<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Realizar Inscrições</title>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
        h1{
            color: blue;
        }
        .sair{
            background-color: red;
        }

        tbody {
            display: block;
            overflow: auto;
            width: 100%;
            height: 200px;
            overflow-y: scroll;
            overflow-x: hidden;
        }
    </style>
</head>
<body class="bg-gray-100 h-screen flex justify-center items-center">
    <div class="flex flex-col items-center justify-center h-screen">
        <h1 class="md:text-5xl text-center mx-auto my-10">Jogadores/Equipas</h1>
        <div class="flex items-center">
            <form action="{{url('adicionarJogador')}}" method="POST">
                @csrf
                <input class="w-64 h-10 px-4 py-2 mx-4" type="text" name="nomeJogador" id="nomeJogador" placeholder="Inserir nome de Jogador/Equipa">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full">+</button>
            </form>
        </div>
        <table class="my-10 w-full text-center rounded-lg">
            <thead>
                <tr class="bg-blue-700 text-4xl font-bold">
                    <th class="px-4 py-2 text-white">Inscritos</th>
                </tr>
            </thead>
            <tbody class="w-full rounded-lg">
                @foreach($jogadores as $jogador)
                    <tr>
                        <td class="text-3xl">{{$jogador->Nome}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{url('')}}" class="sair bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded-full">Sair</a>
    </div>
</body>
</html>