<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Desafio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@1.8.3/dist/tailwind.min.css">
</head>
<body class="bg-gray-200 h-screen">
    <div class="flex justify-center items-center h-full">
        <div class="w-1/3 bg-white p-8 rounded-lg shadow-lg">
            <h1 class="text-2xl font-bold mb-6 text-center">Desafio</h1>
            <form  action="{{ url('desafio') }}" method="get">
                @csrf
                <div class="mb-4">
                    <label for="configuracoes" class="block font-bold mb-2">Configurações</label>
                    <select name="configuracoes" id="configuracoes" class="w-full p-2 rounded border border-gray-400">
                        @foreach($configuracoes as $configuracao)
                            <option value="{{ $configuracao->PK_Configuracao }}">{{ $configuracao->Titulo }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="jogadores" class="block font-bold mb-2">Jogadores</label>
                    <select name="jogadores" id="jogadores" class="w-full p-2 rounded border border-gray-400">
                        @foreach($jogadores as $jogador)
                            <option value="{{ $jogador->PK_Jogador }}">{{ $jogador->Nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="text-center">
                    <button type="submit" class="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">Iniciar Desafio</button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
