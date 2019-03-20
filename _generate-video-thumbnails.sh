#!/bin/bash

#######################################################################
### Script to extract first frame from each video as a thumbnail image
#######################################################################

cd videos

shopt -s nullglob #causes unmatched file extensions to be ignored
for file in *.{mp4,m4v}; do
    shopt -u nullglob #unset needs to be default for autocomplete in shell to work
    newfile="../video-thumbs/"$file".jpg"
    if [ ! -f $newfile ]; then
        # echo "Creating new file: "$newfile
        # convert -resize 20% $filename[1] "../video-thumbs/"$filename".jpg"

        echo "Creating new thumbnail: "$newfile
        convert -define jpeg:size=200x200 $file[1] -thumbnail 50x50^ -gravity center -extent 50x50 $newfile

    else
        echo "File '"$newfile"' already exists "
    fi
done

cd ..
