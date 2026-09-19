<?php

use MJohann\Packlib\Theme2Cover;

require_once "../vendor/autoload.php";

$image = Theme2Cover::create(
    'Uma Capa Legal'
);

?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>

    <meta charset="UTF-8">

    <title>Gerador de Capa</title>

    <script>
        window.addEventListener("load", function(){
            window.setTimeout(() => {
                window.location.href = "?random=" + Math.random();
            }, 5000);
        });
    </script>

    <style>

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            padding: 50px;

            background:
                radial-gradient(
                    circle at top,
                    #f8fafc,
                    #cbd5e1
                );

            font-family:
                Arial,
                sans-serif;
        }

        .container {
            width: min(
                1400px,
                100%
            );

            margin: auto;
        }

        .card {
            overflow: hidden;

            border-radius: 24px;

            box-shadow:
                0 30px 80px
                rgba(15, 23, 42, .35);
        }

        .card img {
            display: block;

            width: 100%;
            height: auto;
        }

    </style>

</head>

<body>

    <div class="container">

        <div class="card">

            <img
                src="<?= htmlspecialchars(
                    $image,
                    ENT_QUOTES,
                    'UTF-8'
                ) ?>"
                alt="Capa"
            >

        </div>

    </div>

</body>

</html>
