<?php get_header()?>

<section class="section-content">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                <?php if (have_posts()) :while(have_posts()) : the_post(); ?>
                <article class="article-preview">
                        <h2><?php the_title()?></h2>
                        <p><span class="article-date"><i class="far fa-calendar-alt"></i><?php the_time('d.m.Y')?></span></p>
                        <div class="article-excerpt">
                        <?php if (has_post_thumbnail()):?>
                        <div class="bluerex-thumb"></div>
                            <a href="<?php the_permalink()?>">
                            <?php the_post_thumbnail("thumbnail",array('class'=>'thumb'))?>
                            </a>
                            <?php endif;?>
                            <?php the_content('')?>
                        </div>
                    </article>
                <?php endwhile;?>
             
                <!-- post navigation -->
                <?php else:?>
                <!-- no post found -->
                <?php endif;?>
                    

                </div>
                <?php get_sidebar()?>
            </div>
        </div>
    </section>

<?php get_footer()?>