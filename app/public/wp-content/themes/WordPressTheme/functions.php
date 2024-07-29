<?php
function my_setup()
{
    add_theme_support('post-thumbnails'); // アイキャッチ画像を有効化
    add_theme_support('automatic-feed-links'); // 投稿とコメントのRSSフィードのリンクを有効化
    add_theme_support('title-tag'); // titleタグ自動生成
    add_theme_support('html5', array( // HTML5による出力
        'search-form',
        'comment-form',
        'comment-list',
        'gallery',
        'caption',
    ));
}
add_action('after_setup_theme', 'my_setup');

/* CSSとJavaScriptの読み込み */
function my_script_init()
{ // WordPressに含まれているjquery.jsを読み込まない
    wp_deregister_script('jquery');
    // jQueryの読み込み
    wp_enqueue_script('jquery', '//code.jquery.com/jquery-3.6.1.min.js', "", "1.0.1");
    wp_enqueue_style( 'NotoSansJP', '//fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@100..900&display=swap' );
    wp_enqueue_style( 'Gotu', '//fonts.googleapis.com/css2?family=Gotu&display=swap' );
    wp_enqueue_style( 'Barlow+Semi+Condensed', '//fonts.googleapis.com/css2?family=Barlow+Semi+Condensed:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap' );
    wp_enqueue_style( 'Lato', '//fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&display=swap' );
    wp_enqueue_style( 'NotoSerifJP', '//fonts.googleapis.com/css2?family=Noto+Serif+JP&display=swap' );
    wp_enqueue_script('swiper', '//cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', "", "1.0.1");
    wp_enqueue_script('inview-js', get_template_directory_uri() . '/assets/js/jquery.inview.min.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('wave-js', get_template_directory_uri() . '/assets/js/wave.js', array('jquery'), '1.0.1', true);
    wp_enqueue_script('main-js', get_template_directory_uri() . '/assets/js/script.js', array('jquery'), '1.0.1', true);
    wp_enqueue_style('swiper-css', '//cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '1.0.1');
    wp_enqueue_style('style-css', get_template_directory_uri() . '/assets/css/style.css', array(), '1.0.1');
}
add_action('wp_enqueue_scripts', 'my_script_init');

// 管理画面の「投稿」の名称変更
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'ブログ';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新規'.$name.'を追加';
}
function Change_objectlabel() {
	global $wp_post_types;
	$name = 'ブログ';
	$labels = &$wp_post_types['post']->labels;
	$labels->name = $name;
	$labels->singular_name = $name;
	$labels->add_new = _x('追加', $name);
	$labels->add_new_item = $name.'の新規追加';
	$labels->edit_item = $name.'の編集';
	$labels->new_item = '新規'.$name;
	$labels->view_item = $name.'を表示';
	$labels->search_items = $name.'を検索';
	$labels->not_found = $name.'が見つかりませんでした';
	$labels->not_found_in_trash = 'ゴミ箱に'.$name.'は見つかりませんでした';
}
add_action( 'init', 'Change_objectlabel' );
add_action( 'admin_menu', 'Change_menulabel' );

// 人気記事のカウント
function set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
// 投稿が表示されるたびに閲覧数をカウントアップ
function track_post_views ($post_id) {
    if ( !is_single() ) return;
    if ( empty ( $post_id) ) {
        global $post;
        $post_id = $post->ID;
    }
    set_post_views($post_id);
}
add_action( 'wp_head', 'track_post_views');
// 閲覧数を取得する関数
function get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count.' Views';
}

// 数字(金額)をカンマ区切りの形式に変換
function formatted_price ($num) {
    // カンマがある場合はそのまま返す
    if (strpos($num, ',')) {
        return $num;
    }
    return number_format($num);
};

// 日付をdate-time属性用に変換
function formatted_date ($date) {
    if (strpos($date, '/')) {
        return str_replace('/', '-', $date);
    }
    return $date;
}

/* the_archive_title 余計な文字を削除 */
add_filter( 'get_the_archive_title', function ($title) {
    if (is_date()) {
        return $title = get_the_time('Y年n月');
    }
    return $title;
});

function custom_posts_per_page_voice($query)
{
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿のスラッグを記述
        if (is_post_type_archive('voice')) {
            // 表示件数を指定
            $query->set('posts_per_page', 6);
        } elseif (is_tax('voice-category')) {
            $query->set('posts_per_page', 6);
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page_voice');

function custom_posts_per_page_campaign($query)
{
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿のスラッグを記述
        if (is_post_type_archive('campaign')) {
            // 表示件数を指定
            $query->set('posts_per_page', 6);
        } elseif (is_tax('campaign-category')) {
            $query->set('posts_per_page', 6);
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page_campaign');

function custom_posts_per_page_news($query)
{
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿のスラッグを記述
        if (is_post_type_archive('news')) {
            // 表示件数を指定
            $query->set('posts_per_page', 6);
        } elseif (is_tax('news-category')) {
            $query->set('posts_per_page', 6);
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page_news');



// ContactForm7 セレクトボックスの選択肢をキャンペーンのタイトルから自動生成
function campaign_selectlist($tag, $unused)
{
    //セレクトボックスの名前が'your-category'かどうか
    if ($tag['name'] != 'your-category') {
        return $tag;
    }

    //get_posts()でセレクトボックスの中身を作成する
    //クエリの作成
    $args = array(
        'numberposts' => -1,
        'post_type' => 'campaign', //カスタム投稿タイプを指定
        //並び順⇒セレクトボックス内の表示順
        'orderby' => 'ID',
        'order' => 'ASC'
    );

    //クエリをget_posts()に入れる
    $campaign_posts = get_posts($args);

    //クエリがなければ戻す
    if (!$campaign_posts) {
        return $tag;
    }

    // 同じ文字列を除外した新しい配列を作成
    $new_campaign_pots = array();
    $tempArray = array(); // 文字列比較用の配列
    foreach ($campaign_posts as $campaign_post) {
        $serializedItem = serialize($campaign_post->post_title);
        if (!in_array($serializedItem, $tempArray)) {
            $tempArray[] = $serializedItem;
            $new_campaign_pots[] = $campaign_post;
        }
    }

    //セレクトボックスにforeachで入れる
    foreach ($new_campaign_pots as $campaign_post) {
        $tag['raw_values'][] = $campaign_post->post_title;
        $tag['values'][] = $campaign_post->post_title;
        $tag['labels'][] = $campaign_post->post_title;
    }

    return $tag;
}

add_filter('wpcf7_form_tag', 'campaign_selectlist', 10, 2);

global $wp_rewrite;
$wp_rewrite->flush_rules();