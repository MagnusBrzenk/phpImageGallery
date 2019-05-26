# iOS-Apache Image & Video Gallery

## Overview

This repo is designed for Mac OSX users who have photos/movies in their PHOTOS app that they wish to publish to a viewing gallery on their own server. This repo is especially designed with a raspberry pi running apache in mind (though it could be easily adapted to any remote \*nix server using some other file server).

The basic idea is that you go through the photo/videos in your PHOTOS app on your Mac and export whatever you want to a local 'gallery' directory (see details below for setting that up). These files that you output are typically very large (because modern iPhones are high res), and overkill for sharing media with friends or family. So once you've exported the content you want from PHOTOS app to your gallery, you run a script that goes through your images and videos and reduces them to a uniform size and format. Finally, you run a simple script that uses rsync to move your resized media and some gallery-viewing code over to a desitination you specify on your remote server. They can then be viewed from anywhere with nice slideshows in separate galleries.

See demo: forthcoming

## Usage

### Remote Server

This repo has been tested on raspberry pi with stretch lite (2019). You need a standard install of apache and php. You need to designate a directory to be synced with the `galleries` directory to be created in your copy of this repo on your Mac.

If you want to avoid complications with write permissions, then the easiest way is to symlink such a directory from your standard apache document root to a directory in e.g. your home directory. For example, create a directory `/home/pi/galleries` and then link to it with the command `sudo ln -fs /home/pi/galleries /var/www/html/galleries`.

### On Your Mac

#### Overview

This repo is designed to require very little configuration. The idea is that the heavy computing (viz. resizing images and movies) is done on your (relatively powerful) Mac, and you only transfer reduced-in-size media file over to (and serve from) your server (which, in the case of a raspberry pi, is much less powerful).

#### Requirements

Make sure you have `convert` and `ffmpeg` installed and on your `$PATH`. This is super easy with [homebrew](), just install these binaries using `brew install imagemagick` and `brew install ffmpeg` respectively. This repo's scripts have been successfully tested with `ImageMagick v7.0.8-33` and `ffmpeg v4.1.1`

#### Operating Instructions

1. Clone and enter the repo: `git clone https://github.com/MagnusBrzenk/phpImageGallery.git YYY; cd YYY`
2. `cp .env-template .env` and fill in the environment variables in `.env` with the details for your remote server.
3. Run `./_create_gallery "GALLERY NAME"` to create a new gallery.
   - Note: The first time you run this, it will create a dir called `galleries`, which is basically what will get synced with your remote server as specified by the env variable `REMOTE_GALLERIES_FILE_LOCATION`.
   - Note: You can create multiple galleries that will be accesible by a url of the given name
   - Note: be sure to use "quotation marks" if your gallery name has spaces
4. Start exporting photos/movies from your Mac's PHOTOS app to the directory `galleries/[GALLERY NAME]/media-dump/`.
   - Note: This can be done easily by browsing through your media and then using the short cut "SHIFT+CMD+E" to export it. The first time you do this, you'll have to select the right output directory for the gallery you want to 'dump' to, and then after that you can simply press 'Enter' twice to make the process somewhat fast/easy
   - Note: Make sure when you export your media that you have `Subfolder Format` selected as `None`
5. Whenever you want to process the media files exported to `media-dump`, just run `./_process_media`.
   - Note: this script will iterate through all galleries to look for new media files dumped into their respective `media-dump` directory
   - Note: the files placed in `media-dump` will get moved to `processed-media` in the same gallery.
6. When you're ready to transfer your processed media, run `_rsync_media_files`.
   - Note: this will only
7. When you sync your media, it will, by default, add files `.htaccess` and `.htpasswd`.
   - If you're not suing apache then, of course, these won't do anything.
   - The default location is a `galleries` dir in (or linked to) your standard apache document root folder `/var/www/html/galleries`. If you change your remote directory location in the `.env` file, then you'll have to adjust the `.htaccess` file accordingly.
   - The default username and password are `guest` and `password`.
   - To change these, run the command `htpasswd -n NEW_USERNAME` in your Mac terminal. It will prompt you twice for a password to go along with your chosen `NEW_USERNAME` and output a single line fo the form `NEW_USERNAME:xxx`. Copy and paste this into `.htpasswd` in place of what's there. You can do this multiple times if you want to create multiple user-password combinations.

## Dev Notes

- The interface for this repo is based primarily off of [this codepen](https://codepen.io/sachinchoolur/pen/jGQYXZ)

- Final step for this repo will be to work out a system for updating captions; probably will use a mysql php wrapper.

## Acknowledgements

The interface for these galleries is a php wrapper around [lightGallery](https://github.com/sachinchoolur/lightGallery) code. Thank you to all of its contributors!
