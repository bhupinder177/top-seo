

<div class="blog-section single-blog" >
  <div class="container">


    <div class="blog-details ">
      <div class="row">
        <div class="col-sm-12">
          <div class="blog-img">
            <?php
                $img = FCPATH.'assets/blog/'.$blog->image;
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



          <div class="blog-content">
            <h1><?php echo ucwords($blog->title); ?></h1>
            <p><?php if(!empty($category)){ echo $category->category; } ?></p>
            <p>
              <?php
              if(!empty($tags))
              {
                foreach($tags as $t)
                {
              ?>
            <a class="tags"><?php echo $t->tag; ?></a>
          <?php
                 }
              }
            ?>
            </p>
            <p><i class="fa fa-user" aria-hidden="true"></i> <?php echo $blog->author; ?>  <i class="fa fa-calendar" aria-hidden="true"></i> <?php echo $newDate = date("d-M-Y", strtotime($blog->date)); ?> </p>

            <p><?php echo $blog->description  ?></p>
    </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
