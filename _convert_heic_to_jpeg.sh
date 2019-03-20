#!/bin/bash

######################################################################
### Loop through all .HEIC files, convert to JPG, and remove original
######################################################################

cd images

for file in *; do

    if [[ $file =~ .*\.(heic|HEIC) ]]; then
        file_lower=$(echo $file | tr "[A-Z]" "[a-z]")
        newfile=${file_lower%.heic}.jpg
        echo $file" -> "$newfile
        magick convert $file $newfile
        if [[ -f $file && -f $newfile ]]; then mv $file ../redundant; fi
    fi

done

cd ..
