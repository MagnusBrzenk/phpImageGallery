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
            padding-left: 5px;
        }

        .demo-gallery>ul>li {
            margin-bottom: 5px;
            /* width & height need to be same dimensions as thumbnails! */
            /* width: 150px;
            height: 150px; */
            height: 10vw;
            width: 10vw;
            display: inline-block;
            margin-right: 5px;
            /* list-style: outside none none; */
        }

        .demo-gallery>ul>li a {
            border: 1px solid #FFF;
            border-radius: 0px;
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
            height: 10vw;
            width: 10vw;
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
        $max_items = 9999999;
        $media_files = scan_media_files();
        $output = "";

        // First loop just for videos
        $index = 0;
        foreach ($media_files as $file) {
            if (strpos($file, '.m4v') !== false && $index <= $max_items) {
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
                        <h1>' . str_replace('_', ' ', basename(getcwd())) . '</h1>
                        <p class="lead">
                            Pics and Videos 
                        </p>
                    </div>
                    <div class="demo-gallery">
                        <ul id="lightgallery">
            ';
        $index = 0;
        reset($media_files);
        foreach ($media_files as $file) {
            if (strpos($file, '.m4v') !== false && $index <= $max_items) {
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
                        </li>
                    ';
            }
            if (strpos($file, '.jpg') !== false && $index <= $max_items) {

                // Build get-caption URL
                $https_prefix = isset($_SERVER['HTTPS']) ? "https://" : "";
                $get_captions_url = isset($_SERVER['HTTP_HOST']) ? $https_prefix . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'] . '../captions/' . $file : null;

                // Get caption from api using php curl protocol
                if (!!$get_captions_url) {
                    $curl = curl_init();
                    curl_setopt_array($curl, [
                        CURLOPT_RETURNTRANSFER => 1,
                        CURLOPT_URL => $get_captions_url,
                        CURLOPT_USERAGENT => 'Gallery Dude'
                    ]);
                    $httpResponse = curl_exec($curl);
                    curl_close($curl);
                }

                // Extract data from $httpResponse
                $data = isset($httpResponse) ? json_decode($httpResponse, true) : null;
                $caption_date = isset($data["caption_date"]) ? $data["caption_date"] . ", "  : "No Date";
                $caption_text = isset($data["caption_text"]) ? $data["caption_text"] : "No Caption";

                // Build image html with caption info
                $captionStyleString = 'background-color: red; color: green;';
                $captionStyleString = 'cursor: pointer;';
                $h4Content = '<h4 id=\'caption_' . $file . '\' style=\'' . $captionStyleString . '\'> <span onClick=\'captionDateClick(event)\' >' . $caption_date . '</span> <span id=\'' . $file . '\'  onClick=\'captionTextClick(event)\' >' . $caption_text .  '</span></h4>';
                $output .=
                    '
                        <li
                            data-src="images/' . $file . '"
                            data-sub-html="' . $h4Content . '"
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
        $(document).ready(function() {
            $('#lightgallery').lightGallery();
        });
    </script>

    <script type="text/javascript">
        async function captionTextClick(e) {

            const h4Element = e.target;
            const newCaptionText = prompt("Enter a new caption", h4Element.innerHTML);

            if (!!newCaptionText && !!h4Element) {

                // Update displayed html
                h4Element.innerHTML = newCaptionText;

                // Update mysql
                // Build api url
                const caption_id = h4Element.id;
                const caption_api_url = location.href.split('galleries')[0] + 'galleries/captions';

                // Example get request
                // const getResp = await fetch(caption_api_url + '/' + caption_id);
                // const data = await getResp.json();
                // console.log(data);

                // Update via caption PUT request
                const putResp = await fetch(caption_api_url, {
                    method: 'POST',
                    mode: 'cors',
                    cache: 'no-cache',
                    credentials: 'same-origin',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    redirect: 'follow',
                    referrer: 'no-referrer',
                    body: JSON.stringify([{
                        'caption_id': caption_id,
                        'caption_text': newCaptionText
                    }])
                });
                const data2 = await putResp.json();
                // console.log("data2", data2);
            }
        }

        function captionDateClick(e) {}
    </script>
</body>

</html>