#!/bin/bash

###########################################################
### Function to reduce image to targeted size on disk
###########################################################

function resize_image() {

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
    echo "Resizing file "$file" from "$file_size_kb" Kbs by "$resize_percent"%"
    convert $file -resize $resize_percent% $file
}

export -f resize_image
