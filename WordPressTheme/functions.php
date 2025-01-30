<?php
// WordPressの基本機能を有効化
if (!defined('ABSPATH')) {
    exit;
}

/**
 * Functions
 */

/**
 * WordPress標準機能
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/add_theme_support
 */
function custom_theme_support() {
	add_theme_support( 'post-thumbnails' ); /* アイキャッチ */
	add_theme_support( 'automatic-feed-links' ); /* RSSフィード */
	add_theme_support( 'title-tag' ); /* タイトルタグ自動生成 */
	add_theme_support(
		'html5',
		array( /* HTML5のタグで出力 */
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		)
	);
}
add_action( 'after_setup_theme', 'custom_theme_support' );



/**
 * CSSとJavaScriptの読み込み
 *
 * @codex https://wpdocs.osdn.jp/%E3%83%8A%E3%83%93%E3%82%B2%E3%83%BC%E3%82%B7%E3%83%A7%E3%83%B3%E3%83%A1%E3%83%8B%E3%83%A5%E3%83%BC
 */
function my_script_init()
{
// css
	wp_enqueue_style('swiper-css', '//cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css', array(), '8.4.7', 'all');
	wp_enqueue_style('style-css', get_template_directory_uri(). '/assets/css/style.css', array(), '1.0.1', 'all');
	wp_enqueue_style('google-font', '//fonts.googleapis.com/css2?family=Montserrat:wght@400;700&family=Noto+Sans+JP:wght@400;700&family=Noto+Serif+JP:wght@300;400;500;700&display=swap');

  // js
	wp_enqueue_script('jquery-cdn', '//code.jquery.com/jquery-3.6.0.js', array (), '1.0.1', true );
	wp_enqueue_script('swiper-js', '//cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js', array( 'jquery' ), '8.4.7', true );
	wp_enqueue_script('inview-js', get_template_directory_uri(). '/assets/js/jquery.inview.min.js', array(), '8.0.0', true );
	wp_enqueue_script('script-js', get_template_directory_uri(). '/assets/js/script.js', array( 'jquery' ), '1.0.1', true );

}
add_action('wp_enqueue_scripts', 'my_script_init');




/**
 * メニューの登録
 *
 * @codex https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */
// function my_menu_init() {
// 	register_nav_menus(
// 		array(
// 			'global'  => 'ヘッダーメニュー',
// 			'utility' => 'ユーティリティメニュー',
// 			'drawer'  => 'ドロワーメニュー',
// 		)
// 	);
// }
// add_action( 'init', 'my_menu_init' );
/**
 * メニューの登録
 *
 * 参考：https://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_nav_menus
 */


/**
 * ウィジェットの登録
 *
 * @codex http://wpdocs.osdn.jp/%E9%96%A2%E6%95%B0%E3%83%AA%E3%83%95%E3%82%A1%E3%83%AC%E3%83%B3%E3%82%B9/register_sidebar
 */
// function my_widget_init() {
// 	register_sidebar(
// 		array(
// 			'name'          => 'サイドバー',
// 			'id'            => 'sidebar',
// 			'before_widget' => '<div id="%1$s" class="p-widget %2$s">',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<div class="p-widget__title">',
// 			'after_title'   => '</div>',
// 		)
// 	);
// }
// add_action( 'widgets_init', 'my_widget_init' );


/**
 * アーカイブタイトル書き換え
 *
 * @param string $title 書き換え前のタイトル.
 * @return string $title 書き換え後のタイトル.
 */

/**
 * @param string $page_title ページのtitle属性値
 * @param string $menu_title 管理画面のメニューに表示するタイトル
 * @param string $capability メニューを操作できる権限（manage_options とか）
 * @param string $menu_slug オプションページのスラッグ。ユニークな値にすること。
 * @param string|null $icon_url メニューに表示するアイコンの URL
 * @param int $position メニューの位置
 */
SCF::add_options_page( 'ページタイトル', 'タブボタン', 'manage_options', 'theme-options' );


/**
 * 抜粋文の文字数の変更
 *
 * @param int $length 変更前の文字数.
 * @return int $length 変更後の文字数.
 */
function my_excerpt_length( $length ) {
	return 80;
}
add_filter( 'excerpt_length', 'my_excerpt_length', 999 );


