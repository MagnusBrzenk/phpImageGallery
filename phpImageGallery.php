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

    <?php

    function scan_media_files()
    {
        $image_files = scandir('./images');
        $video_files = scandir('./videos');
        $files = array_merge($image_files, $video_files);
        sort($files);
        reset($files); # Resets array pointer
        return $files;
    }

    function generateElementsFromMediaFiles()
    {
        // Initialize
        $media_files = scan_media_files();
        $output = "";

        // First loop just for videos
        $index = 0;
        foreach ($media_files as $file) {
            if (strpos($file, '.m4v') !== false) {
                $output .=
                    '                        
                        <div
                            style="display:none;"
                            id="video' . $index . '"
                        >
                            <video
                                class="lg-video-object lg-html5"
                                controls
                                preload="none"
                            >
                                <source
                                    src="videos/' . $file . '"
                                    type="video/mp4"
                                >
                                Your browser does not support HTML5 video.
                            </video>
                        </div>                        
                    ';
            }
            $index++;
        }

        // Second loop for mixed media
        $output .=
            '
                <div class="cont">
                    <div class="page-head">
                        <h1>jQuery lightgallery</h1>
                        <p class="lead">
                            A lightweight, customizable, modular, responsive, lightbox gallery plugin for jQuery.
                        </p>
                        <a
                            href="https://github.com/sachinchoolur/lightGallery"
                            class="btn btn-primary btn-lg"
                        >
                            View on github
                        </a>
                    </div>
                    <div class="demo-gallery">
                        <ul id="lightgallery">
            ';
        $index = 0;
        reset($media_files);
        foreach ($media_files as $file) {
            if (strpos($file, '.m4v') !== false) {
                $output .=
                    '
                        <li
                            class="video"
                            data-html="#video' . $index . '"
                            data-poster="video-thumbs/' . $file . '.jpg"
                        >
                            <a href>
                                <img
                                    class="img-responsive"
                                    src="video-thumbs/' . $file . '.jpg"
                                >
                                <div class="demo-gallery-poster">
                                    <img src="https://sachinchoolur.github.io/lightGallery/static/img/play-button.png">
                                </div>
                            </a>
                            <h5>HTML5 Video</h5>
                        </li>                    
                    ';
            }
            if (strpos($file, '.jpg') !== false) {
                $output .=
                    '
                        <li
                            data-src="image-thumbs/' . $file . '"
                            data-sub-html="<h4>Cool Pic</h4>"
                            data-pinterest-text="Pin it"
                            data-tweet-text="share on twitter "
                        >
                            <a href>
                                <img
                                    class="img-responsive"
                                    src="image-thumbs/' . $file . '"
                                >
                                <div class="demo-gallery-poster">
                                    <img src="https://sachinchoolur.github.io/lightGallery/static/img/zoom.png">
                                </div>
                            </a>
                            <h5>Responsive image</h5>
                        </li>                
                    ';
            };
            $index++;
        }
        $output .=
            '
                        </ul>
                        <span class="small">
                            Click on any of the images to see lightGallery
                        </span>
                    </div>
                </div>
            ';

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