<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form id="editProject">
        <input type="hidden" name="id" id="id" value="{{ $id }}">
        <input type="text" name="nom" id="nom">
        <textarea name="descripcio" id="descripcio"></textarea>
        <input type="date" name="data_ini" id="data_ini">
        <input type="date" name="data_fi" id="data_fi">
        <button type="submit">Editar</button>
    </form>

    <script src="/js/editProjects.js"></script>
</body>
</html>