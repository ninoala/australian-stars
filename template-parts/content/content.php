<article id="post-<?php the_ID(); ?>" <?php post_class( 'entry-card' ); ?>>
    <header>
        <?php the_title( '<h2><a href="' . esc_url( get_permalink() ) . '">', '</a></h2>' ); ?>
    </header>
    <div><?php the_excerpt(); ?></div>
</article>
