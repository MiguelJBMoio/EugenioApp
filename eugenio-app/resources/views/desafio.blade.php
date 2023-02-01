<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Desafio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@1.8.3/dist/tailwind.min.css">
</head>
<body class="bg-gray-200 h-screen">
    <div class="flex flex-col items-center h-screen w-full bg-gray-300">
        <h1 class="text-3xl font-medium text-gray-800 mt-10">{{ $configuracao->Titulo }} | {{ $jogador->Nome }}</h1>
      
        <div class="w-2/3 mt-10">
          <p class="text-gray-800 font-medium">Tempo restante: <span>{{ $configuracao->Tempo_Configuracao }}</span></p>
          <p id="expected-text" class="text-gray-800 font-medium mt-5">{{ $configuracao->Texto }}</p>
          <textarea id="input-text" class="w-full h-64 p-5 border border-gray-400 mt-5" id="texto"></textarea>
        </div>
      
        <button class="bg-green-500 hover:bg-green-700 text-white font-medium py-2 px-4 mt-10 rounded" id="terminar">Terminar Desafio</button>
    </div>
      
      <script>
        const expectedText = document.querySelector("#expected-text").innerText;
        const inputText = document.querySelector("#input-text");
        
        inputText.addEventListener("input", function() {
            const inputValue = inputText.value;
            let isCorrect = true;
            
            for (let i = 0; i < inputValue.length; i++) {
                if (inputValue[i] !== expectedText[i]) {
                    isCorrect = false;
                    break;
                }
            }
            
            inputText.style.backgroundColor = isCorrect ? "green" : "red";
        });
    </script>
      
</body>
</html>
