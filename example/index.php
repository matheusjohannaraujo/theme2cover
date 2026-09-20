<?php

require_once "../vendor/autoload.php";

$name = $_GET["name"] ?? "Uma Capa Legal";
$image = \MJohann\Packlib\Theme2Cover::create($name);

?>

<!doctype html>
<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>Theme2Cover</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">

</head>

<body class="bg-dark text-light">

    <div class="container py-4">

        <div class="d-flex justify-content-between align-items-center mb-4">

            <h1 class="h4 mb-0">
                ✨ Theme2Cover
            </h1>

            <span class="badge text-bg-success">
                Online
            </span>

        </div>


        <form
            class="row g-2 mb-4"
            method="get">

            <div class="col">

                <input
                    class="form-control"
                    name="name"
                    value="<?= htmlspecialchars($name) ?>"
                    placeholder="Tema da capa">

            </div>

            <div class="col-auto">

                <button class="btn btn-primary">
                    Gerar
                </button>

            </div>

        </form>


        <div class="d-flex justify-content-between align-items-center mb-2">

            <small class="text-secondary">
                Preview
            </small>

            <div class="d-flex align-items-center gap-3">

                <div class="form-check form-switch mb-0">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="auto">

                    <label
                        class="form-check-label"
                        for="auto">
                        Automático
                    </label>

                </div>

                <small
                    id="counter"
                    class="text-secondary"></small>

            </div>

        </div>


        <img
            src="<?= htmlspecialchars($image) ?>"
            class="img-fluid rounded-4 shadow"
            alt="Capa">

    </div>


    <script>
        const auto = document.querySelector("#auto");
        const counter = document.querySelector("#counter");

        const STORAGE_KEY = "theme2cover_auto";

        let timer;
        let seconds = 3;

        function generate() {

            const params = new URLSearchParams({
                name: <?= json_encode($name) ?>
            });

            location.href = `?${params}`;

        }

        function start() {

            clearInterval(timer);

            seconds = 3;

            counter.textContent = `${seconds}s`;

            timer = setInterval(() => {

                counter.textContent = `${--seconds}s`;

                if (seconds <= 0) {
                    generate();
                }

            }, 1000);

        }

        function stop() {

            clearInterval(timer);

            counter.textContent = "";

        }

        auto.checked = sessionStorage.getItem(STORAGE_KEY) === "true";

        auto.addEventListener("change", () => {

            sessionStorage.setItem(
                STORAGE_KEY,
                auto.checked
            );

            auto.checked ?
                start() :
                stop();

        });


        if (auto.checked) {
            start();
        }
    </script>

</body>

</html>