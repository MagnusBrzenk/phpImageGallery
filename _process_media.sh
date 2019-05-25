#!/bin/bash

clear
echo """
================
PROCESSING MEDIA
================
"""

echo "Do you want to re-process already processed media? (y/N)"
read willReprocess

IS_MEDIA_BEING_REPROCESSED=false
if [[ $willReprocess =~ y|Y|yes|Yes|YES ]]; then
    IS_MEDIA_BEING_REPROCESSED=true
fi

# Params
target_image_size_kbs=100
thumb_size=100

# Import media-resizing functions
source _gen_resized_image.sh
source _gen_resized_video.sh

# Loop through contents of triage dir
cd galleries
for gallery in *; do

    # Enter gallery and begin processing it
    cd $gallery
    echo
    echo "- - - - - - - - - - - - - - - - - - "
    echo "Processing the '"$gallery"' gallery"
    echo "- - - - - - - - - - - - - - - - - - "

    # Confirm gallery has required dirs
    if [[ ! -d image-thumbs || ! -d images || ! -d processed-media || ! -d triage || ! -d videos || ! -d video-thumbs ]]; then
        echo "Error! "$gallery" does not have all required dirs!" 1>&2
        exit 1
    fi

    # Enter /triage and process files based on type
    cd triage
    for file in *; do

        # Rename file to lowercase
        file_lowercase=$(echo $file | tr [A-Z] [a-z])
        mv $file $file_lowercase

        # If file has already been processed, then dont re-process
        if ! $IS_MEDIA_BEING_REPROCESSED && [[ -f ../processed-media/$file_lowercase ]]; then

            echo "File "$file" has already been processed; see: "$gallery/processed-media/$file_lowercase
            sleep .1

        else

            echo "\n>>>> "$file""
            sleep .2

            # Copy original; note:
            cp $file_lowercase ../processed-media/

            # Handle new image
            if [[ $file_lowercase =~ .*\.(jpg|jpeg|heic) ]]; then

                # Call function to generate resized image called `resized-$file_lowercase`
                gen_resized_image $file_lowercase $target_image_size_kbs
                mv resized-$file_lowercase ../images/$file_lowercase
                # convert -define jpeg:size=400x400 $file_lowercase[1] -thumbnail ${thumb_size}x${thumb_size}^ -gravity center -extent ${thumb_size}x${thumb_size} ../image-thumbs/$file_lowercase

                convert -define jpeg:size=400x400 $file_lowercase[1] -thumbnail ${thumb_size}x${thumb_size}^ -gravity center -extent ${thumb_size}x${thumb_size} ../image-thumbs/$file_lowercase

                # rm $file_lowercase

            # Handle new movie
            elif [[ $file_lowercase =~ .*\.(mp4|m4v|mov) ]]; then

                # Gen new m4v video
                # new_video_file=${file_lowercase%.*}.m4v
                # ffmpeg -y -loglevel error -i $file_lowercase -vcodec libx264 -crf 23 ../videos/$new_video_file

                new_video_file=${file_lowercase%.*}.m4v
                gen_resized_video $file_lowercase $new_video_file

                # Gen thumbnail from 1st frame
                video_thumb=$new_video_file".jpg"
                echo "--->"$video_thumb
                convert -define jpeg:size=200x200 $file_lowercase[1] -thumbnail ${thumb_size}x${thumb_size}^ -gravity center -extent ${thumb_size}x${thumb_size} ../video-thumbs/$video_thumb
                # rm $file_lowercase

            else
                echo $file" has no place here :("
            fi
        fi

    done #End of files-in-triage loop

    # Go back to galleries
    cd ../..

done #End of galleries loop
