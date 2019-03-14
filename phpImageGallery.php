<html>
    <head>
        <link type="text/css" rel="stylesheet" href="node_modules/lightgallery/dist/css/lightgallery.css" />
    </head>
    <body>

        <!-- jQuery version must be >= 1.8.0; -->
        <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
        <script type="text/javascript" src="node_modules/lightgallery/dist/js/lightgallery.min.js"></script>

        <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

        <!-- lightgallery plugins -->
        <script type="text/javascript" src="node_modules/lightgallery/modules/lg-thumbnail.min.js"></script>
        <script type="text/javascript" src="node_modules/lightgallery/modules/lg-fullscreen.min.js"></script>

        <?php

function scd($dir)
{
    $files = scandir($dir);
    sort($files);
    reset($files);return $files;
}

$output = '<div id="animated-thumbnails">';
$dir = './';
$files = scd($dir);
foreach ($files as $file) {
    echo "<!--" . strpos($file, '.jpg') !== false . "  " . $file . "-->";
    if (strpos($file, '.jpg') !== false || strpos($file, '.mov') !== false) {
        $output .= '<a href="' . $file . '"><img src="thumbs/' . $file . '" /></a>';
    }
}
echo $output . '</div>';
?>

        <script type="text/javascript">
            console.log(window)
            // lightGallery(document.getElementById('animated-thumbnails'), { thumbnail:true });
            $('#animated-thumbnails').lightGallery({ thumbnail:true });
        </script>

    </body>
</html>