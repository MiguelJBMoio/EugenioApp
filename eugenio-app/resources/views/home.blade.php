<!DOCTYPE html>
<html>
  <head>
    <link href="https://unpkg.com/tailwindcss@^1.0/dist/tailwind.min.css" rel="stylesheet">
    <style>
      .title {
        text-align: center;
        font-size: 4rem;
        margin-bottom: 2rem;
      }
      .container {
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        height: 100vh;
      }
      .container > button {
        margin: 1rem 0;
        font-size: 2rem;
        padding: 1.5rem 3rem;
        width: 50%;
        background-color: blue;
        text-align: center;
      }
      .container > button:last-child {
        background-color: red;
      }
      @media (max-width: 1080px) {
        .container > button {
          font-size: 1.5rem;
          padding: 1rem 2rem;
        }
      }
      @media (max-width: 720px) {
        .container > button {
          font-size: 1.25rem;
          padding: 0.75rem 1.5rem;
        }
      }
    </style>
  </head>
  <body class="bg-gray-200 align-items justify-content">
    <div class="container mx-auto">
      <h1 class="title text-2xl font-bold text-indigo-600 text-center">Circuito Eugénio</h1>
      <div class="container mx-auto text-center">
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('realizar-inscricoes')}}'">Realizar Inscrições</button>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('iniciar-desafio')}}'">Iniciar Desafio</button>
        <button class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('ver-resultados')}}'">Ver Resultados</button>
        <button class="bg-red-500 hover:bg-red-600 text-white font-bold py-2 px-4 rounded-full" onclick="location.href='{{url('sair')}}'">Sair</button>
      </div>
    </div>
    
  </body>
</html>