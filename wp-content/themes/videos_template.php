<?php 
/*
* Template Name: Videos Template
*/
get_header();
$content = get_field('content');
$video_group = $content['video_group'];
$text = $content['text'];
?>
<?php while ( have_posts() ) : the_post(); ?>   
 <!--top color section-->
    <section class="top_color"></section>
    <!--top color section-->
    
    <!--breadcrumb area-->
    <section class="breadcrumb pt-2">
        <div class="container">
            <div class="row">
			  <?php
					if ( function_exists('yoast_breadcrumb') ) {
					  yoast_breadcrumb( '<p id="breadcrumbs">','</p>' );
					}
					?>
            </div>
        </div>
    </section>
    <!--breadcrumb area-->
    
    <!--video content-->
    <section class="video_content">
        <div class="container">
            <div class="col-md-12">
                <div class="video_content_text">
                    <div class="video_content_heading">
                      <h1><?php the_title(); ?></h1>
                      <div class="mb-4"><?php the_content(); ?></div>
                    </div>
                    <?php 
                      foreach($video_group as $group_item) { 
                        $group_content = $group_item['content'];
                        $videos = $group_item['videos'];
                        $group_title = $group_content['title'];
                        $group_description = $group_content['group_description'];

                    ?>
                    <div class="mt-4 video__group">
                      <div class="video_content_heading">
                        <h2><?php echo $group_title; ?></h2>
                        <p class="mb-4"><?php echo $group_description; ?></p>
                      </div>
                      <div class="row">
                        <?php 
                          foreach($videos as $video) { 
                          $youtube_id = str_replace("https://youtu.be/", "", $video['youtube_link']); 
                        ?>
                        <div class="col-md-4">
                          <div class="video video--dimmer" data-video-link="<?php echo $youtube_id; ?>">
                            <div class="video__thumbnail">
                              <img src="https://img.youtube.com/vi/<?= $youtube_id; ?>/0.jpg" alt="">
                            </div>
                            <p class="video__title"><?php echo $video["title"]; ?></p>
                          </div>
                        </div>
                        <?php } ?>
                      </div>
                    <?php
                     } 
                    ?>
                    </div>
                </div>
            </div>
        </div>
    <!--video content--> 
    </section>
    
    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->

    <!--video content-->
    <div class="ui page dimmer video--player" data-dimmer="video-dimmer">
        <div class="content content--video">
            <div class="video--bg">
                <iframe width="560" height="315" class="video--youtube"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"></iframe>
            </div>
        </div>
        <a class="dimmer__close">
            <svg width="20" height="20" viewBox="0 0 329.26933 329" width="329pt" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="m194.800781 164.769531 128.210938-128.214843c8.34375-8.339844 8.34375-21.824219 0-30.164063-8.339844-8.339844-21.824219-8.339844-30.164063 0l-128.214844 128.214844-128.210937-128.214844c-8.34375-8.339844-21.824219-8.339844-30.164063 0-8.34375 8.339844-8.34375 21.824219 0 30.164063l128.210938 128.214843-128.210938 128.214844c-8.34375 8.339844-8.34375 21.824219 0 30.164063 4.15625 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921875-2.089844 15.082031-6.25l128.210937-128.214844 128.214844 128.214844c4.160156 4.160156 9.621094 6.25 15.082032 6.25 5.460937 0 10.921874-2.089844 15.082031-6.25 8.34375-8.339844 8.34375-21.824219 0-30.164063zm0 0"/></svg>
        </a>
    </div>
    <!--video player-->
<?php endwhile; ?>
<?php get_footer(); ?>