

<div class="blog-section" >
    <div class="container">
            <?php
             if(!empty($blogs))
             {
               foreach($blogs as $b)
               {
                 if(isset($b->url))
                 {
                  $link = str_replace(' ', '-',strtolower($b->url.'-'.$b->blogId));
                 }
                 else
                 {
                   $link = str_replace(' ', '-',strtolower($b->title.'-'.$b->blogId));
                 }
             ?>

                <div class="blog-details">
                  <div class="row">
                      <div class="col-sm-4">
        <div class="blog-img">
            <a href="<?php echo base_url().'post/'.$link; ?>">
              <!-- <img width="200" height="200" src="<?php echo base_url(); ?>assets/blog/<?php echo $b->image;?>"></a> -->
              <?php
                  $img = FCPATH.'assets/blog/'.$b->image;
                  if (file_exists($img))
                  { ?>
              <img height="200" width="350" src="<?php echo base_url(); ?>assets/blog/<?php echo $b->image; ?>">
            <?php }
            else
            {
              ?>
              <img height="200" width="350" src="<?php echo base_url(); ?>assets/blog/noimage.jpg">
            <?php } ?>
            </div>
          </div>

            <div class="col-sm-8">
            <div class="blog-content">
                <h1><a href="<?php echo base_url().'post/'.$link; ?>"><?php echo ucwords($b->title); ?></a></h1>
                <p><?php echo $b->category; ?></p>
                <p>
                  <?php
                  if(!empty($b->tags))
                  {
                    foreach($b->tags as $t)
                    {
                  ?>
                <a class="tags"><?php echo $t->tag; ?></a>
              <?php
                     }
                  }
                ?>
                </p>
              <p><?php echo substr($b->description, 0, 270);  ?><a href="<?php echo base_url().'post/'.$link;?>" class="read-more">Read more</a></p>
             <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $b->author; ?>   <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $newDate = date("d-M-Y", strtotime($b->date)); ?> </p>
                 </div>
               </div>
             </div>
                 </div>

             <?php } ?>
             <div class="text-center" id="pagination">
       <?php echo $links; ?>
</div>
    </div>
           <?php
            }
             else
             {
            ?>
            <div>No Blog</div>
            <?php
             }
             ?>


      </div>
   </div>
