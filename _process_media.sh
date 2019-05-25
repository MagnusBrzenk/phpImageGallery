#!/bin/bash

clear
echo """
================
PROCESSING MEDIA
================
"""

# Params
target_image_size_kbs=100

# Import image-resizing function
source _gen_resized_image.sh

# Loop through contents of triage dir
cd galleries
for gallery in *; do

    echo "- - - - - - - - - - - - - - - - - - "
    echo "Processing the '"$gallery"' gallery"
    echo "- - - - - - - - - - - - - - - - - - "

    cd $gallery

    # Confirm gallery has required dirs
    if [[ ! -d image-thumbs || ! -d images || ! -d processed-media || ! -d triage || ! -d videos || ! -d video-thumbs ]]; then
        echo "Error! "$gallery" does not have all required dirs!" 1>&2
        exit 1
    fi

    # Loop thru files in /triage and process based on file type
    cd triage
    for file in *; do

        # Rename file to lowercase
        file_lowercase=$(echo $file | tr [A-Z] [a-z])
        mv $file $file_lowercase

        # If file has already been processed, then dont re-process
        if false && [[ -f ../processed-media/$file_lowercase ]]; then

            echo "File "$file" has already been processed; see: "$gallery/processed-media/$file_lowercase
            sleep 1
        else

            echo "Processing "$file
            sleep 2

            # Copy original; note:
            cp $file_lowercase ../processed-media/

            # Handle new image
            if [[ $file_lowercase =~ .*\.(jpg|jpeg|heic) ]]; then

                echo $file_lowercase" is a permitted image!!!"
                # Call function to generate resized image called `resized-$file_lowercase`
                gen_resized_image $file_lowercase $target_image_size_kbs
                mv resized-$file_lowercase ../images/$file_lowercase
                convert -define jpeg:size=200x200 $file_lowercase[1] -thumbnail 50x50^ -gravity center -extent 50x50 ../image-thumbs/$file_lowercase
                # rm $file_lowercase

            # Handle new movie
            elif [[ $file_lowercase =~ .*\.(mp4|m4v|mov) ]]; then

                echo $file_lowercase" is a permitted movie!!!"
                # Gen new m4v video
                new_video_file=${file_lowercase%.*}.m4v
                ffmpeg -loglevel error -i $file_lowercase -vcodec libx264 -crf 23 ../videos/$new_video_file
                # Gen thumbnail from 1st frame
                video_thumb=$new_video_file".jpg"
                convert -define jpeg:size=200x200 $file_lowercase[1] -thumbnail 50x50^ -gravity center -extent 50x50 ../video-thumbs/$video_thumb
                # rm $file_lowercase

            else
                echo $file" has no place here :("
            fi
        fi
    done
done
