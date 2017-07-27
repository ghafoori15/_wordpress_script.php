<?php
/*
----- This file contains function responsible to the view the plugin
*/
function display_carousel(){
    $mypost = array( 'post_type' => 'algaecal_carousel', );
    $loop = new WP_Query( $mypost );
    ?>
    <?php while ( $loop->have_posts() ) : $loop->the_post();?>

    <div id="algaecal-carousel" class="carousel slide algaecal-carousel" data-ride="carousel">
    	<?php
		//Check if either image slides or video slides exist
        $active = true; //Set active class to true for first slide
        if( have_rows('image_slides') || have_rows('video_slides') ): $i = 0;
            ?>
            <div class="carousel-inner">
            <?php  
            // loop through the rows of data
            while ( have_rows('image_slides') ) : the_row(); $i++;?>
                <div class="<?php if($active ==true){echo "active"; }?> item">
                    <a role="button" data-toggle="modal" data-target="#ViewContent<?php echo $i;?>" class="hidden-xs"><img src="<?php the_sub_field('image');?>" alt="AlgaeCal Plus" /></a> 
                    <img src="<?php the_sub_field('image');?>" alt="AlgaeCal Plus" class="visible-xs"/>
                </div>
            
				<?php
                $link = get_sub_field('link');
                $active = false; //set active class to false after first loop
                //Include Modal. It will open the image in the modal unless there is a specific page id assinged to it.
            	include('modal.php');
        	endwhile;
			
			//View Videos
			if(have_rows('video_slides') ) :
            	while ( have_rows('video_slides') ) : the_row(); ?>
            		<div class="<?php if($active ==true){echo "active"; }?> item">
                        <span class="wistia_embed wistia_async_<?php the_sub_field('wistia_video_id');?> popover=true popoverAnimateThumbnail=true" style="display:inline-block;height:400px;width:100%;">&nbsp;</span>
                    </div>
                    <?php
                    if($active != false){ 
                        $active = false;
                    } //If the active class is still set to true, return it false. This will be called when there is image slide.
                endwhile;
			endif;
			
            ?>
            </div><!--carousel-inner-->
            <div class="carousel-control-wrapper"> 
             <!-- Indicators -->
            <ol class="carousel-indicators">
         	<?php 
            $index = 0; //counter for "data-slide-to"
			
			// View Image Thumbnails
            while ( have_rows('image_slides') ){
                the_row();
                $thumbnail = get_sub_field('image_thumbnail');
                
                //Check if the image has any thumbnail assign to it, if it does, use it as carousel thumbnail, if it does, use the image itselft as thumbnail.
                if($thumbnail){?>
                     <li data-target="#algaecal-carousel" data-slide-to="<?php echo $index;?>" class="active" id="thumbNav"><img src="<?php the_sub_field('image_thumbnail');?>" alt="AlgaeCal Plus"></li>
                	<?php } else{ ?>
                    <li data-target="#algaecal-carousel" data-slide-to="<?php echo $index;?>" class="active" id="thumbNav"><img src="<?php the_sub_field('image');?>" alt="AlgaeCal Plus"></li>
                	<?php 
                }
                $index++; //increment our counter
            }
			
			// View Video Thumbnails
			if(have_rows('video_slides') ):
				while ( have_rows('video_slides') ) : the_row();
					$thumbnail = get_sub_field('video_thumbnail');
					
					//Check if the image has any thumbnail assign to it, if it does, use it as carousel thumbnail, else use the image itselft as thumbnail.
					if($thumbnail){?>
						 <li data-target="#algaecal-carousel" data-slide-to="<?php echo $index;?>" class="active" id="thumbNav"><img src="<?php the_sub_field('video_thumbnail');?>" alt="AlgaeCal Plus"></li>
					<?php } else{ ?>
						<li data-target="#algaecal-carousel" data-slide-to="<?php echo $index;?>" class="active" id="thumbNav"><img src="<?php echo plugins_url( 'images/play-thumb.jpg', __FILE__ );?>" alt="AlgaeCal Plus"></li>
					<?php 
					} $index; //increment our counter
				endwhile;
			endif;
         ?>
         </ol>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#algaecal-carousel" data-slide="prev" id="arrowL">
            <span class="glyphicon glyphicon-chevron-left"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="right carousel-control" href="#algaecal-carousel" data-slide="next" id="arrowR">
            <span class="glyphicon glyphicon-chevron-right"></span>
            <span class="sr-only">Next</span>
          </a>
      </div>
      <?php endif; ?>
    </div>
<?php endwhile;
}