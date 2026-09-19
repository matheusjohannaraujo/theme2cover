<?php

/*
	GitHub: https://github.com/matheusjohannaraujo/theme2cover
	Country: Brasil
	State: Pernambuco
	Developer: Matheus Johann Araujo
	Date: 2026-09-19
*/

namespace MJohann\Packlib;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;
use Intervention\Image\Typography\FontFactory;
use Intervention\Image\Alignment;
use Intervention\Image\Geometry\Factories\RectangleFactory;
use Intervention\Image\Geometry\Factories\CircleFactory;

class Theme2Cover
{

    public static function create(string $tema): string
    {
        $largura = 1920;
        $altura  = 1080;

        $fonte = __DIR__ . '/fonts/Montserrat-Bold.ttf';

        if (!file_exists($fonte)) {
            throw new \RuntimeException(
                "Fonte não encontrada: {$fonte}"
            );
        }

        /*
        * =========================================================
        * GERADOR ALEATÓRIO
        * =========================================================
        *
        * Não usamos mais o tema como seed.
        *
        * Portanto, cada execução pode produzir uma composição
        * completamente diferente.
        */

        /*
        * =========================================================
        * CORES ALEATÓRIAS
        * =========================================================
        */

        $cores = self::generateRandomPalette();

        $bg        = $cores['bg'];
        $surface   = $cores['surface'];
        $primary   = $cores['primary'];
        $secondary = $cores['secondary'];
        $accent    = $cores['accent'];
        $text      = '#FFFFFF';

        /*
        * =========================================================
        * ESTILO VISUAL ALEATÓRIO
        * =========================================================
        */

        $estilo = random_int(1, 6);

        /*
        * =========================================================
        * CRIAÇÃO DA IMAGEM
        * =========================================================
        */

        $manager = ImageManager::usingDriver(
            Driver::class
        );

        $image = $manager
            ->createImage(
                $largura,
                $altura
            )
            ->fill($bg);

        /*
        * =========================================================
        * BARRA SUPERIOR
        * =========================================================
        */

        $barraAltura = random_int(
            6,
            18
        );

        $image->drawRectangle(
            function (RectangleFactory $rectangle) use (
                $largura,
                $barraAltura,
                $primary
            ): void {

                $rectangle->at(
                    0,
                    0
                );

                $rectangle->size(
                    $largura,
                    $barraAltura
                );

                $rectangle->background(
                    $primary
                );
            }
        );

        /*
        * =========================================================
        * ELEMENTOS VISUAIS
        * =========================================================
        */

        switch ($estilo) {

            /*
            * -----------------------------------------------------
            * ESTILO 1
            * CÍRCULOS GRANDES
            * -----------------------------------------------------
            */

            case 1:

                $quantidade = random_int(
                    2,
                    5
                );

                for ($i = 0; $i < $quantidade; $i++) {

                    $diametro = random_int(
                        250,
                        700
                    );

                    $image->drawCircle(
                        function (CircleFactory $circle) use (
                            $diametro,
                            $surface,
                            $primary,
                            $secondary
                        ): void {

                            $circle->at(
                                random_int(1250, 1800),
                                random_int(50, 900)
                            );

                            $circle->diameter(
                                $diametro
                            );

                            $circle->background(
                                self::randomColorFrom(
                                    $surface,
                                    $primary,
                                    $secondary
                                )
                            );
                        }
                    );
                }

                break;

            /*
            * -----------------------------------------------------
            * ESTILO 2
            * CÍRCULOS PEQUENOS
            * -----------------------------------------------------
            */

            case 2:

                $quantidade = random_int(
                    8,
                    18
                );

                for ($i = 0; $i < $quantidade; $i++) {

                    $diametro = random_int(
                        20,
                        180
                    );

                    $image->drawCircle(
                        function (CircleFactory $circle) use (
                            $diametro,
                            $primary,
                            $secondary,
                            $accent
                        ): void {

                            $circle->at(
                                random_int(
                                    1200,
                                    1850
                                ),
                                random_int(
                                    50,
                                    980
                                )
                            );

                            $circle->diameter(
                                $diametro
                            );

                            $circle->background(
                                self::randomColorFrom(
                                    $primary,
                                    $secondary,
                                    $accent
                                )
                            );
                        }
                    );
                }

                break;

            /*
            * -----------------------------------------------------
            * ESTILO 3
            * GRID
            * -----------------------------------------------------
            */

            case 3:

                $quantidade = random_int(
                    8,
                    20
                );

                for ($i = 0; $i < $quantidade; $i++) {

                    $x = random_int(
                        1250,
                        1750
                    );

                    $y = random_int(
                        50,
                        950
                    );

                    $w = random_int(
                        50,
                        280
                    );

                    $h = random_int(
                        20,
                        120
                    );

                    $image->drawRectangle(
                        function (RectangleFactory $rectangle) use (
                            $x,
                            $y,
                            $w,
                            $h,
                            $surface,
                            $primary,
                            $secondary
                        ): void {

                            $rectangle->at(
                                $x,
                                $y
                            );

                            $rectangle->size(
                                $w,
                                $h
                            );

                            $rectangle->background(
                                self::randomColorFrom(
                                    $surface,
                                    $primary,
                                    $secondary
                                )
                            );
                        }
                    );
                }

                break;

            /*
            * -----------------------------------------------------
            * ESTILO 4
            * BARRAS
            * -----------------------------------------------------
            */

            case 4:

                $quantidade = random_int(
                    6,
                    12
                );

                for ($i = 0; $i < $quantidade; $i++) {

                    $x = random_int(
                        1250,
                        1650
                    );

                    $y = random_int(
                        60,
                        900
                    );

                    $w = random_int(
                        100,
                        500
                    );

                    $h = random_int(
                        8,
                        45
                    );

                    $image->drawRectangle(
                        function (RectangleFactory $rectangle) use (
                            $x,
                            $y,
                            $w,
                            $h,
                            $primary,
                            $secondary,
                            $accent
                        ): void {

                            $rectangle->at(
                                $x,
                                $y
                            );

                            $rectangle->size(
                                $w,
                                $h
                            );

                            $rectangle->background(
                                self::randomColorFrom(
                                    $primary,
                                    $secondary,
                                    $accent
                                )
                            );
                        }
                    );
                }

                break;

            /*
            * -----------------------------------------------------
            * ESTILO 5
            * COMPOSIÇÃO MISTA
            * -----------------------------------------------------
            */

            case 5:

                /*
                * Círculo principal
                */

                $diametro = random_int(
                    350,
                    650
                );

                $image->drawCircle(
                    function (CircleFactory $circle) use (
                        $diametro,
                        $surface
                    ): void {

                        $circle->at(
                            random_int(1450, 1700),
                            random_int(50, 200)
                        );

                        $circle->diameter(
                            $diametro
                        );

                        $circle->background(
                            $surface
                        );
                    }
                );

                /*
                * Círculo secundário
                */

                $diametro = random_int(
                    150,
                    400
                );

                $image->drawCircle(
                    function (CircleFactory $circle) use (
                        $diametro,
                        $primary
                    ): void {

                        $circle->at(
                            random_int(1550, 1800),
                            random_int(700, 900)
                        );

                        $circle->diameter(
                            $diametro
                        );

                        $circle->background(
                            $primary
                        );
                    }
                );

                /*
                * Pequenos elementos
                */

                for ($i = 0; $i < 6; $i++) {

                    $image->drawRectangle(
                        function (RectangleFactory $rectangle) use (
                            $secondary
                        ): void {

                            $rectangle->at(
                                random_int(
                                    1250,
                                    1750
                                ),
                                random_int(
                                    200,
                                    850
                                )
                            );

                            $rectangle->size(
                                random_int(20, 70),
                                random_int(70, 250)
                            );

                            $rectangle->background(
                                $secondary
                            );
                        }
                    );
                }

                break;

            /*
            * -----------------------------------------------------
            * ESTILO 6
            * COMPOSIÇÃO ABSTRATA
            * -----------------------------------------------------
            */

            case 6:

                /*
                * Grandes círculos
                */

                for ($i = 0; $i < 3; $i++) {

                    $diametro = random_int(
                        250,
                        600
                    );

                    $image->drawCircle(
                        function (CircleFactory $circle) use (
                            $diametro,
                            $primary,
                            $secondary,
                            $accent
                        ): void {

                            $circle->at(
                                random_int(
                                    1300,
                                    1800
                                ),
                                random_int(
                                    100,
                                    850
                                )
                            );

                            $circle->diameter(
                                $diametro
                            );

                            $circle->background(
                                self::randomColorFrom(
                                    $primary,
                                    $secondary,
                                    $accent
                                )
                            );
                        }
                    );
                }

                /*
                * Pequenos pontos
                */

                for ($i = 0; $i < 15; $i++) {

                    $diametro = random_int(
                        10,
                        45
                    );

                    $image->drawCircle(
                        function (CircleFactory $circle) use (
                            $diametro,
                            $accent
                        ): void {

                            $circle->at(
                                random_int(
                                    1200,
                                    1850
                                ),
                                random_int(
                                    50,
                                    1000
                                )
                            );

                            $circle->diameter(
                                $diametro
                            );

                            $circle->background(
                                $accent
                            );
                        }
                    );
                }

                break;
        }

        /*
        * =========================================================
        * DETALHE DECORATIVO AO LADO DO TÍTULO
        * =========================================================
        */

        $detalheLargura = random_int(
            80,
            220
        );

        $detalheAltura = random_int(
            7,
            14
        );

        $image->drawRectangle(
            function (RectangleFactory $rectangle) use (
                $detalheLargura,
                $detalheAltura,
                $primary
            ): void {

                $rectangle->at(
                    180,
                    340
                );

                $rectangle->size(
                    $detalheLargura,
                    $detalheAltura
                );

                $rectangle->background(
                    $primary
                );
            }
        );

        /*
        * =========================================================
        * TÍTULO
        * =========================================================
        */

        $tamanhoFonte = self::calculateFontSize(
            $tema
        );

        $image->text(
            $tema,
            180,
            420,
            function (FontFactory $font) use (
                $fonte,
                $text,
                $bg,
                $tamanhoFonte
            ): void {

                $font->filepath(
                    $fonte
                );

                $font->size(
                    $tamanhoFonte
                );

                $font->color(
                    $text
                );

                /*
                * Contorno sutil.
                */

                $font->stroke(
                    $bg,
                    2
                );

                $font->align(
                    Alignment::LEFT,
                    Alignment::TOP
                );

                /*
                * Largura máxima do título.
                */

                $font->wrap(
                    1100
                );

                $font->lineHeight(
                    1.08
                );
            }
        );

        /*
        * =========================================================
        * DETALHES DECORATIVOS NO CANTO SUPERIOR ESQUERDO
        * =========================================================
        */

        $quantidadePontos = random_int(
            2,
            5
        );

        for ($i = 0; $i < $quantidadePontos; $i++) {

            $diametro = random_int(
                10,
                24
            );

            $image->drawCircle(
                function (CircleFactory $circle) use (
                    $i,
                    $diametro,
                    $secondary
                ): void {

                    $circle->at(
                        150 + ($i * 45),
                        150
                    );

                    $circle->diameter(
                        $diametro
                    );

                    $circle->background(
                        $secondary
                    );
                }
            );
        }

        /*
        * =========================================================
        * LINHA DECORATIVA INFERIOR
        * =========================================================
        */

        $linhaLargura = random_int(
            200,
            600
        );

        $linhaAltura = random_int(
            5,
            10
        );

        $image->drawRectangle(
            function (RectangleFactory $rectangle) use (
                $linhaLargura,
                $linhaAltura,
                $primary
            ): void {

                $rectangle->at(
                    180,
                    890
                );

                $rectangle->size(
                    $linhaLargura,
                    $linhaAltura
                );

                $rectangle->background(
                    $primary
                );
            }
        );

        /*
        * =========================================================
        * JPEG
        * =========================================================
        */

        $encoded = $image->encodeUsingFileExtension(
            'jpg',
            quality: 92
        );

        return 'data:image/jpeg;base64,' .
            base64_encode(
                $encoded->toString()
            );
    }

