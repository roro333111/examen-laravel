<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <title>DAW</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f4f4f4;
        }
        table{
            border-collapse: collapse;
            width: 100%;
            display: flex;
            flex-direction: column;
        }
        table td{
            padding: 8px;
        }

        #entrada, #sortida{
            margin: 0px 10px;
        }

        .read{
            color: #6ffa8f;
        }
        .noRead{
            color: #fa6f6f;
        }
    </style>
</head>

<body>

    <header>
        <h1>GESTOR DE MISSATGES</h1>
    </header>

    <main class="layout">
        <p id="saludo">

        </p>
        <button id="logout">
            Tancar sessió
        </button>
        <a id="entrada">
            Misatges d'entrada
        </a>
        <a id="sortida">
            Misatges de sortida
        </a>

        <table id="missatges">

        </table>
        <br>
        <a href="/createMessage">
            nou missatge
        </a>
        <br>
        
    </main>

    <script src="/js/dashboard.js"></script>

</body>

</html>