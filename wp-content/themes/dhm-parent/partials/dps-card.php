<div class="col-sm-6 col-lg-4">
    <div id="post-<?php the_ID(); ?>" <?php post_class('d-flex flex-column h-100 item'); ?>>
        <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>"><img width="800" height="500" class="img-fluid" src="<?php the_post_thumbnail_url( 'post-grid' ); ?>"
                loading="lazy" alt="<?php the_title(); ?>"></a>
        <div class="content flex-grow-1">
            <a title="<?php the_title(); ?>" class="text-body" href="<?php the_permalink(); ?>">
                <div class="title h3"><?php the_title(); ?></div>
            </a>
            <div class="description"><?php the_excerpt(); ?></div>
            <a title="<?php the_title(); ?>" href="<?php the_permalink(); ?>" class="text-decoration-underline">Lees verder</a>
        </div>
    </div>
</div>