    /*
    * =============================================================
    * GERAR PALETA ALEATÓRIA
    * =============================================================
    *
    * Em vez de manter uma lista fixa de paletas,
    * geramos as cores matematicamente.
    */
    private static function generateRandomPalette(): array
    {
        /*
        * Matiz principal.
        *
        * 0 - 360 = todo o círculo de cores.
        */

        $hue = random_int(
            0,
            359
        );

        /*
        * Cores complementares/análogas.
        */

        $hue2 = ($hue + random_int(25, 60)) % 360;

        $hue3 = ($hue + random_int(150, 210)) % 360;

        /*
        * Fundo escuro baseado no matiz.
        */

        $bg = self::hslToHex(
            $hue,
            random_int(25, 45),
            random_int(7, 13)
        );

        /*
        * Superfície.
        */

        $surface = self::hslToHex(
            $hue,
            random_int(35, 60),
            random_int(14, 23)
        );

        /*
        * Cor principal.
        */

        $primary = self::hslToHex(
            $hue,
            random_int(65, 95),
            random_int(45, 65)
        );

        /*
        * Segunda cor.
        */

        $secondary = self::hslToHex(
            $hue2,
            random_int(60, 95),
            random_int(50, 70)
        );

        /*
        * Cor de destaque.
        */

        $accent = self::hslToHex(
            $hue3,
            random_int(55, 90),
            random_int(65, 80)
        );

        return [
            'bg'        => $bg,
            'surface'   => $surface,
            'primary'   => $primary,
            'secondary' => $secondary,
            'accent'    => $accent,
        ];
    }

