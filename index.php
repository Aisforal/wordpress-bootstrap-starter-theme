
        <?php
            get_header();
        ?>
            <div class="row">
                <div class="col">
                    <?php
                        if ( have_posts() ) : 
                            while ( have_posts() ) : the_post();
                                the_title( '<h2>', '</h2>' );
                                the_content();
                            endwhile;
                        else :
                            _e( 'Sorry, no posts matched your criteria.', 'textdomain' );
                        endif;
                    ?>
                </div>
            </div>
        </div>
        <?php
            get_footer();
        ?>