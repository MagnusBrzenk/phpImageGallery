#!/bin/bash

#################################################################
### Script to go through the dir `triage` and move media files
### to their proper starting point for this repo's pipeline
#################################################################

# Make sure triage exists
sh _create_dirs.sh --quiet

cd triage

for file in *; do
    if [[ $file =~ .*\.(JPEG|JPG|jpg|jpeg|heic|HEIC) ]]; then
        echo $file" is a permitted image!!!"
        newfile=$(echo $file | tr "[A-Z]" "[a-z]")
        echo $newfile
        mv $file ../images/$newfile
    elif [[ $file =~ .*\.(MP4|mp4|M4V|m4v|mov|MOV) ]]; then
        echo $file" is a permitted video!!!"
        newfile=$(echo $file | tr "[A-Z]" "[a-z]")
        echo $newfile
        mv $file ../videos/$newfile
    else
        echo $file" has no place here :("
    fi
done

cd ..
