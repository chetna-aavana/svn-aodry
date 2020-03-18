<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit81ad3f0e945b21ae5be0889ab25e9ef4
{
    public static $files = array (
        '5255c38a0faeba867671b61dfda6d864' => __DIR__ . '/..' . '/paragonie/random_compat/lib/random.php',
        '72579e7bd17821bb1321b87411366eae' => __DIR__ . '/..' . '/illuminate/support/helpers.php',
    );

    public static $prefixLengthsPsr4 = array (
        'W' => 
        array (
            'Webit\\PHPgs\\' => 12,
        ),
        'S' => 
        array (
            'Symfony\\Component\\Process\\' => 26,
        ),
        'P' => 
        array (
            'Psr\\SimpleCache\\' => 16,
            'PhpOffice\\PhpSpreadsheet\\' => 25,
            'ParseCsv\\tests\\' => 15,
            'ParseCsv\\extensions\\' => 20,
            'ParseCsv\\' => 9,
        ),
        'O' => 
        array (
            'Org_Heigl\\Ghostscript\\' => 22,
        ),
        'I' => 
        array (
            'Illuminate\\Support\\' => 19,
            'Illuminate\\Contracts\\' => 21,
            'Illuminate\\Config\\' => 18,
        ),
        'G' => 
        array (
            'Gufy\\PdfToHtml\\' => 15,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Webit\\PHPgs\\' => 
        array (
            0 => __DIR__ . '/..' . '/webit/phpgs/src',
        ),
        'Symfony\\Component\\Process\\' => 
        array (
            0 => __DIR__ . '/..' . '/symfony/process',
        ),
        'Psr\\SimpleCache\\' => 
        array (
            0 => __DIR__ . '/..' . '/psr/simple-cache/src',
        ),
        'PhpOffice\\PhpSpreadsheet\\' => 
        array (
            0 => __DIR__ . '/..' . '/phpoffice/phpspreadsheet/src/PhpSpreadsheet',
        ),
        'ParseCsv\\tests\\' => 
        array (
            0 => __DIR__ . '/..' . '/parsecsv/php-parsecsv/tests',
        ),
        'ParseCsv\\extensions\\' => 
        array (
            0 => __DIR__ . '/..' . '/parsecsv/php-parsecsv/src/extensions',
        ),
        'ParseCsv\\' => 
        array (
            0 => __DIR__ . '/..' . '/parsecsv/php-parsecsv/src',
        ),
        'Org_Heigl\\Ghostscript\\' => 
        array (
            0 => __DIR__ . '/..' . '/org_heigl/ghostscript/src',
        ),
        'Illuminate\\Support\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/support',
        ),
        'Illuminate\\Contracts\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/contracts',
        ),
        'Illuminate\\Config\\' => 
        array (
            0 => __DIR__ . '/..' . '/illuminate/config',
        ),
        'Gufy\\PdfToHtml\\' => 
        array (
            0 => __DIR__ . '/..' . '/gufy/pdftohtml-php/src',
        ),
    );

    public static $prefixesPsr0 = array (
        's' => 
        array (
            'stringEncode' => 
            array (
                0 => __DIR__ . '/..' . '/paquettg/string-encode/src',
            ),
        ),
        'S' => 
        array (
            'Smalot\\PdfParser\\' => 
            array (
                0 => __DIR__ . '/..' . '/smalot/pdfparser/src',
            ),
            'SimpleExcel\\' => 
            array (
                0 => __DIR__ . '/..' . '/faisalman/simple-excel-php/src',
            ),
        ),
        'P' => 
        array (
            'PHPHtmlParser' => 
            array (
                0 => __DIR__ . '/..' . '/paquettg/php-html-parser/src',
            ),
        ),
        'G' => 
        array (
            'Gufy' => 
            array (
                0 => __DIR__ . '/..' . '/gufy/pdftohtml-php/src',
            ),
        ),
        'D' => 
        array (
            'Doctrine\\Common\\Inflector\\' => 
            array (
                0 => __DIR__ . '/..' . '/doctrine/inflector/lib',
            ),
        ),
    );

    public static $classMap = array (
        'Datamatrix' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/datamatrix.php',
        'PDF417' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/pdf417.php',
        'QRcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/barcodes/qrcode.php',
        'TCPDF' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf.php',
        'TCPDF2DBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_2d.php',
        'TCPDFBarcode' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_barcodes_1d.php',
        'TCPDF_COLORS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_colors.php',
        'TCPDF_FILTERS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_filters.php',
        'TCPDF_FONTS' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_fonts.php',
        'TCPDF_FONT_DATA' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_font_data.php',
        'TCPDF_IMAGES' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_images.php',
        'TCPDF_IMPORT' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_import.php',
        'TCPDF_PARSER' => __DIR__ . '/..' . '/tecnickcom/tcpdf/tcpdf_parser.php',
        'TCPDF_STATIC' => __DIR__ . '/..' . '/tecnickcom/tcpdf/include/tcpdf_static.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit81ad3f0e945b21ae5be0889ab25e9ef4::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit81ad3f0e945b21ae5be0889ab25e9ef4::$prefixDirsPsr4;
            $loader->prefixesPsr0 = ComposerStaticInit81ad3f0e945b21ae5be0889ab25e9ef4::$prefixesPsr0;
            $loader->classMap = ComposerStaticInit81ad3f0e945b21ae5be0889ab25e9ef4::$classMap;

        }, null, ClassLoader::class);
    }
}