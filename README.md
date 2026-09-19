# [Theme2Cover](https://github.com/matheusjohannaraujo/theme2cover)

**Theme2Cover** is a PHP library that generates 1920×1080 cover images from a simple text theme. It automatically creates a visual composition with random colors, geometric elements, decorative details, and typography, returning the generated image as a Base64-encoded JPEG.

## 📦 Installation

Install via [Packagist/Composer](https://packagist.org/packages/mjohann/theme2cover):

```bash
composer require mjohann/theme2cover
```

## ⚙️ Requirements

* PHP 8.5 or higher
* [Intervention Image](https://image.intervention.io/)
* GD extension

## 🚀 Features

**Theme2Cover** provides an automated way to generate visual covers from text, without requiring a predefined image or a manual design process.

The currently supported features include:

### 🎨 Random Visual Composition

Each generated cover uses a randomly selected visual composition.

The library currently provides six different composition styles:

* **Large circles**
* **Small circles**
* **Grid**
* **Bars**
* **Mixed composition**
* **Abstract composition**

The style is selected randomly every time a cover is generated.

### 🌈 Random Color Palette

The color palette is generated mathematically using the HSL color model.

Each cover receives:

* Background color
* Surface color
* Primary color
* Secondary color
* Accent color

The colors are generated dynamically, so repeated executions can produce different visual results.

### ✍️ Automatic Typography

The theme is rendered using the bundled **Montserrat Bold** font.

The library automatically adjusts the font size according to the length of the theme:

* Up to 25 characters — `92px`
* Up to 45 characters — `82px`
* Up to 70 characters — `70px`
* More than 70 characters — `62px`

The text also supports automatic wrapping with a maximum width of `1100px`.

### 🔷 Decorative Elements

Generated covers include randomly positioned decorative elements such as:

* Circles
* Rectangles
* Bars
* Dots
* Top accent bar
* Title decoration
* Bottom decorative line

These elements are combined with the generated color palette to create a unique composition.

### 🖼️ Base64 Output

The generated image is encoded as JPEG with quality `92` and returned as a Base64 data URI:

```text
data:image/jpeg;base64,...
```

This makes the result directly usable in HTML, CSS, APIs, or other applications that support data URIs.

## 🧪 Usage Examples

### 🖼️ Generate a Cover

The main API is the static `Theme2Cover::create()` method.

It receives the theme as a string and returns the generated cover as a Base64-encoded JPEG.

```php
<?php

use MJohann\Packlib\Theme2Cover;

require_once "vendor/autoload.php";

$cover = Theme2Cover::create(
    "Artificial Intelligence"
);

echo $cover;
```

### 🌐 Display the Generated Cover in HTML

Because the method returns a complete Base64 data URI, the result can be used directly as the `src` attribute of an HTML image.

```php
<?php

use MJohann\Packlib\Theme2Cover;

require_once "vendor/autoload.php";

$cover = Theme2Cover::create(
    "Artificial Intelligence"
);

?>

<img
    src="<?= $cover ?>"
    alt="Generated cover"
/>
```

### 📦 Use the Result in an API

The generated Base64 string can also be returned directly from an API.

```php
<?php

use MJohann\Packlib\Theme2Cover;

require_once "vendor/autoload.php";

$cover = Theme2Cover::create(
    "PHP Development"
);

header(
    'Content-Type: application/json'
);

echo json_encode([
    'theme' => 'PHP Development',
    'cover' => $cover,
]);
```

> 📂 The main implementation is available in [`src/Theme2Cover.php`](src/Theme2Cover.php).

## 🎲 Random Generation

The generated composition is intentionally random.

For each call to:

```php
Theme2Cover::create($tema);
```

the library randomly determines:

* Color palette
* Visual style
* Number of geometric elements
* Element positions
* Element sizes
* Decorative details
* Font size based on the theme length

Therefore, calling the method multiple times with the same theme can generate different covers.

```php
$cover1 = Theme2Cover::create("Web Development");

$cover2 = Theme2Cover::create("Web Development");
```

`$cover1` and `$cover2` may have completely different visual compositions even though the theme is the same.

## 🖼️ Image Specifications

Every generated cover follows the same base specifications:

| Property            | Value           |
| ------------------- | --------------- |
| Width               | `1920px`        |
| Height              | `1080px`        |
| Format              | JPEG            |
| Quality             | `92`            |
| Output              | Base64 Data URI |
| Font                | Montserrat Bold |
| Maximum title width | `1100px`        |

The resulting image uses a `16:9` aspect ratio, making it suitable for presentations, articles, videos, thumbnails, social media content, and other visual applications.

## 🧩 Composition Styles

### 1. Large Circles

Generates a composition with a small number of large circles positioned on the right side of the cover.

### 2. Small Circles

Generates several smaller circles with different sizes and colors.

### 3. Grid

Creates a collection of randomly positioned rectangles, producing a grid-like visual composition.

### 4. Bars

Generates horizontal bars with random dimensions and colors.

### 5. Mixed Composition

Combines large circles, smaller circles, and rectangular elements into a single composition.

### 6. Abstract Composition

Combines large circles with small decorative points to create a more abstract visual layout.

## 📁 Project Structure

```text
theme2cover/
├── src/
│   ├── fonts/
│   │   └── Montserrat-Bold.ttf
│   └── Theme2Cover.php
├── composer.json
├── composer.lock
├── .gitignore
├── LICENSE
└── README.md
```

## 📄 License

This project is licensed under the [MIT License](LICENSE).

## 👨‍💻 Author

Developed by [Matheus Johann Araújo](https://github.com/matheusjohannaraujo) – Pernambuco, Brazil.
