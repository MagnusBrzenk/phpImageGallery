<html>

<head>
    <link type="text/css" rel="stylesheet" href="node_modules/lightgallery/dist/css/lightgallery.css" />
</head>

<body>

    <!-- jQuery version must be >= 1.8.0; -->
    <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script>
    <script type="text/javascript" src="node_modules/lightgallery/dist/js/lightgallery.min.js"></script>

    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
    <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <!-- lightgallery plugins -->
    <script type="text/javascript" src="node_modules/lightgallery/modules/lg-thumbnail.min.js"></script>
    <script type="text/javascript" src="node_modules/lightgallery/modules/lg-fullscreen.min.js"></script>

    <?php
function scd($dir)
{
    $files = scandir($dir);
    sort($files);
    reset($files);
    return $files;
}

/////////////////////////////////////////////////////
// Print out html for images
/////////////////////////////////////////////////////
// $xxx = 1;
print ">>>>>>>>>>";
print $xxx;
print $yyy;
print ">>>>>>>>>>";
// $image_files = scd('./images');
$output = '<div id="animated-thumbnails">';
$index = 0;
print($image_files);
foreach ($image_files as $file) {
    echo "<!--" . strpos($file, '.jpg') !== false . "  " . $file . "-->";
    if (strpos($file, '.jpg') !== false) {
        $output .= '<a href="images/' . $file . '"><img src="image-thumbs/' . $file . '" /></a>';
    }
    $index++;
}
echo $output . '</div>';

/////////////////////////////////////////////////////
// Print out html for movies
/////////////////////////////////////////////////////
$movie_files = scd('./movies');
$output = '<div id="animated-thumbnails">';
$index = 0;
foreach ($image_files as $file) {
    echo "<!--" . strpos($file, '.jpg') !== false . "  " . $file . "-->";
    if (strpos($file, '.jpg') !== false) {
        $output .= '<a href="images/' . $file . '"><img src="image-thumbs/' . $file . '" /></a>';
    }
    $index++;
}
echo $output . '</div>';
?>

    <script type="text/javascript">
    console.log(window)
    $('#animated-thumbnails').lightGallery({
        thumbnail: true
    });
    </script>

</body>

</html>