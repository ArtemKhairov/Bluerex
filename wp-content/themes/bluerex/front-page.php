<?php get_header("main") ?>
<?php 
$design_cat=get_category(4);
if($design_cat) :
$posts=get_posts(array(
  'numberposts' => 3,
  'category' => 4,
));

?>
<section class="section-watch" <?php echo bluerex_get_background('section_img', $design_cat)?>>
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h3><?php the_field('section_header', $design_cat)?></h3>
            <h4 class="mb-5"><?php echo $design_cat->description ?></h4>
            <ul class="nav nav-pills mb-5 " id="pills-tab" role="tablist">
              <?php
              $data=[];
              $i=0;
              foreach($posts as $post) :
                setup_postdata($post);
                $data[$i]['post_name']=$post->post_name;
                $data[$i]['url']=get_the_permalink();
                $data[$i]['content']=get_the_content("");
              ?>
              <li class="nav-item ">
                <a
                  class="nav-link  rounded-pill <?php if(!$i) echo 'active'?>"
                  id="<?= $post->post_name ?>-tab"
                  data-toggle="pill"
                  href="#<?= $post->post_name ?>"
                  role="tab"
                  aria-controls="webdesign"
                  aria-selected="true"
                  ><?php the_title()?></a
                >
              </li> 
              <?php $i++ ;endforeach; ?>
            </ul>
            <div class="tab-content" id="pills-tabContent">
              <?php foreach ($data as $k => $item) : ?>
              <div
                class="tab-pane fade show <?php if(!$k) echo 'active'?>"
                id="<?= $item['post_name']?>"
                role="tabpanel"
                aria-labelledby="<?= $item['post_name']?>-tab"
              >
              <?=$item['content'] ?>
                <p>
                  <a class="btn btn-pink" href="<?=$item['url']?>" role="button">Read More</a>
                </p>
              </div>
              <?php endforeach; ?>
            </div>
          </div>
          <div class="col-lg-6 text-center">
            <?php if(get_field('section_add_img',$design_cat)) :?>
          <img src="<?= get_field('section_add_img',$design_cat)?>" alt="Apple Watch" />
              <?php endif;?>
          </div>
        </div>
      </div>
      <?php  wp_reset_postdata(); unset($data,$posts);?>
</section>
<?php endif;  //$design cat?>

<?php 
$posts=get_posts(array(
  'numberposts' => 3,
  'category' => 5,
));
if($posts) :
?>
<section class="section-progress text-center">
      <div class="container">
        <div class="row">
        <?php foreach($posts as $post) : ?>
          <div class="col-md-4 progress-item">
          <?= $post->post_content;?>
            
          </div>
<?php endforeach;?>
        </div>
      </div>
      <?php unset($posts);?>
</section>
<?php endif;  //$progress cat ?>

<?php 
$lets_cat=get_category(6);
if($lets_cat):
?>
<section class="section-lets text-center" <?php echo bluerex_get_background('section_img', $lets_cat)?>>
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h3><?= $lets_cat->name ?></h3>
            <?php if(get_field('section_header', $lets_cat)):?>
            <h4><?= get_field('section_header', $lets_cat)?></h4>
            <?php endif;?>
            <p>
            <?= $lets_cat->description ?>
            </p>
            <p>
              <a class="btn btn-pink" href="<?= get_category_link(6)?>" role="button">Read More</a>
            </p>
          </div>
        </div>
      </div>
</section>
<?php endif;  //$lets cat ?>

<?php 
$graphic_cat=get_category(7);
if(graphic_cat) :
$posts=get_posts(array(
  'numberposts' => 2,
  'category' => 7,
));

