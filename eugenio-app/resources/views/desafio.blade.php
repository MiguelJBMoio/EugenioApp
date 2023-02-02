<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Desafio</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@1.8.3/dist/tailwind.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Orbitron&display=swap" rel="stylesheet">
    <style>
        #expected-text {
            font-family: "Lucida Console", "Courier New", monospace;
            font-size: 24px;
            font-weight: bold;
        }
    </style>
</head>
<body class="bg-gray-200 h-screen">
    <div class="flex flex-col items-center h-screen w-full bg-gray-300">
        <h1 class="text-6xl font-medium text-gray-800 mt-10">{{ $configuracao->Titulo }} | {{ $jogador->Nome }}</h1>
        <div class="w-2/3 mt-10">
            <p id="time" class=" text-center text-4xl text-gray-800 font-medium mt-5"><span class="rounded-full border-4 border-black p-4 border-dashed border-gray-800">{{ $tempo_config }}</span></p>


            <p id="expected-text" class="text-gray-800 font-medium mt-5">{{ $configuracao->Texto }}</p>
            <textarea id="input-text" class="w-full h-64 p-5 border border-gray-400 mt-5 text-2xl" id="texto"></textarea>
          </div>
        
          <button class="bg-green-500 hover:bg-green-700 text-white font-medium py-2 px-4 mt-10 rounded" id="terminar">Terminar Desafio</button>
      </div>
        

        <script id="Script verificação de cada caractere">
            

            const expectedText = document.querySelector("#expected-text").innerText;
            const inputText = document.querySelector("#input-text");
            const expectedTextContainer = document.querySelector("#expected-text");
      
            inputText.addEventListener("input", function() {
            const inputValue = inputText.value;
      
            let expectedTextWithStyles = "";
      
            for (let i = 0; i < expectedText.length; i++) {
                if (i < inputValue.length) {
                    if (inputValue[i] === expectedText[i]) {
                        expectedTextWithStyles += `<span style="color: green;">${expectedText[i]}</span>`;
                    } else if(inputValue[i] !== ' ' && expectedText[i] === ' '){
                        expectedTextWithStyles += `<span style="background-color: red;">${expectedText[i]}</span>`;
                    } else {
                        expectedTextWithStyles += `<span style="color: red;">${expectedText[i]}</span>`;
                    }
                } else {
                    expectedTextWithStyles += expectedText[i];
                }
            }
      
            expectedTextContainer.innerHTML = expectedTextWithStyles;
            });
      
        </script>

        <script id="Script Cronômetro">
            let intervalId;
        
            inputText.addEventListener("focus", function() {
            if (intervalId) {
                return;
            }
        
            const timeDisplay = document.querySelector("#time");
            const time = "{{ $configuracao->Tempo_Configuracao }}"; // pega o valor da variável
            const timeArray = time.split(":"); // divide o tempo em horas, minutos e segundos
            let totalSeconds = parseInt(timeArray[0]) * 3600 + parseInt(timeArray[1]) * 60 + parseInt(timeArray[2]); // converte para segundos
        
            intervalId = setInterval(function() {
                totalSeconds--; // decrementa o número de segundos
                let hours = Math.floor(totalSeconds / 3600); // converte para horas
                let minutes = Math.floor((totalSeconds - hours * 3600) / 60); // converte para minutos
                let seconds = totalSeconds - (hours * 3600 + minutes * 60); // segundos restantes
                // atualiza a exibição do tempo com os novos valores
                timeDisplay.innerHTML = `${("0" + minutes).slice(-2)}:${("0" + seconds).slice(-2)}`; 
                if (totalSeconds === 0) {
                clearInterval(intervalId); // para a contagem quando chegar a zero
                intervalId = null;
                }
            }, 1000);
            });
        </script>
        
    </body>
    </html>      