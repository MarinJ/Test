<html>
<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
    <title>Notificacion del sistema</title>
</head>
<body>
    <p>Se actualizo el catalogo de KINEDU.</p>
    <p>Estos son los datos del producto:</p>
    <ul>
        <li>Nombre: {{ $alertMail->Nombre }}</li>
        <li>Descripción: {{ $alertMail->Descripcion }}</li>
        <li>Unidad de medida: {{ $alertMail->Unidad_medida }}</li>
        <li>Precio: ${{ $alertMail->Precio }}</li>
        <li>Marca: {{ $alertMail->Marca }}</li>
    </ul>
</body>
</html>