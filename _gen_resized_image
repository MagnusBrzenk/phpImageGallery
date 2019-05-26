#!/bin/bash

################################################################
### Function to generate an image copy of targeted size on disk
### with name "resized-[filename]"
################################################################

function gen_resized_image() {

    ### Vet function's arguments
    file=$1
    target_size_kb=$2

    if [[ $# -lt 2 ]]; then
        echo "Need two arguments: file, target (kbs)"
        return
    fi

    ### Calc resize percent to reduce file disk size to target kbs
    file_size_kb=$(du -k "$file" | cut -f1)
    python_cmd="print(round(pow(${target_size_kb}/${file_size_kb},0.5)*100))"
    resize_percent=$(python3 -c "${python_cmd}")

    ### Perform resizing
    newfile="resized-"$file
    convert $file -resize $resize_percent% $newfile
    new_file_size_kb=$(du -k "$newfile" | cut -f1)
    echo "File "$file" has been resized from "$file_size_kb" Kbs to "$new_file_size_kb" ("$resize_percent"% of original)"
}

export -f gen_resized_image
