<?php get_header(); ?>
<?php get_template_part('template-parts/subMv'); ?>
<section class="workMain c-pd__mid">
    <div class="l-main__inner">
        <p class="workMain__lead">掲載の情報以外にも多数制作しております。<br>詳しくはお問い合わせ下さい。</p>
        <ul class="workMain__cards">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => get_option('posts_per_page'),
                'post_type' => 'works-post',
                'paged' => $paged,
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) :
                $query->the_post();
            ?>

                <li class="workMain__card">
                    <a href="<?php the_field('link'); ?>" target="_blank" class="workMain__link">
                        <div class="workMain__img">
                            <?php the_post_thumbnail('large'); ?>
                            <span class="workMain__img-title"><?php the_title(); ?></span>
                        </div>
                        <div class="workMain__card-body">
                            <p class="workMain__card-title"><?php the_title(); ?></p>
                            <p class="workMain__card-text"><?php the_field('detail'); ?></p>
                            <?php if (get_field('time')) : ?>
                                <p class="workMain__time">稼働時間:約<?php the_field('time'); ?>時間</p>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
        <!-- /.workMain__cards -->

        <div class="c-pagination">
            <?php //ページリスト表示処理
            global $wp_rewrite;
            $paginate_base = get_pagenum_link(1);
            if (strpos($paginate_base, '?') || !$wp_rewrite->using_permalinks()) {
                $paginate_format = '';
                $paginate_base = add_query_arg('paged', '%#%');
            } else {
                $paginate_format = (substr($paginate_base, -1, 1) == '/' ? '' : '/') .
                    user_trailingslashit('page/%#%/', 'paged');
                $paginate_base .= '%_%';
            }
            echo paginate_links(array(
                'base' => $paginate_base,
                'format' => $paginate_format,
                'total' => $query->max_num_pages,
                'mid_size' => 1,
                'current' => ($paged ? $paged : 1),
                'prev_text' => '< 前へ',
                'next_text' => '次へ >',
            ));
            ?>
        </div>
        <!-- /.c-pagination -->
    </div>
    <!-- /.l-main__inner -->
</section>
<!-- /.workMain -->
<?php get_footer(); ?>