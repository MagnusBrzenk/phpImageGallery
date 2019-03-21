#!/bin/bash

#################################################################
### Script to go through the dir `triage` and move media files
### to their proper starting point for this repo's pipeline
#################################################################

# Define params
target_image_size_kbs=100

# Make sure triage exists
sh _create_dirs.sh --quiet

# Import image-resizing function
source _resize_image.sh

# Loop through contents of triage dir
cd triage
for file in *; do

    # Rename file to lowercase
    file_lowercase=$(echo $file | tr [A-Z] [a-z])
    mv $file $file_lowercase

    if [[ $file_lowercase =~ .*\.(jpg|jpeg|heic) ]]; then

        echo $file_lowercase" is a permitted image!!!"

        if [[ ! -f ../images/$file_lowercase ]]; then
            resize_image $file_lowercase $target_image_size_kbs
            convert -define jpeg:size=200x200 $file_lowercase[1] -thumbnail 50x50^ -gravity center -extent 50x50 ../image-thumbs/$file_lowercase
            mv $file_lowercase ../images
        fi

    elif
        [[ $file_lowercase =~ .*\.(mp4|m4v|mov) ]]
    then

        echo "Processing: "$file_lowercase

        ### if video doesnt exist, then create it
        new_video_file=${file_lowercase%.*}.m4v
        if [[ ! -f ../videos/$new_video_file ]]; then
            ffmpeg -i $file_lowercase -vcodec libx264 -crf 23 ../videos/$new_video_file
        fi

        ### if video-thumb doesnt exist, then create it
        video_thumb=$new_video_file".jpg"
        if [[ ! -f ../video-thumbs/$video_thumb ]]; then
            convert -define jpeg:size=200x200 $file_lowercase[1] -thumbnail 50x50^ -gravity center -extent 50x50 ../video-thumbs/$video_thumb
        fi

        # rm $file_lowercase
    else

        echo $file" has no place here :("
    fi
done

cd ..
