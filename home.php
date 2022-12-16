<?php get_header(); ?>
<?php get_template_part('template-parts/subMv'); ?>
<section class="blogMain c-pd__mid">
    <div class="l-main__inner">
        <ul class="blogMain__cards">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'posts_per_page' => get_option('posts_per_page'),
                'post_type' => 'post',
                'paged' => $paged,
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) :
                $query->the_post();
            ?>

                <li class="blogMain__card">
                    <a href="<?php the_permalink(); ?>" class="blogMain__link">
                        <div class="blogMain__img">
                            <?php the_post_thumbnail('large'); ?>
                            <span class="blogMain__img-title"><?php the_title(); ?></span>
                        </div>
                        <div class="blogMain__card-body">
                            <p class="blogMain__card-title"><?php the_title(); ?></p>
                            <time class="blogMain__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
                            <p class="blogMain__card-text">
                                <?php
                                $post_content = strip_tags(get_the_content()); // 文字列から HTML および PHP タグを取り除く
                                if (mb_strlen($post_content) > 100) { // 本文が100文字多ければ true を返す
                                    $post_content = mb_substr($post_content, 0, 100); // 文字の取り出し
                                    $post_content = str_replace(array("\r", "\n"), '', $post_content) . "..."; // 改行の削除、最後に「...」を追加
                                } else {
                                    $post_content = str_replace(array("\r", "\n"), '', $post_content); // 改行の削除
                                }
                                echo $post_content; // 調整した本文の表示
                                ?>
                            </p>
                        </div>
                    </a>
                </li>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
        <!-- /.blogMain__cards -->
        
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
<!-- /.blogMain -->
<?php get_footer(); ?>