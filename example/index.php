<?php

$name = $_GET["name"] ?? "Uma Capa Legal";

?>

<!doctype html>

<html lang="pt-BR">

<head>

    <meta charset="utf-8">

    <meta
        name="viewport"
        content="width=device-width, initial-scale=1">

    <title>Theme2Cover</title>


    <!-- Bootstrap -->

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet">


    <style>
        /* =====================================================
           CAROUSEL
        ===================================================== */

        #carousel {

            background: #111;

        }


        #carousel .carousel-item {

            height: 600px;

            background: #111;

        }


        #carousel .carousel-item img {

            width: 100%;

            height: 100%;

            object-fit: contain;

        }


        /* =====================================================
           PREVIEW
        ===================================================== */

        #carouselPreview {

            width: 100%;

        }


        #previewTrack {

            display: flex;

            gap: 8px;

            overflow-x: auto;

            overflow-y: hidden;

            padding: 8px 4px 12px;

            scroll-behavior: smooth;

            scrollbar-width: thin;

        }


        /* =====================================================
           MINIATURA
        ===================================================== */

        .preview-item {

            position: relative;

            flex: 0 0 100px;

            width: 100px;

            height: 70px;

            padding: 2px;

            border: 2px solid transparent;

            border-radius: 8px;

            background: #212529;

            cursor: pointer;

            overflow: hidden;

            opacity: .6;

            transition:
                border-color .2s,
                transform .2s,
                opacity .2s;

        }


        .preview-item:hover {

            opacity: 1;

            transform: translateY(-2px);

        }


        .preview-item.active {

            border-color: #0d6efd;

            opacity: 1;

            transform: translateY(-2px);

        }


        .preview-item img {

            display: block;

            width: 100%;

            height: 100%;

            object-fit: cover;

            border-radius: 5px;

        }


        /* =====================================================
           NÚMERO DA MINIATURA
        ===================================================== */

        .preview-number {

            position: absolute;

            left: 5px;

            bottom: 5px;

            padding: 2px 5px;

            color: white;

            background: rgba(0, 0, 0, .75);

            border-radius: 4px;

            font-size: 10px;

            line-height: 1;

        }


        /* =====================================================
           DOTS
        ===================================================== */

        #carouselDots {

            display: flex;

            flex-wrap: wrap;

            justify-content: center;

            gap: 5px;

            margin-top: 8px;

        }


        #carouselDots button {

            width: 8px;

            height: 8px;

            padding: 0;

            border: 0;

            border-radius: 50%;

            background: #6c757d;

            opacity: .6;

            transition: .2s;

        }


        #carouselDots button.active {

            width: 10px;

            height: 10px;

            background: #fff;

            opacity: 1;

        }


        /* =====================================================
           STATUS
        ===================================================== */

        #status {

            min-height: 22px;

        }


        /* =====================================================
           RESPONSIVO
        ===================================================== */

        @media (max-width: 768px) {

            #carousel .carousel-item {

                height: 400px;

            }


            .preview-item {

                flex: 0 0 80px;

                width: 80px;

                height: 58px;

            }

        }
    </style>

</head>


