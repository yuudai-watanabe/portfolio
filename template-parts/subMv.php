<section class="subMv subMv--<?php
    global $wp_query;
    $post_obj = $wp_query->get_queried_object();
    $slug = $post_obj->post_name;
    echo $slug;
    ?>">
    <h1 class="c-heading subMv__heading">
        <?php if( is_home()): ?>
        <span class="c-heading__jp">ブログ</span>
        <span class="c-heading__en">BLOG</span>
        <?php elseif( is_page('works')): ?>
        <span class="c-heading__jp">制作実績</span>
        <span class="c-heading__en">WORKS</span>
        <?php endif; ?>
    </h1>
    <!-- /.c-heading -->
</section>
<!-- /.subMv -->