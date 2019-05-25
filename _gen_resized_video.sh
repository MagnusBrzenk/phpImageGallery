#!/bin/bash

################################################################
### Function to generate a video copy with name "[filename].m4v"
################################################################

function gen_resized_video() {

    ### Vet function's arguments
    if [[ $# -ne 2 ]]; then
        echo "Need two arguments: old file name, new file name"
        return
    fi

    local old_video_file=$1
    local new_video_file=../videos/$2

    echo "Processing "$1" "$2

    ### Perform resizing
    ffmpeg -y -loglevel error -i $old_video_file -vcodec libx264 -crf 23 $new_video_file

    old_file_size_kb=$(du -k "$old_video_file" | cut -f1)
    new_file_size_kb=$(du -k "$new_video_file" | cut -f1)

    python_cmd="print( round(($new_file_size_kb / $old_file_size_kb )*100) )"
    resize_percent=$(python3 -c "${python_cmd}")

    echo "File "$old_video_file" has been resized from "$old_file_size_kb" Kbs to "$new_file_size_kb" ("$resize_percent"% of original)"
}

export -f gen_resized_video
