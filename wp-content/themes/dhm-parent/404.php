<?php get_template_part( 'template-parts/header' ); ?>
<?php the_breadcrumb(); ?>
<main>
    <div class="container">
        <div class="col-lg-8 offset-lg-2">
            <h1>Pagina niet gevonden</h1>
            <p>De pagina die u zocht kon niet worden gevonden.</p>
            <p>We helpen je graag om te vinden wat je zoekt.
                E-mail <a
                    href="mailto:<?php the_field('email_address', 'option'); ?>"><?php the_field('email_address', 'option'); ?></a>,
                bel <a href="tel:<?php the_field('phonenumber', 'option'); ?>"><?php the_field('phonenumber', 'option'); ?></a>, of kijk op één van de onderstaande pagina's:</p>
            <?php echo do_shortcode( '[display-posts post_type="page" layout="list" wrapper="ul"]' ); ?>
        </div>
    </div>
</main>
<?php get_template_part( 'template-parts/footer' ); ?>