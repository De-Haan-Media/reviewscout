<?php 
/*
* Template Name: Offerte Aanvragen Page
*/
get_header(); 
?>
<style>
ul.unstyled, ul.unstyled li {
    list-style: disc;
    margin-left: 2em;
}

ul.unstyled li {
    padding-left: 1em !important;
}
</style>
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
					<!-- 
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Over Galvano</a></li>
                        <li class="current_breadcrumb active" aria-current="page">Offerte aanvragen</li>
                    </ol>
                </nav> -->
            </div>
        </div>
    </section>
    <!--breadcrumb area-->
    
    
    <!--offerte aanvragen-->
    <section class="offerte_aanvragen">
        <div class="container">
            <div class="offerte_aanvragen_text">
                <div class="row">
                    <div class="col-md-12">
						<?php the_content();?>
                        <!-- <h2 class="pb-3 mb-5">Wij denken graag met u mee</h2>
                        <img class="mb-5" src="images/form.jpg"/>
                        <button class="btn btn-primary" type="submit">Offerte aanvragen</button> -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--offerte aanvragen-->
    

    <!--bottom color section-->
    <section class="bottom_color"></section>
    <!--bottom color section-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src='<?php echo get_template_directory_uri(); ?>/js/jquery-input-file-text.js'></script>
    <?php 
        if (isset ($_GET['lang'])) {
            if ($_GET['lang'] == 'en') {
                $selectText = 'Select File';
            } else if ($_GET['lang'] == 'de') {
                $selectText = 'Datei Aussuchen';
            }
        } else {
            $selectText = 'Selecteer Bestand';
        }?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#input_1_7').inputFileText( { text: '  <?php echo $selectText; ?>  ' } );
        $('#input_2_7').inputFileText( { text: '  <?php echo $selectText; ?>  ' } );
        $('#input_3_7').inputFileText( { text: '  <?php echo $selectText; ?>  ' } );
    });
    </script>
<?php endwhile; ?>
<?php get_footer(); ?>