/**
 * 抜粋文の省略記法の変更
 *
 * @param string $more 変更前の省略記法.
 * @return string $more 変更後の省略記法.
 */
function my_excerpt_more( $more ) {
	return '...';

}
add_filter( 'excerpt_more', 'my_excerpt_more' );


function remove_wysiwyg() {
	remove_post_type_support( 'recruit', 'editor' );
	}
	add_action( 'init', 'remove_wysiwyg' );

	add_action( 'pre_get_posts', 'my_custom_query_vars' );
function my_custom_query_vars( $query ) {
	/* @var $query WP_Query */
	if ( !is_admin() && $query->is_main_query()) {
		if ( is_post_type_archive('campaign') ) {
			$query->set( 'posts_per_page' , -1 );//表示したい数
		}
	}
	return $query;
}

// campaignアーカイブページの投稿数を4件に設定
function set_campaign_posts_per_page($query) {
    // 管理画面ではなく、メインクエリが対象
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿タイプ "campaign" のアーカイブページ
        if ($query->is_post_type_archive('campaign')) {
            $query->set('posts_per_page', 4); // 1ページあたり4件表示
        }
    }
}
// pre_get_posts フックを追加
add_action('pre_get_posts', 'set_campaign_posts_per_page');

// voiceアーカイブページの投稿数を6件に設定
function set_voice_posts_per_page($query) {
    // 管理画面ではなく、メインクエリが対象
    if (!is_admin() && $query->is_main_query()) {
        // カスタム投稿タイプ "voice" のアーカイブページ
        if ($query->is_post_type_archive('voice')) {
            $query->set('posts_per_page', 6); // 1ページあたり6件表示
        }
    }
}
// pre_get_posts フックを追加
add_action('pre_get_posts', 'set_voice_posts_per_page');




function custom_pagination($query) {
    if (!is_admin() && $query->is_main_query() && is_home()) {
        $query->set('posts_per_page', 10); // 1ページあたりの投稿数を設定
    }
}
add_action('pre_get_posts', 'custom_pagination');



// 例）個別ページに付与される「blog」を削除
add_filter( 'body_class', function( $classes ){
  if ( in_array( 'blog', $classes, true ) ) {
    unset( $classes[ array_search( 'single', $classes ) ] );
  }
  return $classes;
} );

/* ---------- 「投稿」の表記変更 ---------- */
function Change_menulabel() {
	global $menu;
	global $submenu;
	$name = 'ブログ';
	$menu[5][0] = $name;
	$submenu['edit.php'][5][0] = $name.'一覧';
	$submenu['edit.php'][10][0] = '新規'.$name.'投稿';
  }
  function Change_objectlabel() {
	global $wp_post_types;
	$name = 'ブログ投稿';
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


//ウィジェット
function theme_slug_widgets_init() {
	register_sidebar( array(
		'name' => 'サイドバー', //ウィジェットの名前を入力
		'id' => 'sidebar', //ウィジェットに付けるid名を入力
	) );
  }
  add_action( 'widgets_init', 'theme_slug_widgets_init' );

  // 閲覧数をセット
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == "") {
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head', 10, 0);

// クローラーカウントしない場合
function is_bot() {
    $ua = $_SERVER['HTTP_USER_AGENT'];
    $bot = array(
        'Googlebot', 'Yahoo! Slurp', 'Mediapartners-Google', 'msnbot', 'bingbot',
        'MJ12bot', 'Ezooms', 'Google Web Preview', 'ia_archiver', 'Sogou web spider',
        'Googlebot-Mobile', 'AhrefsBot', 'YandexBot', 'Purebot', 'Baiduspider',
        'facebookexternalhit', 'Hatena', 'DoCoMo'
    );

    foreach ($bot as $bot) {
        if (stripos($ua, $bot) !== false) {
            return true;
        }
    }
    return false;
}

// 閲覧数を取得
function getPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);

    if ($count == "") { // カウントがなければ0をセット
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 Views";
    }

    return $count . ' Views';
}

// 人気記事を取得する関数
function get_popular_posts($number = 3) {
    $args = array(
        'post_type' => 'post', // 投稿タイプを指定
        'meta_key' => 'post_views_count', // 閲覧数を指定
        'orderby' => 'meta_value_num', // ソートの基準を閲覧数に
        'order' => 'DESC', // 降順（閲覧数が多い順）でソート
        'post_status' => 'publish', // 投稿ステータスは公開済み
        'posts_per_page' => $number, // 投稿表示件数を指定
    );

    $popular_query = new WP_Query($args);
    return $popular_query;
}