<body class="bg-dark text-light">


    <div class="container py-4">


        <!-- =====================================================
         CABEÇALHO
    ===================================================== -->

        <div
            class="d-flex justify-content-between align-items-center mb-4">

            <h1 class="h4 mb-0">

                Theme2Cover

            </h1>


            <span class="badge text-bg-success">

                Online

            </span>

        </div>


        <!-- =====================================================
         FORMULÁRIO
    ===================================================== -->

        <form
            id="form"
            class="row g-2 mb-4">


            <div class="col">

                <input
                    id="name"
                    class="form-control"
                    value="<?= htmlspecialchars($name) ?>"
                    placeholder="Tema da capa"
                    autocomplete="off">

            </div>


            <div class="col-auto">

                <button
                    type="submit"
                    id="generateButton"
                    class="btn btn-primary">

                    Gerar 10 imagens

                </button>

            </div>


        </form>


        <!-- =====================================================
         CONTROLES
    ===================================================== -->

        <div
            class="d-flex justify-content-between align-items-center mb-2 flex-wrap gap-2">


            <!-- CONTADOR -->

            <div>

                <small class="text-secondary">

                    Preview

                </small>


                <span
                    id="counter"
                    class="badge text-bg-secondary ms-2">

                    Slide 0 de 0

                </span>

            </div>


            <!-- CONTROLES -->

            <div
                class="d-flex align-items-center gap-2 flex-wrap">


                <!-- ROLAGEM AUTOMÁTICA -->

                <button
                    type="button"
                    id="carouselAuto"
                    class="btn btn-sm btn-outline-light">

                    ⏸ Pausar

                </button>


                <!-- GERAÇÃO AUTOMÁTICA -->

                <div
                    class="form-check form-switch mb-0">

                    <input
                        class="form-check-input"
                        type="checkbox"
                        id="auto">


                    <label
                        class="form-check-label"
                        for="auto">

                        Gerar automaticamente

                    </label>

                </div>


                <!-- LIMPAR -->

                <button
                    type="button"
                    id="clear"
                    class="btn btn-sm btn-outline-danger">

                    Limpar

                </button>

            </div>

        </div>


        <!-- =====================================================
         CAROUSEL
    ===================================================== -->

        <div
            id="carousel"
            class="carousel slide rounded-4 overflow-hidden shadow">


            <div
                id="carouselInner"
                class="carousel-inner">


                <div
                    class="carousel-item active">

                    <div
                        class="d-flex justify-content-center align-items-center h-100">

                        <span class="text-secondary">

                            Gerando imagens...

                        </span>

                    </div>

                </div>


            </div>


            <!-- ANTERIOR -->

            <button
                class="carousel-control-prev"
                type="button"
                data-bs-target="#carousel"
                data-bs-slide="prev">

                <span
                    class="carousel-control-prev-icon">
                </span>


                <span class="visually-hidden">

                    Anterior

                </span>

            </button>


            <!-- PRÓXIMO -->

            <button
                class="carousel-control-next"
                type="button"
                data-bs-target="#carousel"
                data-bs-slide="next">

                <span
                    class="carousel-control-next-icon">
                </span>


                <span class="visually-hidden">

                    Próximo

                </span>

            </button>


        </div>


        <!-- =====================================================
         PREVIEW
    ===================================================== -->

        <div
            id="carouselPreview"
            class="mt-3">


            <div
                id="previewTrack">

                <!-- Miniaturas -->

            </div>


        </div>


        <!-- =====================================================
         DOTS
    ===================================================== -->

        <div
            id="carouselDots">

        </div>


        <!-- =====================================================
         STATUS
    ===================================================== -->

        <div
            id="status"
            class="text-center text-secondary small mt-3">

            Gerando as 10 imagens iniciais...

        </div>


    </div>


    <!-- Bootstrap -->

    <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
    </script>


    <script>
        // =========================================================
        // ELEMENTOS
        // =========================================================

        const form =
            document.querySelector("#form");


        const nameInput =
            document.querySelector("#name");


        const generateButton =
            document.querySelector("#generateButton");


        const carouselElement =
            document.querySelector("#carousel");


        const carouselInner =
            document.querySelector("#carouselInner");


        const carouselDots =
            document.querySelector("#carouselDots");


        const previewTrack =
            document.querySelector("#previewTrack");


        const counter =
            document.querySelector("#counter");


        const status =
            document.querySelector("#status");


        const auto =
            document.querySelector("#auto");


        const clearButton =
            document.querySelector("#clear");


        const carouselAuto =
            document.querySelector("#carouselAuto");


        // =========================================================
        // CONFIGURAÇÕES
        // =========================================================

        const INITIAL_IMAGES = 10;

        const MAX_IMAGES = 20;

        const GENERATION_INTERVAL = 3000;

        const CAROUSEL_INTERVAL = 4000;


        // =========================================================
        // ESTADO
        // =========================================================

        let images = [];

        let generationTimer = null;

        let carouselTimer = null;

        let generating = false;

        let carouselRunning = true;

        let generationId = 0;


        // =========================================================
        // BOOTSTRAP CAROUSEL
        // =========================================================

        const carouselInstance =
            bootstrap.Carousel.getOrCreateInstance(
                carouselElement, {

                    interval: false,

                    ride: false,

                    wrap: true

                }
            );


        // =========================================================
        // CONTADOR
        // =========================================================

        function updateCounter() {

            const total =
                images.length;


            if (total === 0) {

                counter.textContent =
                    "Slide 0 de 0";

                return;

            }


            const items = [
                ...carouselElement.querySelectorAll(
                    ".carousel-item"
                )
            ];


            const active =
                carouselElement.querySelector(
                    ".carousel-item.active"
                );


            const index =
                items.indexOf(active);


            counter.textContent =
                `Slide ${index + 1} de ${total}`;

        }


        // =========================================================
        // DOTS
        // =========================================================

        function renderDots() {

            carouselDots.innerHTML = "";


            images.forEach(
                (_, index) => {

                    const button =
                        document.createElement("button");


                    button.type =
                        "button";


                    button.title =
                        `Ir para slide ${index + 1}`;


                    button.setAttribute(
                        "aria-label",
                        `Ir para slide ${index + 1}`
                    );


                    button.addEventListener(
                        "click",
                        () => {

                            /*
                             * Clicar no dot também pausa
                             * a rolagem automática.
                             */

                            stopCarouselAuto();

                            carouselInstance.to(index);

                        }
                    );


                    carouselDots.appendChild(
                        button
                    );

                }
            );


            updateDots();

        }


        // =========================================================
        // ATUALIZAR DOTS
        // =========================================================

        function updateDots() {

            const items = [
                ...carouselElement.querySelectorAll(
                    ".carousel-item"
                )
            ];


            const active =
                carouselElement.querySelector(
                    ".carousel-item.active"
                );


            const activeIndex =
                items.indexOf(active);


            [
                ...carouselDots.children
            ].forEach(
                (dot, index) => {

                    dot.classList.toggle(
                        "active",
                        index === activeIndex
                    );

                }
            );

        }


        // =========================================================
        // PREVIEW
        // =========================================================

        function renderPreview() {

            previewTrack.innerHTML = "";


            images.forEach(
                (image, index) => {

                    const button =
                        document.createElement("button");


                    button.type =
                        "button";


                    button.className =
                        "preview-item";


                    button.title =
                        `Ir para slide ${index + 1}`;


                    button.setAttribute(
                        "aria-label",
                        `Ir para slide ${index + 1}`
                    );


                    button.innerHTML = `

                <img
                    src="${image}"
                    alt="Preview ${index + 1}">

                <span
                    class="preview-number">

                    ${index + 1}

                </span>

            `;


                    /*
                     * Ao clicar em uma miniatura:
                     *
                     * 1. Para a rolagem automática
                     * 2. Vai para o slide escolhido
                     */

                    button.addEventListener(
                        "click",
                        () => {

                            stopCarouselAuto();

                            carouselInstance.to(index);

                        }
                    );


                    previewTrack.appendChild(
                        button
                    );

                }
            );


            updatePreview();

        }


        // =========================================================
        // ATUALIZAR PREVIEW
        // =========================================================

        function updatePreview() {

            const items = [
                ...carouselElement.querySelectorAll(
                    ".carousel-item"
                )
            ];


            const active =
                carouselElement.querySelector(
                    ".carousel-item.active"
                );


            const activeIndex =
                items.indexOf(active);


            const previews = [
                ...previewTrack.querySelectorAll(
                    ".preview-item"
                )
            ];


            previews.forEach(
                (preview, index) => {

                    preview.classList.toggle(
                        "active",
                        index === activeIndex
                    );

                }
            );


            /*
             * Mantém a miniatura ativa visível.
             */

            const activePreview =
                previews[activeIndex];


            if (activePreview) {

                activePreview.scrollIntoView({

                    behavior: "smooth",

                    block: "nearest",

                    inline: "center"

                });

            }

        }


        // =========================================================
        // RENDER CAROUSEL
        // =========================================================

        function renderCarousel() {

            carouselInner.innerHTML = "";


            if (images.length === 0) {

                carouselInner.innerHTML = `

            <div class="carousel-item active">

                <div
                    class="d-flex justify-content-center align-items-center h-100">

                    <span class="text-secondary">

                        Nenhuma imagem gerada

                    </span>

                </div>

            </div>

        `;


                previewTrack.innerHTML = "";

                carouselDots.innerHTML = "";

                updateCounter();

                return;

            }


            images.forEach(
                (image, index) => {

                    const item =
                        document.createElement("div");


                    item.className =
                        "carousel-item";


                    if (index === 0) {

                        item.classList.add(
                            "active"
                        );

                    }


                    const img =
                        document.createElement("img");


                    img.src =
                        image;


                    img.alt =
                        `Capa ${index + 1}`;


                    item.appendChild(
                        img
                    );


                    carouselInner.appendChild(
                        item
                    );

                }
            );


            renderPreview();

            renderDots();

            updateCounter();

        }


        // =========================================================
        // GERAR UMA IMAGEM
        // =========================================================

        async function generateOne(id) {

            if (
                id !== generationId
            ) {

                return false;

            }


            if (
                images.length >= MAX_IMAGES
            ) {

                return false;

            }


            const name =
                nameInput.value.trim();


            if (!name) {

                status.textContent =
                    "Informe um tema.";

                return false;

            }


            const formData =
                new FormData();


            formData.append(
                "name",
                name
            );


            try {

                status.textContent =
                    `Gerando imagem ${images.length + 1} de ${MAX_IMAGES}...`;


                const response =
                    await fetch(
                        "generate.php", {

                            method: "POST",

                            body: formData

                        }
                    );


                const data =
                    await response.json();


                if (
                    !response.ok ||
                    !data.success
                ) {

                    throw new Error(
                        data.message ||
                        "Erro ao gerar imagem."
                    );

                }


                /*
                 * Se o usuário iniciou outro ciclo
                 * enquanto essa requisição estava
                 * rodando, descarta o resultado.
                 */

                if (
                    id !== generationId
                ) {

                    return false;

                }


                images.push(
                    data.image
                );


                renderCarousel();


                return true;


            } catch (error) {

                console.error(error);


                status.textContent =
                    error.message ||
                    "Erro ao gerar imagem.";


                return false;

            }

        }


        // =========================================================
        // GERAR 10 IMAGENS INICIAIS
        // =========================================================

        async function generateInitialImages() {

            /*
             * Invalida o ciclo anterior.
             */

            generationId++;


            const id =
                generationId;


            /*
             * Para geração automática.
             */

            stopGeneration();


            /*
             * Limpa imagens anteriores.
             */

            images = [];


            renderCarousel();


            generating = true;


            generateButton.disabled =
                true;


            try {

                for (
                    let i = 0; i < INITIAL_IMAGES; i++
                ) {

                    if (
                        id !== generationId
                    ) {

                        break;

                    }


                    const success =
                        await generateOne(id);


                    if (!success) {

                        break;

                    }

                }


            } finally {

                generating = false;


                generateButton.disabled =
                    false;


                if (
                    id === generationId
                ) {

                    if (
                        images.length >= INITIAL_IMAGES
                    ) {

                        status.textContent =
                            "10 imagens geradas.";

                    }

                }

            }

        }


        // =========================================================
        // GERAÇÃO AUTOMÁTICA
        // =========================================================

        async function generateAutomatic() {

            if (
                generating
            ) {

                return;

            }


            if (
                !auto.checked
            ) {

                return;

            }


            if (
                images.length >= MAX_IMAGES
            ) {

                stopGeneration();


                status.textContent =
                    "20 imagens geradas. Geração automática parada.";


                return;

            }


            generating = true;


            try {

                await generateOne(
                    generationId
                );


            } finally {

                generating = false;


                if (
                    images.length >= MAX_IMAGES
                ) {

                    stopGeneration();


                    status.textContent =
                        "20 imagens geradas. Geração automática parada.";

                }

            }

        }


        // =========================================================
        // INICIAR GERAÇÃO AUTOMÁTICA
        // =========================================================

        function startGeneration() {

            stopGeneration();


            if (
                !auto.checked
            ) {

                return;

            }


            if (
                images.length >= MAX_IMAGES
            ) {

                return;

            }


            /*
             * Gera uma imediatamente.
             */

            generateAutomatic();


            /*
             * Continua a cada 3 segundos.
             */

            generationTimer =
                setInterval(
                    generateAutomatic,
                    GENERATION_INTERVAL
                );

        }


        // =========================================================
        // PARAR GERAÇÃO AUTOMÁTICA
        // =========================================================

        function stopGeneration() {

            if (
                generationTimer !== null
            ) {

                clearInterval(
                    generationTimer
                );


                generationTimer =
                    null;

            }

        }


        // =========================================================
        // ROLAGEM AUTOMÁTICA
        // =========================================================

        function startCarouselAuto() {

            stopCarouselAuto();


            if (
                images.length <= 1
            ) {

                carouselRunning =
                    false;


                carouselAuto.textContent =
                    "▶ Continuar";


                return;

            }


            carouselRunning =
                true;


            carouselAuto.textContent =
                "⏸ Pausar";


            carouselTimer =
                setInterval(
                    () => {

                        if (
                            images.length > 1
                        ) {

                            carouselInstance.next();

                        }

                    },
                    CAROUSEL_INTERVAL
                );

        }


        // =========================================================
        // PARAR ROLAGEM
        // =========================================================

        function stopCarouselAuto() {

            if (
                carouselTimer !== null
            ) {

                clearInterval(
                    carouselTimer
                );


                carouselTimer =
                    null;

            }


            carouselRunning =
                false;


            carouselAuto.textContent =
                "▶ Continuar";

        }


        // =========================================================
        // BOTÃO PAUSAR / CONTINUAR
        // =========================================================

        carouselAuto.addEventListener(
            "click",
            () => {

                if (
                    carouselRunning
                ) {

                    stopCarouselAuto();

                } else {

                    startCarouselAuto();

                }

            }
        );


        // =========================================================
        // SLIDE ALTERADO
        // =========================================================

        carouselElement.addEventListener(
            "slid.bs.carousel",
            () => {

                updateCounter();

                updatePreview();

                updateDots();

            }
        );


        // =========================================================
        // BOTÃO GERAR
        // =========================================================

        form.addEventListener(
            "submit",
            async event => {

                event.preventDefault();


                if (
                    generating
                ) {

                    return;

                }


                await generateInitialImages();

            }
        );


        // =========================================================
        // GERAÇÃO AUTOMÁTICA
        // =========================================================

        auto.addEventListener(
            "change",
            () => {

                /*
                 * Não usamos sessionStorage aqui.
                 *
                 * Portanto, ao abrir a página,
                 * "Gerar automaticamente" sempre
                 * começa desligado.
                 */

                if (
                    auto.checked
                ) {

                    if (
                        images.length >= INITIAL_IMAGES &&
                        images.length < MAX_IMAGES
                    ) {

                        startGeneration();

                    }

                } else {

                    stopGeneration();


                    status.textContent =
                        "Geração automática desativada.";

                }

            }
        );


        // =========================================================
        // LIMPAR
        // =========================================================

        clearButton.addEventListener(
            "click",
            () => {

                /*
                 * Invalida requisições anteriores.
                 */

                generationId++;


                stopGeneration();


                images = [];


                generating =
                    false;


                generateButton.disabled =
                    false;


                renderCarousel();


                status.textContent =
                    "Carousel limpo.";

            }
        );


        // =========================================================
        // INICIALIZAÇÃO
        // =========================================================

        /*
         * IMPORTANTE:
         *
         * O automático de geração começa
         * SEMPRE desligado.
         */

        auto.checked =
            false;


        /*
         * Geração inicial automática:
         *
         * Assim que a página carregar,
         * cria as primeiras 10 imagens.
         */

        generateInitialImages();


        /*
         * Rolagem do carousel:
         *
         * Aqui deixamos ligada.
         *
         * Assim que as imagens começarem a
         * aparecer, o carousel poderá rolar.
         */

        startCarouselAuto();
    </script>


</body>

</html>