    /*
    * =============================================================
    * HSL → HEX
    * =============================================================
    */
    private static function hslToHex(
        int $h,
        int $s,
        int $l
    ): string {

        $s /= 100;
        $l /= 100;

        $c = (
            1 - abs(
                2 * $l - 1
            )
        ) * $s;

        $x = $c * (
            1 - abs(
                fmod(
                    $h / 60,
                    2
                ) - 1
            )
        );

        $m = $l - $c / 2;

        if ($h < 60) {

            $r = $c;
            $g = $x;
            $b = 0;
        } elseif ($h < 120) {

            $r = $x;
            $g = $c;
            $b = 0;
        } elseif ($h < 180) {

            $r = 0;
            $g = $c;
            $b = $x;
        } elseif ($h < 240) {

            $r = 0;
            $g = $x;
            $b = $c;
        } elseif ($h < 300) {

            $r = $x;
            $g = 0;
            $b = $c;
        } else {

            $r = $c;
            $g = 0;
            $b = $x;
        }

        $r = (int) round(
            ($r + $m) * 255
        );

        $g = (int) round(
            ($g + $m) * 255
        );

        $b = (int) round(
            ($b + $m) * 255
        );

        return sprintf(
            '#%02X%02X%02X',
            $r,
            $g,
            $b
        );
    }

    /*
    * =============================================================
    * ESCOLHER UMA COR
    * =============================================================
    */
    private static function randomColorFrom(
        string ...$cores
    ): string {
        return $cores[array_rand($cores)];
    }

    /*
    * =============================================================
    * TAMANHO DA FONTE
    * =============================================================
    */
    private static function calculateFontSize(
        string $tema
    ): int {

        $quantidade = mb_strlen(
            $tema,
            'UTF-8'
        );

        if ($quantidade <= 25) {
            return 92;
        }

        if ($quantidade <= 45) {
            return 82;
        }

        if ($quantidade <= 70) {
            return 70;
        }

        return 62;
    }
}
