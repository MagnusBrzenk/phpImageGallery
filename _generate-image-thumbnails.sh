#!/bin/bash

#######################################################################
### Script to extract first frame from each video as a thumbnail image
#######################################################################

cd images

for file in *.jpg; do
    newfile="../image-thumbs/"${file%.jpg}"-thumb.jpg"
    if [ ! -f $newfile ]; then
        echo "Creating new thumbnail: "$newfile
        convert -define jpeg:size=200x200 $file -thumbnail 50x50^ -gravity center -extent 50x50 $newfile
    else
        echo "File '"$newfile"' already exists "
    fi
done

cd ..
