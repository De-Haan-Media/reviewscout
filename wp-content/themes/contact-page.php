<?php 
/*
* Template Name: Contact Page
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
    
    <?php
      $contact = get_field('contact');
      $departments = $contact['departments'];
    ?>
    <!--offerte aanvragen-->
    <section class="offerte_aanvragen contact-page">
        <div class="container">
            <div class="offerte_aanvragen_text">
                <div class="row">
                    <div class="col-md-12">
                      <h1>
                        <?php the_title();?>
                      </h1>
                      <div>
                        <?php echo do_shortcode($contact['contact_form']); ?>
                      </div>
                      <?php if($departments) { ?>
                        <h4>
                          <span><?php echo $contact['title']; ?></span>
                        </h4>
                        <?php 
                          foreach($departments as $department) {
                        ?>
                          <div class="contact-category">
                            <h5 class="pb-1 contact-category__title">
                              <?= $department['department_name']; ?>
                            </h5>
                            <div class="contact__group">
                              <?php foreach($department['contacts'] as $contact_item) { 
                                $content = $contact_item['content'];
                              ?> 
                                <div class="contact__info">
                                  <div class="contact__details">
                                    <p class="contact__name"><b><?php echo $content['name']; ?></b></p>
                                    <?php if(!empty($content['notes'])) { ?> 
                                      <p><?php echo $content['notes']; ?></p>
                                    <?php } ?>
                                  </div>
                                  <div class="contact__details contact__details--numbers">
                                    <?php if(!empty($content['contact_number'])) { ?> 
                                      <div class="mb-2">
                                        <i class="fa fa-mobile fa-2x mr-2"></i> 
                                        <a href="tel:<?= $content['contact_number']; ?>"><?php echo $content['contact_number']; ?></a>
                                      </div>
                                    <?php } ?>
                                    <?php if(!empty($content['email'])) { ?> 
                                      <div>
                                        <i class="fa fa-envelope-o fa-lg mr-2"></i> 
                                        <a href="mailto:<?= $content['email']; ?>"><?php echo $content['email']; ?></a>
                                      </div>
                                    <?php } ?>
                                  </div>
                                </div>
                              <?php } ?>
                            </div>
                          </div>
                        <?php    
                          }
                        ?>
                      <?php } ?>
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