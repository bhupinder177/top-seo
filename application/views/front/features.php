
<div class="how-it-work-sec feature-sec">
    <div class="container-fluid">
        <h2 class="text-center">Features</h2>
        <div class="work-circle">
            <ul>

              <?php if(!empty($result))
                   {
                     foreach($result as $res)
                     {
                       $link = str_replace(' ', '-',strtolower($res->title.'-'.$res->id));
                       $link = str_replace('&','',$link);

                 ?>

                 <li>
                   <div class="img-cstm">
                   <img src="<?php echo base_url(); ?>assets/featured/<?php echo $res->image; ?>" alt="featured image" />
                 </div>
                    <h2><?php echo $res->title; ?></h2>
                    <p><?php echo substr($res->description, 0, 100); ?></p>
                     <a class="btn read-btn" href="<?php echo base_url(); ?>feature/<?php echo $link; ?>">Read more</a>

                </li>
              <?php } } ?>
                <!-- <li><img src="<?php echo base_url(); ?>assets/front/images/project-delivery-ic.png" alt="'" />
                    <h2>Project Delivey
                        Managed</h2>
                    <p>Scrum &amp; Project Delivey Managed
                        by Us at no extra cost.</p>
                     <a class="btn read-btn" href="http://docpoke.in/top-seo1/features-detail">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/design-final-ic.png" alt="'" />
                    <h2>Designs
                        Finalised </h2>
                    <p>Design is polished and tweaked with further
                        feedback until completed.</p>
                     <a class="btn read-btn" href="http://docpoke.in/top-seo1/features-detail">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/pay-ic.png" alt="'" />
                    <h2>Pay When
                        Satisfied</h2>
                    <p>Pay Only when task is done as
                        Scrum Managed by Us.

                    </p>
                     <a class="btn read-btn" href="http://docpoke.in/top-seo1/features-detail">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/pay-ic.png" alt="'" />
                    <h2>Pay When
                        Satisfied</h2>
                    <p>Pay Only when task is done as
                        Scrum Managed by Us.

                    </p>
                     <a class="btn read-btn" href="#">Read more</a>
                </li>

                 <li><img src="<?php echo base_url(); ?>assets/front/images/assign-project-ic.png" alt="'" />
                    <h2>Assign Project
                        &amp; Tasks</h2>
                    <p>Assign Project &amp; Tasks for
                        your project.</p>
                      <a class="btn read-btn" href="#">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/project-delivery-ic.png" alt="'" />
                    <h2>Project Delivey
                        Managed</h2>
                    <p>Scrum &amp; Project Delivey Managed
                        by Us at no extra cost.</p>
                     <a class="btn read-btn" href="#">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/design-final-ic.png" alt="'" />
                    <h2>Designs
                        Finalised </h2>
                    <p>Design is polished and tweaked with further
                        feedback until completed.</p>
                     <a class="btn read-btn" href="#">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/pay-ic.png" alt="'" />
                    <h2>Pay When
                        Satisfied</h2>
                    <p>Pay Only when task is done as
                        Scrum Managed by Us.

                    </p>
                     <a class="btn read-btn" href="#">Read more</a>
                </li>
                <li><img src="<?php echo base_url(); ?>assets/front/images/pay-ic.png" alt="'" />
                    <h2>Pay When
                        Satisfied</h2>
                    <p>Pay Only when task is done as
                        Scrum Managed by Us.
  </p>
                     <a class="btn read-btn" href="#">Read more</a>
                </li> -->
            </ul>
        </div>
    </div>
</div>
