<!-- Modal -->
 <?php $page_link = get_sub_field('link'); ?>
  <div class="modal fade" id="ViewContent<?php echo $i;?>" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <?php if(!$page_link){?> 
          	<h4 class="modal-title"><?php the_sub_field('image_caption');?></h4>
            <?php }?>
          
        </div>
        <div class="modal-body">
        
         <?php
		 if($page_link){?>
         	<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
			<script>
			$(document).ready(function(){
				$("#ExterContent").load("<?php bloginfo('template_url');?>" + "/" + "<?php the_sub_field('link');?>");
			});
			</script>
            <div id="ExterContent"></div>
         <?php   
		 }
		
         else{
         ?>
          <img src="<?php the_sub_field('image');?>" class="img-responsive "alt="" />
          <?php 
		 }
		 ?>
         
         
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>