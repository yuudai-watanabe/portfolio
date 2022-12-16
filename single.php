<?php get_header(); ?>
<section class="singleMain c-pd__mid">
    <div class="l-main__inner single__inner">
        <div class="singleMain__container">
            <h1><?php the_title(); ?></h1>
            <time class="singleMain__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
            <?php the_content(); ?>
        </div>
        <!-- /.singleMain__container -->
    </div>
    <!-- /.l-main__inner -->
</section>
<!-- /.singleMain -->

<?php get_footer(); ?>