<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/styles.css" />
</head>

<body>
    <div class="navbar">
        <a href="../../index.php" id="homeLink">
            <h1 class="title">TicketApp</h1>
        </a>
        <a class="agregar" href="./app/views/form.php">Agregar ticket</a>
    </div>

    <script>
        // Obtenemos la URL actual
        var currentURL = window.location.href;

        // Verificamos si estamos en la página index.php
        if (currentURL.includes("index.php")) {
            // Obtenemos el enlace de la barra de navegación
            var homeLink = document.getElementById("homeLink");
            // Asignamos un evento de clic al enlace
            homeLink.addEventListener("click", function(event) {
                // Prevenimos el comportamiento predeterminado del enlace
                event.preventDefault();
                // Actualizamos la página (refrescamos)
                window.location.reload();
            });
        }
    </script>
</body>

</html>