#!/bin/bash

#Read in and print out all env vars:

declare -a all_env_vars=($(cat .env))
for file in ${all_env_vars[*]}; do
    echo ">>> "${file}
done
eval $(cat .env | sed 's/^/export /')

rsync -avz $PWD"/images/" $REMOTE_USER@$REMOTE_URL:$REMOTE_IMAGES
rsync -avz $PWD"/image-thumbs/" $REMOTE_USER@$REMOTE_URL:$REMOTE_IMAGE_THUMBS
rsync -avz $PWD"/videos/" $REMOTE_USER@$REMOTE_URL:$REMOTE_VIDEOS
rsync -avz $PWD"/video-thumbs/" $REMOTE_USER@$REMOTE_URL:$REMOTE_VIDEO_THUMBS
