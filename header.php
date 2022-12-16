<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="<?php bloginfo('description'); ?>" />
    <meta name="keywords" content="" />
    <?php wp_head(); ?>
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-H7WV967HZF"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-H7WV967HZF');
    </script>
</head>

<body>
    <main class="l-main">
        <header class="header">
            <div class="l-main__inner header__inner">
                <nav class="header__gnav">
                    <?php if (is_front_page()) : ?>
                        <?php wp_nav_menu(
                            array(
                                'depth' => 0,
                                'theme_location' => 'global-top', //functions.phpで定義したメニュー名
                                'container' => 'ul', //メニューを囲むタグ
                                'menu_class' => 'header__menu', //ulのクラス名
                            )
                        );
                        ?>
                    <?php else : ?>
                        <?php wp_nav_menu(
                            array(
                                'depth' => 0,
                                'theme_location' => 'global', //functions.phpで定義したメニュー名
                                'container' => 'ul', //メニューを囲むタグ
                                'menu_class' => 'header__menu', //ulのクラス名
                            )
                        );
                        ?>
                    <?php endif; ?>
                    <!-- ハンバーガーメニュー部分 -->
                    <div class="c-drawer">
                        <!-- ハンバーガーメニューの表示・非表示を切り替えるチェックボックス -->
                        <input type="checkbox" id="drawer-check" class="c-drawer__hidden" />
                        <!-- ハンバーガーアイコン -->
                        <label for="drawer-check" id="js-drawer" class="c-drawer__open"><span></span></label>
                        <!-- 追加：メニューを閉じるための要素 -->
                        <label for="drawer-check" id="js-drawer-close" class="c-drawer__close"></label>
                        <!-- メニュー -->
                        <nav id="js-drawer-menu" class="c-drawer__content">
                            <?php if (is_front_page()) : ?>
                                <?php wp_nav_menu(
                                    array(
                                        'depth' => 0,
                                        'theme_location' => 'drawer-top', //functions.phpで定義したメニュー名
                                        'container' => 'ul', //メニューを囲むタグ
                                        'menu_class' => 'c-drawer__lists', //ulのクラス名
                                    )
                                );
                                ?>
                                <!-- /.drawer-list -->
                            <?php else : ?>
                                <?php wp_nav_menu(
                                    array(
                                        'depth' => 0,
                                        'theme_location' => 'drawer', //functions.phpで定義したメニュー名
                                        'container' => 'ul', //メニューを囲むタグ
                                        'menu_class' => 'c-drawer__lists', //ulのクラス名
                                    )
                                );
                                ?>
                            <?php endif; ?>
                        </nav>
                    </div>
                    <!-- ハンバーガーメニューここまで -->
                </nav>
                <!-- /.header__gnav -->
            </div>
            <!-- /.header__inner -->
        </header>
        <!-- /.header -->