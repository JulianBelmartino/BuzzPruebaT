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
        const currentURL = window.location.href;
        if (currentURL.includes("index.php")) {

            const homeLink = document.getElementById("homeLink");
            homeLink.addEventListener("click", function(event) {
                event.preventDefault();
                window.location.reload();
            });
        }
    </script>
</body>

</html>