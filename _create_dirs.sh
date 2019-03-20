#!/bin/bash

#################################################################
### Script to ensure that the uncommitted media-file dirs exist
### before running the main scripts for this repo
#################################################################

# Print permitted flags
if [[ $1 != "--quiet" ]] && [[ ! -z $1 ]]; then
    echo "Script usage: --quiet"
    exit
fi

# Get array of dirs to-be-created from .gitignore-dirs
declare -a dirsToBeCreated=($(cat .gitignore-dirs))

if [[ $1 != "--quiet" ]]; then
    echo "\n==================="
    echo "Verifying Dirs:\n"
fi

## Loop through array and create dir if it doesnt already exist
for dir in "${dirsToBeCreated[@]}"; do
    if [ -d $dir ]; then
        [[ $1 != "--quiet" ]] && echo "Dir already exists: "$dir
    else
        [[ $1 != "--quiet" ]] && echo "Creating dir: "$dir
        # mkdir $dir
    fi
done

if [[ $1 != "--quiet" ]]; then
    echo "\n==================="
fi
