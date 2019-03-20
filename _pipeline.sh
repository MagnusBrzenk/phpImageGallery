#!/bin/bash

#######################################################################
### Run through the scripts in sensible order
#######################################################################

./_create_dirs.sh

./_sort_triage.sh

./_convert_heic_to_jpeg.sh

./_convert_mov_to_mp4.sh

./_generate-image-thumbnails.sh

./_generate-video-thumbnails.sh