// 人気記事のショートコード
function display_popular_posts_shortcode($atts) {
    $atts = shortcode_atts(array('number' => 3), $atts, 'popular_posts');
    $popular_query = get_popular_posts($atts['number']);

    ob_start(); // 出力バッファリングを開始
    if ($popular_query->have_posts()) {
        echo '<ul class="popular-posts">';
        while ($popular_query->have_posts()): $popular_query->the_post();
            ?>
<li>
    <a href="<?php the_permalink(); ?>">
        <?php the_title(); ?> (<?php echo getPostViews(get_the_ID()); ?>)
    </a>
</li>
<?php
        endwhile;
        echo '</ul>';
    } else {
        echo '<p>No popular posts found.</p>';
    }
    wp_reset_postdata();
    return ob_get_clean(); // バッファの内容を返す
}
add_shortcode('popular_posts', 'display_popular_posts_shortcode'); // ショートコードを追加



// Contact Form 7 セレクトボックスの選択肢をカスタム投稿のタイトルから自動生成
function job_selectlist($tag, $unused)
{
    // セレクトボックスの名前が 'campaign-select' かどうか確認
    if ($tag['name'] != 'campaign-select') {
        return $tag;
    }

    // URLパラメータからキャンペーンIDを取得
    $selected_campaign = isset($_GET['campaign_id']) ? intval($_GET['campaign_id']) : null;

    // カスタム投稿タイプ 'campaign' から投稿を取得
    $args = array(
        'numberposts' => -1,
        'post_type'   => 'campaign',
        'orderby'     => 'ID',
        'order'       => 'ASC'
    );

    $job_posts = get_posts($args);

    // セレクトボックスの初期値を設定
    $tag['raw_values'] = [];
    $tag['values'] = [];
    $tag['labels'] = [];

    $tag['raw_values'][] = 'キャンペーン内容を選択';
    $tag['values'][] = '';
    $tag['labels'][] = 'キャンペーン内容を選択';

    // 投稿が存在する場合、セレクトボックスに追加
    foreach ($job_posts as $job_post) {
        $tag['raw_values'][] = $job_post->post_title;
        $tag['values'][] = $job_post->post_title;
        $tag['labels'][] = $job_post->post_title;

        // 選択されたキャンペーンが一致する場合にデフォルト値を設定
        if ($selected_campaign && $job_post->ID === $selected_campaign) {
            $tag['default'][] = $job_post->post_title;
        }
    }

    return $tag;
}
add_filter('wpcf7_form_tag', 'job_selectlist', 10, 2);


// Contact Form 7の自動pタグ無効
add_filter('wpcf7_autop_or_not', 'wpcf7_autop_return_false');
function wpcf7_autop_return_false() {
  return false;
}

/**
 * スラッグの日本語を自動変換
 *
 * @param string $slug 投稿スラッグ.
 * @param int $post_ID 投稿ID.
 * @param string $post_status 投稿のステータス.
 * @param string $post_type 投稿タイプ.
 * @return string 新しいスラッグ
 */
function auto_post_slug( $slug, $post_ID, $post_status, $post_type ) {
    // スラッグがURLエンコードされた日本語の場合
    if ( preg_match( '/(%[0-9a-f]{2})+/', $slug ) ) {
        // 投稿タイトルを取得
        $post_title = get_post_field( 'post_title', $post_ID );

        // 日本語タイトルをローマ字（英語風）に変換
        if ( function_exists( 'transliterator_transliterate' ) ) {
            // ラテン文字に変換
            $slug = transliterator_transliterate( 'Any-Latin; Latin-ASCII; [^A-Za-z0-9_] remove; Lower()', $post_title );
        } else {
            // transliterator_transliterateが使えない場合はsanitize_titleを使用
            $slug = sanitize_title( $post_title );
        }
    }

    // 新しいスラッグを返す
    return $slug;
}

// wp_unique_post_slugフィルターに自動生成関数を追加
add_filter( 'wp_unique_post_slug', 'auto_post_slug', 10, 4 );