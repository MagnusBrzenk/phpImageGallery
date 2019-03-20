<html>

<head>
    <style>
        body {
            background-color: #152836;
            color: #eee;
            font-family: "Open Sans", "Helvetica Neue", Helvetica, Arial, sans-serif
        }

        .small {
            font-size: 11px;
            color: #999;
            display: block;
            margin-top: -10px
        }

        .cont {
            text-align: center;
        }

        .page-head {
            padding: 60px 0;
            text-align: center;
        }

        .page-head .lead {
            font-size: 18px;
            font-weight: 400;
            line-height: 1.4;
            margin-bottom: 50px;
            margin-top: 0;
        }

        .btn {
            -moz-user-select: none;
            background-image: none;
            border: 1px solid transparent;
            border-radius: 2px;
            cursor: pointer;
            display: inline-block;
            font-size: 14px;
            font-weight: normal;
            line-height: 1.42857;
            margin-bottom: 0;
            padding: 6px 12px;
            text-align: center;
            vertical-align: middle;
            white-space: nowrap;
            text-decoration: none;
        }

        .btn-lg {
            border-radius: 2px;
            font-size: 18px;
            line-height: 1.33333;
            padding: 10px 16px;
        }

        .btn-primary:hover {
            background-color: #fff;
            color: #152836;
        }

        .btn-primary {
            background-color: #152836;
            border-color: #0e1a24;
            color: #ffffff;
        }

        .btn-primary {
            border-color: #eeeeee;
            color: #eeeeee;
            transition: color 0.1s ease 0s, background-color 0.15s ease 0s;
        }

        .page-head h1 {
            font-size: 42px;
            margin: 0 0 20px;
            color: #FFF;
            position: relative;
            display: inline-block;
        }

        .page-head h1 .version {
            bottom: 0;
            color: #ddd;
            font-size: 11px;
            font-style: italic;
            position: absolute;
            width: 58px;
            right: -58px;
        }

        .demo-gallery>ul {
            margin-bottom: 0;
            padding-left: 15px;
        }

        .demo-gallery>ul>li {
            margin-bottom: 15px;
            /* width: 180px; */
            display: inline-block;
            margin-right: 15px;
            list-style: outside none none;
        }

        .demo-gallery>ul>li a {
            border: 3px solid #FFF;
            border-radius: 3px;
            display: block;
            overflow: hidden;
            position: relative;
            float: left;
        }

        .demo-gallery>ul>li a>img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery>ul>li a:hover>img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery>ul>li a:hover .demo-gallery-poster>img {
            opacity: 1;
        }

        .demo-gallery>ul>li a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery>ul>li a .demo-gallery-poster>img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery>ul>li a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .justified-gallery>a>img {
            -webkit-transition: -webkit-transform 0.15s ease 0s;
            -moz-transition: -moz-transform 0.15s ease 0s;
            -o-transition: -o-transform 0.15s ease 0s;
            transition: transform 0.15s ease 0s;
            -webkit-transform: scale3d(1, 1, 1);
            transform: scale3d(1, 1, 1);
            height: 100%;
            width: 100%;
        }

        .demo-gallery .justified-gallery>a:hover>img {
            -webkit-transform: scale3d(1.1, 1.1, 1.1);
            transform: scale3d(1.1, 1.1, 1.1);
        }

        .demo-gallery .justified-gallery>a:hover .demo-gallery-poster>img {
            opacity: 1;
        }

        .demo-gallery .justified-gallery>a .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.1);
            bottom: 0;
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            -webkit-transition: background-color 0.15s ease 0s;
            -o-transition: background-color 0.15s ease 0s;
            transition: background-color 0.15s ease 0s;
        }

        .demo-gallery .justified-gallery>a .demo-gallery-poster>img {
            left: 50%;
            margin-left: -10px;
            margin-top: -10px;
            opacity: 0;
            position: absolute;
            top: 50%;
            -webkit-transition: opacity 0.3s ease 0s;
            -o-transition: opacity 0.3s ease 0s;
            transition: opacity 0.3s ease 0s;
        }

        .demo-gallery .justified-gallery>a:hover .demo-gallery-poster {
            background-color: rgba(0, 0, 0, 0.5);
        }

        .demo-gallery .video .demo-gallery-poster img {
            height: 48px;
            margin-left: -24px;
            margin-top: -24px;
            opacity: 0.8;
            width: 48px;
        }

        .demo-gallery.dark>ul>li a {
            border: 3px solid #04070a;
        }
    </style>
    <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.11/css/lightgallery.min.css">

    <script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.jsdelivr.net/picturefill/2.3.1/picturefill.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/lightgallery/1.6.12/js/lightgallery-all.min.js"></script>

    <script type="text/javascript" src="https://f.vimeocdn.com/js/froogaloop2.min.js"></script>
