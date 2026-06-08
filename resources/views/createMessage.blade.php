<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Missatge</title>
</head>
<body>
    <form id="crearMissatge">
        <label for="asunto">Asumpte</label>
        <input type="text" name="asunto" id="asunto" required>
        <label for="mensaje">Missatge</label>
        <textarea name="mensaje" id="mensaje" required></textarea>
        <label for="destinatario_id" >Destinatari</label>
        <select name="destinatario_id" id="destinatario_id" required>

        </select>
        <button type="submit">Crear</button>
    </form>

    <script src="/js/nouMissatge.js"></script>
</body>
</html>