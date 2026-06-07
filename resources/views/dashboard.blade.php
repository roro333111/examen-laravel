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

        header {
            background: #111;
            color: white;
        }
    </style>
</head>

<body>

    <header>
        <h1>GESTOR DELS MEUS PROJECTES</h1>
    </header>

    <main class="layout">
        <p id="saludo">

        </p>

        <aside class="sidebar">
            <h2>Llistat del meus projectes</h2>
        </aside>

        <article class="featured">
            Projecte 1: És el projecte més nou
        </article>

        <section class="news">

        </section>
        
        <a id="editarProjecte" href="#">
            Editar Projecte
        </a>
        <br>
        <a href="/createProject">
            Crear Projecte
        </a>
        <br>
        <button id="logout">
            Cerrar sesión
        </button>
    </main>

    <footer>
        <p>Examen DAW - Layout Responsive sense media queries</p>
    </footer>

    <script src="/js/dashboard.js"></script>

</body>

</html>