?>
<section class="section-design">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <h3><?= $graphic_cat->name ?></h3>
            <h4><?= the_field('section_header', $graphic_cat)?></h4>
            <p>
            <?= $lets_cat->description ?>
            </p>
            <div class="row">
            <?php foreach($posts as $post) : setup_postdata($post) ;?>
              <div class="col-md-6 mb-3">
                <div><?php the_field('icon')?></div>
                <h5><?php the_title() ?></h5>
               <?php the_content('') ?>
                <p>
                  <a class="btn btn-pink" href="<?php the_permalink() ?>" role="button">Read More</a>
                </p>
              </div>
           <?php endforeach; ?>
            </div>
          </div>
          <div class="col-md-6">
          <?php 
          if($video = get_field('section_video', $graphic_cat)) :
            $video=str_replace('watch?v=', 'embed/' , $video);
          ?>
            <div class="embed-responsive embed-responsive-16by9 mt-5">
              <iframe
                id="videoPlayer"
                class="embed-responsive-item"
                width="560"
                height="315"
                src="<?= $video ?>"
                frameborder="0"
                allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen
              >
              </iframe>
              <div id="videoPlayBtn"></div>
            </div>
          <?php endif; ?>
          </div>
        </div>
      </div>
      <?php  wp_reset_postdata(); unset($posts);?>
</section>
<?php endif; //$graphic cat ?>

<?php 
$work_cat=get_category(8);
if(work_cat) :
$posts=get_posts(array(
  'numberposts' => 3,
  'category' => 8,
));
?>
<section class="section-work">
      <div class="container">
        <div class="row">
          <div class="col-md-8 offset-md-2 text-center">
            <h3><?= $work_cat->name ?></h3>
            <?= $work_cat->description ?>
            <ul class="nav nav-pills mb-5 justify-content-center " id="pills-tab2" role="tablist">
              <?php
              $data=[];
              $i=0;
              foreach($posts as $post) :
                setup_postdata($post);
                $data[$i]['post_name']=$post->post_name;
                $data[$i]['url']=get_the_permalink();
                $data[$i]['content']=get_the_content("");
              ?>
              <li class="nav-item ">
                <a
                  class="nav-link  rounded-pill <?php if(!$i) echo 'active'?>"
                  id="<?= $post->post_name ?>-tab"
                  data-toggle="pill"
                  href="#<?= $post->post_name ?>"
                  role="tab"
                  aria-controls="webdesign"
                  aria-selected="true"
                  ><?php the_title()?></a
                >
              </li> 
              <?php $i++ ;endforeach; ?>
            </ul>
            <div class="tab-content" id="pills-tabConten2t">
              <?php foreach ($data as $k => $item) : ?>
              <div
                class="tab-pane fade show <?php if(!$k) echo 'active'?>"
                id="<?= $item['post_name']?>"
                role="tabpanel"
                aria-labelledby="<?= $item['post_name']?>-tab"
              >
              <?=$item['content'] ?>
                
              </div>
              <?php endforeach; ?>
            </div>
          </div>
        </div>
      </div>
</section>
<?php endif; //$work car?>

<?php 
$posts=get_posts(array(
  'post_type'=>'reviews',

));
if($posts): ?>
<section class="section-reviews">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <?php for($i=0 ;$i<count($posts);$i++): ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?= $i?>" <?php if(!$i) echo 'class="active"' ?>></li>
         <?php endfor;?>
        </ol>
        <div class="carousel-inner">
          <?php $i=0; foreach($posts as $post): ?>
          <div class="carousel-item <?php if(!$i) echo 'active' ?>">
            <div class="container">
              <div class="row">
                <div class="col-sm-7">
                    <div class="carousel-caption ">
                        <h3><?= $post->post_title ?></h3>
                            <h4><?= the_field('review_header')?></h4>
                        <blockquote class="blockquote">
                            <p class="mb-0"><?=$post->post_content ?></p>
                            <footer class="blockquote-footer"><?= the_field('review_author')?></footer>
                          </blockquote>
                      </div>
                </div>
                <div class="col-sm-5 d-none d-sm-block">
                    <?php if(has_post_thumbnail($post->ID)) :?>
                    <?= get_the_post_thumbnail($post->ID) ?>
              <?php endif;?>
                </div>
              </div>
            </div>
            
          </div>
          <?php $i++; endforeach; ?>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
</section>
<?php endif; //$reviews?>

<?php
$contact=get_page_by_title('Contact') ;
if($contact): 
//  setup_postdata($contact);
//   the_content() ?>
<section class="section-form text-center">
   <div class="container">
      <div class="row">
          <div class="col-md-12">
            <?php echo do_shortcode($contact->post_content); ?>
          </div>
      </div>
    </div>
</section>
<?php endif;?>
<?php get_footer() ?>