</head>

<body>




    <!-- jQuery version must be >= 1.8.0; -->
    <!-- <script type="text/javascript" src="node_modules/jquery/dist/jquery.min.js"></script> -->
    <!-- <script type="text/javascript" src="node_modules/lightgallery/dist/js/lightgallery.min.js"></script> -->

    <!-- A jQuery plugin that adds cross-browser mouse wheel support. (Optional) -->
    <!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-mousewheel/3.1.13/jquery.mousewheel.min.js"></script> -->

    <!-- lightgallery plugins -->
    <!-- <script type="text/javascript" src="node_modules/lightgallery/modules/lg-thumbnail.min.js"></script> -->
    <!-- <script type="text/javascript" src="node_modules/lightgallery/modules/lg-fullscreen.min.js"></script> -->
    <!-- <script type="text/javascript" src="node_modules/lightgallery/modules/lg-video.min.js"></script> -->

    <?php

    function scd($dir)
    {
        $files = scandir($dir);
        sort($files);
        reset($files);
        return $files;
    }

    function generateElementsFromMediaFiles()
    {
        $output = "<h1> IMAGES </h1>";

        //Image Files
        if (!false) {
            $image_files = scd('./images');
            $output .= '<div id="animated-thumbnails">';
            $index = 0;
            foreach ($image_files as $file) {
                if (strpos($file, '.jpg') !== false) {
                    $output .= '<a href="images/' . $file . '"><img src="image-thumbs/' . str_replace('.jpg', '-thumb.jpg', $file) . '" /></a>';
                }
                $index++;
            }
            $output .= '</div>';
        }

        //Video Files Part I
        $output .= "<h1> VIDEOS </h1>";
        $movie_files = scd('./videos');
        $index = 0;
        foreach ($movie_files as $file) {
            if (strpos($file, '.m4v') !== false || strpos($file, '.mp4') !== false) {
                $output .= '
                    <div style="display:none;" id="video-' . $index . '">
                        <video class="lg-video-object lg-html5" controls preload="none">
                            <!--' . ($file) . '-->
                            <source src="videos/' . $file . '">
                            Your browser does not support HTML5 video.
                        </video>
                    </div>';
            }
            $index++;
        }
        //Video Files Part II
        $output .= '<div class="demo-gallery"><ul id="html5-videos">';
        $index = 0;
        foreach ($movie_files as $file) {
            if (strpos($file, '.m4v') !== false || strpos($file, '.mp4') !== false) {
                $output .= '
                    <li data-poster="video-thumbs/' . $file . '.jpg" data-sub-html="video caption' . $index . '" data-html="#video-' . $index . '" >
                        <img src="video-thumbs/' . $file . '.jpg" />
                    </li>
                ';
            }
            $index++;
        }
        $output .= '</ul></div>';
        echo $output;
    }

    generateElementsFromMediaFiles();
    ?>

    <script type="text/javascript">
        console.log(window)
        $('#animated-thumbnails').lightGallery({
            thumbnail: true
        });
        $('#html5-videos').lightGallery();
    </script>

</body>

</html> 