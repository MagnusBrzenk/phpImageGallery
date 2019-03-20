# iOS-Apache Image & Video Gallery

This code enables you to get your iPhone images and videos into an image gallery hosted on a php-enabled apache file server. The instructions below assume that you are working with an iPhone and Apple OS.

If you are working with a raspberry pi for your remote server, then I recommend you run all of the file-format conversion scripts on your local machine since it's not good for your SD card to do so much heavy writing to disk. This repo has a script that rsyncs the final image and video dirs.

## Image and Video Formatting

### Generating Local JPEGs

The goal is to get your images into JPEG format in dirs `images` and `image-thumbs`. If your images are already in your [Apple Photos App](https://www.apple.com/macos/photos/) on your Apple Computer, then you can select the ones you want to deploy to your apache file server in the Photos App and export them to your local version of this code repo in the dir `images`.

If you transfer the photos directly from your iPhone to your Apple Computer using e.g. Air Drop, then those photos will be in the High Efficiency Image Format (HEIF), whose extension is normally `.HEIC` (for some reason). In that case, move the `heic` files to the dir `dot-heic-files` and run the script `_convert_heic_to_jpeg.sh`, so that jpeg copies get created in the images dir.

### Generating Local MP4s

Likewise, with videos, if you export a film directly from Apple Photos to the videos dir, then it will be in the format `mv4` (which is supposed to be the same - for all intents and purposes - as mp4).

If you export directly from the iPhone via e.g. Air Drop, then the file will be in the format `.mov`. In that case, save the file to `dot-mov-files` and run `_convert_mov_to_mp4.sh`.

### Triage Dir

To avoid having to manually sort out different file types, you can dump any file (`jpg, mov, mp4, mv4, heic, etc.`) into the `triage` dir and run `_sort_triage.sh`, which will simply move the file to its respective destination (e.g. `mov -> dot-mov-files`).
