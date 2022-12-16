<?php
/**
 * テーマのセットアップ
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support#HTML5
 **/
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // タイトルタグ自動生成
    add_theme_support(
        'html5',
        array( //HTML5でマークアップ
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    )
    );
}

add_action('after_setup_theme', 'my_setup');
// セットアップの書き方の型
// function custom_theme_setup() {
// add_theme_support( $feature, $arguments );
// }
// add_action( 'after_setup_theme', 'custom_theme_setup' );

/*** CSSとJavaScriptの読み込み** @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC*/function my_script_init()
{
    wp_enqueue_style('common-css', get_template_directory_uri() . '/css/common.css', array(), '1.0.0', 'all');
    wp_enqueue_style('top-css', get_template_directory_uri() . '/css/top.css', array(), '1.0.0', 'all');
    if ( is_page('works') ) {
        wp_enqueue_style('works-css', get_template_directory_uri() . '/css/works.css', array(), '1.0.0', 'all');
    }
    if ( is_single() ) {
        wp_enqueue_style('single-css', get_template_directory_uri() . '/css/single.css', array(), '1.0.0', 'all');
    }
    if ( is_home() ) {
        wp_enqueue_style('blog-css', get_template_directory_uri() . '/css/blog.css', array(), '1.0.0', 'all');
    }
    wp_enqueue_script('common-js', get_template_directory_uri() . '/js/common.js', array( 'jquery' ), '1.0.0', true);
    }
    add_action('wp_enqueue_scripts', 'my_script_init');
    
/**
* メニューの登録
*
* 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
*/
function my_menu_init()
{
register_nav_menus(
array(
'global-top' => 'ヘッダー（TOP）',
'global' => 'ヘッダー',
'drawer-top' => 'ドロワー（TOP）',
'drawer' => 'ドロワー',
)
);
}
add_action('init', 'my_menu_init');

// キャッチフレーズをtitleタグ内から除去
function remove_title_tagline($title)
{
    if (isset($title['tagline'])) {
        unset($title['tagline']);
    }
    return $title;
}
add_filter('document_title_parts', 'remove_title_tagline');