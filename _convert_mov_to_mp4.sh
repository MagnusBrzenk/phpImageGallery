#!/bin/bash

######################################################################
### Loop through all .MOV files, convert to mp4, and remove original
######################################################################

cd videos

for file in *; do

    if [[ $file =~ .*\.(mov|MOV) ]]; then
        file_lower=$(echo $file | tr "[A-Z]" "[a-z]")
        newfile=${file_lower%.mov}.mp4
        echo $file" -> "$newfile
        ffmpeg -i $file -vcodec copy -acodec copy $newfile
        if [[ -f $file && -f $newfile ]]; then mv $file ../redundant; fi
    fi

done

cd ..
