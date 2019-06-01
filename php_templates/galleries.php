<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <style>
        .grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(20rem, 1fr));
            grid-auto-rows: 1fr;
        }

        .grid::before {
            content: "";
            width: 0;
            padding-bottom: 100%;
            grid-row: 1 / 1;
            grid-column: 1 / 1;
        }

        .grid>*:first-child {
            grid-row: 1 / 1;
            grid-column: 1 / 1;
        }

        .grid>* {
            background: rgba(0, 0, 0, 0.1);
            border: 1px white solid;
        }


        .gallery-wrapper {
            position: relative;
            border: green solid 1px;
            margin: 2%;
            overflow: hidden;
        }

        .gallery {
            /* position: relative;
            border: green solid 1px;
            margin: 2%; */
            position: absolute;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background-size: cover;
            background-position: center;
            transform: scale(1.0);
            transition: all 500ms;
        }

        .gallery-name {
            position: absolute;
            overflow: hidden;
            height: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background-color: rgba(0, 0, 0, 0.7);
            transition: height 500ms;
            color: white;
            text-align: center;
            font-size: 30px;
            font-style: bold;
        }

        .gallery-tint {
            position: absolute;
            top: 0px;
            bottom: 0px;
            left: 0px;
            right: 0px;
            background-color: rgba(255, 255, 255, 0.2);
            opacity: 0;
            transition: opacity 500ms;
        }

        .gallery:hover {
            transform: scale(1.2);
            transition: all 500ms;
        }

        .gallery:hover .gallery-name {
            height: 100px;
            transition: height 500ms;
        }

        .gallery:hover .gallery-tint {
            opacity: 1;
            transition: opacity 500ms;
        }
    </style>

    <style src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.4/css/bootstrap.css"></style>

</head>

<body>

    <?php

    function get_dir_files()
    {
        $files = scandir('.');
        $dir_files = array_filter($files, function ($f) {
            return is_dir($f) && !in_array($f, array('.', '..', 'vendor'));
        });
        sort($dir_files);
        reset($dir_files); # Resets array pointer
        return $dir_files;
    }

    function get_total_images($gallery)
    {
        $images = scandir('./' . $gallery . '/images');
        return count($images);
    }
    function get_total_videos($gallery)
    {
        $videos = scandir('./' . $gallery . '/videos');
        return count($videos);
    }

    function generateHtml()
    {
        $output = '<div class="grid">';
        foreach (get_dir_files() as $file) {
            $output .=
                '
                    <div class="gallery-wrapper">
                        <a href="' . $file . '">
                            <div
                                class="gallery"
                                style="background-image:url(' . $file . '/cover-image/image.jpg);"
                            >
                                <div class="gallery-tint">
                                </div>
                                <div class="gallery-name">
                                ' . str_replace("_", " ", $file) . '<br><span style="font-size: 16px;">
                                ' . get_total_images($file) . ' images
                                ' . get_total_videos($file) . ' videos  </span>
                                </div>
                            </div>
                        </a>
                    </div>
                ';
        }
        echo $output . '</div>';
    }
    generateHtml();
    ?>
</body>

</html>