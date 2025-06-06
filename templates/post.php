<?php
/**
 * Template for liveblog post.
 */

do_action( 'elb_before_liveblog_post', $post );
?>

<p class="elb-liveblog-post-time">
    <?php elb_get_entry_display_date(); ?>
</p>

<?php if ( elb_display_author_name() ) : ?>
<div class="autor-wrapper font-14">
    <?php echo "Por"; ?>
    <?php
    $autores = get_the_terms( get_the_ID(), 'autor' );
    if ( $autores && count( $autores ) > 0 ) :
        foreach ( $autores as $autor ) :
            $autor_link = get_term_link( $autor, 'autor' );
            ?>
            <div class="term-wrapper flex">
                <a class="color-off_black autor" href="<?php echo esc_url( $autor_link ); ?>">
                    <?php echo esc_html( $autor->name ); ?>
                </a>
                <!-- <span>,&nbsp;</span> -->
            </div>
        <?php
        endforeach;
    endif;
    ?>
</div>
<?php endif; ?>

<h2 class="titulo font-30 font-space-grotesk"><?php elb_entry_title(); ?></h2>

<div class="elb-liveblog-post-content">
    <?php elb_entry_content(); ?>
</div>

<?php echo elb_get_template_part( 'sharing' ); ?>

<div class="elb-liveblog-actions">
    <?php elb_edit_entry_link(); ?>
</div>

<?php do_action( 'elb_after_liveblog_post', $post ); ?>
