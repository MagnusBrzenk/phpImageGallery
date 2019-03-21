#!/bin/bash

#Read in and print out all env vars:

declare -a all_env_vars=($(cat .env))
for file in ${all_env_vars[*]}; do
    echo ">>> "${file}
done
eval $(cat .env | sed 's/^/export /')

# rsync -avz $PWD"/images" $REMOTE_USER@$REMOTE_URL:$REMOTE_PHPGALLERY_DIR"/images"
echo $PWD"/images "$REMOTE_USER"@"$REMOTE_URL":"$REMOTE_PHPGALLERY_DIR"/images"
