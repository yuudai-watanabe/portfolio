<?php get_header(); ?>
<div class="mv">
    <div class="mv__content">
        <h1 class="mv__heading">
            <span class="mv__name">YUUDAI <br class="sp">WATANABE</span>
            <span class="mv__port">PORTFOLIO</span>
        </h1>
        <p class="mv__text">

        </p>
    </div>
    <!-- /.mv__content -->
    <div class="mv__slider">
        <div class="mv__slide-item" style="z-index: 3;">
            <div class="mv__slide mv__slide--01"></div>
        </div>
        <div class="mv__slide-item">
            <div class="mv__slide mv__slide--02"></div>
        </div>
        <div class="mv__slide-item animation" style="z-index: 4;">
            <div class="mv__slide mv__slide--03"></div>
        </div>
    </div>
    <!-- /.mv__slider -->
</div>
<!-- /.mv -->
<section class="work c-pd__mid">
    <div class="l-main__inner">
        <h2 class="c-heading">
            <span class="c-heading__jp">制作実績</span>
            <span class="c-heading__en">WORKS</span>
        </h2>
        <!-- /.c-heading -->
        <ul class="work__cards">
            <?php
            $args = array(
                'posts_per_page' => 3,
                'post_type' => 'works-post'
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) :
                $query->the_post();
            ?>

                <li class="work__card">
                    <a href="<?php the_field('link'); ?>" target="_blank" class="work__link">
                        <div class="work__img">
                            <?php the_post_thumbnail('large'); ?>
                            <span class="work__img-title"><?php the_title(); ?></span>
                        </div>
                        <div class="work__card-body">
                            <p class="work__card-title"><?php the_title(); ?></p>
                            <p class="work__card-text"><?php the_field('detail'); ?></p>
                            <?php if (get_field('time')) : ?>
                                <p class="work__time">稼働時間:約<?php the_field('time'); ?>時間</p>
                            <?php endif; ?>
                        </div>
                    </a>
                </li>

            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </ul>
        <!-- /.work__cards -->

        <a href="<?php echo esc_url(home_url("/")); ?>works" class="c-btn work__btn">その他実績<span></span></a>
    </div>
    <!-- /.l-main__inner -->
</section>
<!-- /.work -->
<section id="about" class="about c-pd__mid">
    <div class="l-main__inner">
        <h2 class="c-heading about__heading">
            <span class="c-heading__jp">私について</span>
            <span class="c-heading__en">ABOUT</span>
        </h2>
        <!-- /.c-heading -->
        <div class="about__container">
            <div class="about__img">
                <img src="<?php echo get_template_directory_uri(); ?>/image/about-img.jpg" alt="about画像">
            </div>
            <div class="about__textarea">
                <p class="about__text"></p>
                <ul class="about__lists">
                    <li class="about__list">
                        <div class="about__list-title">【名前】</div>
                        <div class="about__list-text">渡邊 雄大（わたなべ ゆうだい）</div>
                    </li>
                    <li class="about__list">
                        <div class="about__list-title">【生年月日】</div>
                        <div class="about__list-text">1989年11月25日生まれ（<?php $birthday = '19891125';
                                                                        $today = date('Ymd');
                                                                        echo floor(($today - $birthday) / 10000) . '歳'; ?>）</div>
                    </li>
                    <li class="about__list">
                        <div class="about__list-title">【出身】</div>
                        <div class="about__list-text">神奈川県横浜市</div>
                    </li>
                    <li class="about__list">
                        <div class="about__list-title">【私ができること】</div>
                        <div class="about__list-text">Webサイトのコーディング、WordPress構築、ECサイト構築（shopify,BASE）</div>
                    </li>
                    <li class="about__list">
                        <div class="about__list-title">【使用言語、アプリ】</div>
                        <div class="about__list-text">HTML/CSS/DartSass/jQuery/JavaScript/PHP/WordPress/liquid/gulp/git/github/Photoshop/figma/Illustrator/Adobe XD/Slack/Chatwork</div>
                    </li>
                    <li class="about__list">
                        <div class="about__list-title">【経歴】</div>
                        <div class="about__list-text">
                            <ul class="about__text-lists">
                                <li class="about__text-list">・高校卒業後、印刷企業に入社。製造課に7年間勤務する。</li>
                                <li class="about__text-list">・印刷企業勤務時に通信制大学に入学。福祉系を専門に学び、2020年に「社会福祉士」の資格を取得。</li>
                                <li class="about__text-list">・印刷企業退職後、障害者就労継続支援B型事業所に転職。支援員として2年間勤務する。</li>
                                <li class="about__text-list">・2020年4月に「デイトラ」にてWeb制作コースを受講。</li>
                                <li class="about__text-list">・2020年9月に障害者就労継続支援B型事業所を退職。フリーランスとして活動を始める。</li>
                                <li class="about__text-list">・現在、日本中を転々としながら、ノマド系フリーランスとして活動中（<?php $year = '20201001';
                                                                                                $today = date('Ymd');
                                                                                                echo floor((($today - $year) / 10000) + 1) . '年目'; ?>）</li>
                            </ul>
                        </div>
                    </li>
                    <li class="about__list">
                        <div class="about__list-title">【趣味】</div>
                        <div class="about__list-text">旅行/スポーツ観戦/ゲーム/アニメ</div>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /.about__container -->
    </div>
    <!-- /.l-main__inner -->
</section>
<!-- /.about -->
<section id="blog" class="blog c-pd__mid">
    <div class="l-main__inner">
        <h2 class="c-heading">
            <span class="c-heading__jp">ブログ</span>
            <span class="c-heading__en">BLOG</span>
        </h2>
        <!-- /.c-heading -->
        <ul class="blog__cards">
            <?php
            $args = array(
                'posts_per_page' => 3,
                'post_type' => 'post'
            );
            $query = new WP_Query($args);
            while ($query->have_posts()) :
                $query->the_post();
            ?>

                <li class="blog__card">
                    <a href="<?php the_permalink(); ?>" class="blog__link">
                        <div class="blog__img">
                            <?php the_post_thumbnail('large'); ?>
                            <span class="blog__img-title"><?php the_title(); ?></span>
                        </div>
                        <div class="blog__card-body">
                            <p class="blog__card-title"><?php the_title(); ?></p>
                            <time class="blog__time" datetime="<?php the_time('c'); ?>"><?php the_time('Y.n.j'); ?></time>
                            <p class="blog__card-text">
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
        <!-- /.blog__cards -->
        <a href="<?php echo esc_url(home_url("/")); ?>blog" class="c-btn blog__btn">一覧<span></span></a>

    </div>
    <!-- /.l-main__inner -->
</section>
<!-- /.blog -->
<?php get_template_part('template-parts/contact'); ?>
<?php get_footer(); ?>