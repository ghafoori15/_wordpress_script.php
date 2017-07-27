# _wordpress_script.php
WordPress Core and Plugin files for AlgaeCal Carousel

This plugin views Images and Videos coming from an Advanced Custom Field 
( Repeater Type ). 

## Images:
An Image gets the following input data from ACF:

* Image (image)
* Image Caption (image_caption)
* Image Thumbnail (image_thumbnail)
* Image Link (link)

**Image Caption:** Image Caption is displayed into the modal header when clicking an image to expand.
**Image Links:** By default, clicking an image will open the modal and view the image bigger, however, if a link is available in the settings ( File Link), the modal will load content of the that file instead of the image. This option is set for Guarantee page.
**Image Thumbnail:** If an image thumbnail is available , the carousel will use it, else the carousel will use the image itself as its thumbnail. 

## Videos:
Videos are embeded from Wistia using the video ID.

A Video get the following input from AFC:
* Wistia Video ID
* Video Caption
* Video Thumbnail

**Wistia Video ID**: A video ID should be set in the settings in order for the video to show up. The plugin will auto load any required files and scripts in order for the video to play. 

**Video Thumbnail:** Wistia gives you the option of creating thumbnails for the your video, however that requires your video URL which is coming from the API. Since I didnt have access to the API and your Wistia account, I configured the plugin to take a thumbnail image in the settings. If a thumbnail is not assigned, the plugin will use a default image as the thumbnail. 



## Plugin Requirements
The Carousel Plugin requires the following in order to properly work:

* Bootstrap v3
* Advanced Custom Field Pro ( Repeater Field)

## Bootstrap
The current live theme that have this plugin installed is using a customized download of Bootstrap of the following components:

* Bootstrap Carousel
* Bootstrap Modal
* Bootstrap Tables
* Bootstrap Grids
* Bootstrap Fonts ( To view Glyphicons )

The fonts ‘Glober’ and ‘Roboto (Fallback)’ has been added to the customized download of Bootstrap for the theme.

## Advanced Custom Fields Pro 
This plugin requires Repeater field type  of the Advanced custom field in order to view create the carousel.

Following Sub Fields of the Repeater type are required:

## Images:
* image
* image_caption
* image_thumbnail 
* link

## Videos:
* wistia_video_id
* video_caption 
* video_thumbnail 

## Shortcode:
Use the following shortcode anywhere in your content to view the carousel:

* [carousel]
