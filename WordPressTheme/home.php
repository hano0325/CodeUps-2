<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">Blog</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/blog-lower-pc.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/blog-lower-sp.jpg"
                    alt="大群の魚が泳いでいる海中の写真。青い水中に無数の魚が一方向に泳いでいる様子が描かれている。">
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('breadcrumb'); ?>
<main>
    <section class="blog-lower blog-lower-layout">
        <div class="blog-lower__inner">
            <div class="blog-lower__section">
                <div class="blog-lower__container">
                    <ul class="blog-lower__cards cards cards--blog">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <?php
                        $cats = get_the_category();
                        if($cats):
                            ?>
                        <?php foreach($cats as $cat): ?>
                        <li class="cards__card card" data-year="<?php echo get_the_date('Y'); ?>"
                            data-month="<?php echo get_the_date('n'); ?>">
                            <a href="<?php echo the_permalink(); ?>" class="card__container">
                                <div class="card__content">
                                    <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full'); ?>
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/ocean.jpg"
                                        alt="デフォルト画像">
                                    <?php endif; ?>
                                </div>
                                <div class="card__block">
                                    <time datetime="<?php echo get_the_date('Y-m-d'); ?>"
                                        class="card__block-date"><?php echo get_the_date('Y.m/d'); ?></time>
                                    <p class="card__block-title"><?php the_title(); ?></p>
                                    <div class="card__block-subtext">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                    <div class="blog-lower__pagenavi pagenavi">
                        <?php wp_pagenavi(); ?>
                    </div>
                </div>
                <aside class="blog-lower-slideber blog-lower-slideber-layout">
                    <div class="blog-lower-slideber__inner">
                        <div class="blog-lower-slideber__title title-side">
                            <div class="title-side__container">
                                <div class="title-side__container-img-ber">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/title-ber.svg"
                                        alt="|">
                                </div>
                                <div class="title-side__container-img-fish">
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/fish-title.svg"
                                        alt="">
                                </div>
                                <h2 class="title-side__main">人気記事</h2>
                            </div>
                        </div>
                        <ul class="blog-lower-slideber__article-cards cards-article">
                            <?php if (!is_user_logged_in() && !is_bot()) {
                                setPostViews(get_the_ID());
                                } ?>
                            <?php
                                $popular_args = array(
                                    'post_type' => 'post',
                                    'meta_key' => 'post_views_count',
                                    'orderby' => 'meta_value_num',
                                    'order' => 'DESC',
                                    'post_status' => 'publish',
                                    'posts_per_page' => 3,
                                );
                                $popular_query = new WP_Query($popular_args);
                                if ($popular_query->have_posts()):
                                ?>
                            <ul class="cards-article">
                                <?php while ($popular_query->have_posts()): $popular_query->the_post(); ?>
                                <li class="cards-article__card card-article">
                                    <a href="<?php echo esc_url(get_permalink()); ?>" class="card-article__container">
                                        <div class="card-article__img">
                                            <?php if (has_post_thumbnail()) : ?>
                                            <img src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'post-thumbnail')); ?>"
                                                alt="<?php the_title_attribute(); ?>">
                                            <?php else: ?>
                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/ocean.jpg"
                                                alt="デフォルト画像">
                                            <?php endif; ?>
                                        </div>
                                        <div class="card-article__text-box">
                                            <time datetime="<?php echo get_the_date('Y-m-d'); ?>"
                                                class="card-article__date">
                                                <?php echo esc_html(get_the_date('Y/m/d')); ?>
                                            </time>
                                            <p class="card-article__title"><?php echo esc_html(get_the_title()); ?>
                                            </p>
                                        </div>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                            </ul>
                            <?php
                                endif;
                                wp_reset_postdata();
                                ?>
                        </ul>
                        <div class="blog-lower-reviews blog-lower-reviews-layout">
                            <div class="blog-lower-reviews__title title-side">
                                <div class="title-side__container">
                                    <div class="title-side__container-img-ber">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/title-ber.svg"
                                            alt="|">
                                    </div>
                                    <div class="title-side__container-img-fish">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/fish-title.svg"
                                            alt="">
                                    </div>
                                    <h2 class="title-side__main">口コミ</h2>
                                </div>
                            </div>
                            <div class="blog-lower-reviews__cards cards-reviews">
                                <?php
                                    $args = array(
                                        'post_type'      => 'voice',
                                        'posts_per_page' => 1,
                                    );
                                    $query = new WP_Query($args);
                                    if ($query->have_posts()): ?>
                                <ul class="cards-reviews">
                                    <?php while ($query->have_posts()): $query->the_post();
                                    $term = get_field('category_voice');
                                    $voice_age = get_field('voice_age');
                                    $voice_gender = get_field('voice_gender');
                                    $voice_text = get_field('voice_text');
                                    ?>
                                    <li class="cards-reviews__card card-reviews">
                                        <a href="#" class="card-reviews__container">
                                            <div class="card-reviews__img">
                                                <?php if (has_post_thumbnail()): ?>
                                                <?php the_post_thumbnail('full'); ?>
                                                <?php else: ?>
                                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/cats.jpg"
                                                    alt="デフォルト画像">
                                                <?php endif; ?>
                                            </div>
                                            <div class="card-reviews__text-box">
                                                <div class="card-reviews__profile">
                                                    <?php echo esc_html($voice_age); ?>
                                                    <?php echo esc_html($voice_gender); ?>
                                                </div>
                                                <p class="card-reviews__text">
                                                    <?php echo get_the_title(); ?>
                                                </p>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php
                                endif;
                                wp_reset_postdata();
                                ?>
                                <div class="blog-lower-reviews__button">
                                    <a href="<?php echo esc_url(home_url('voice')); ?>" class="button">
                                        <div class="button__container">
                                            <p>View more</p>
                                            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/Vector.png"
                                                alt="" class="button__arrow">
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <aside class="blog-lower-campaign blog-lower-campaign-layout">
                            <div class="blog-lower-campaign__title title-side">
                                <div class="title-side__container">
                                    <div class="title-side__container-img-ber">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/title-ber.svg"
                                            alt="|">
                                    </div>
                                    <div class="title-side__container-img-fish">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/fish-title.svg"
                                            alt="">
                                    </div>
                                    <h2 class="title-side__main">キャンペーン</h2>
                                </div>
                            </div>
                            <div class="blog-lower-campaign__contents">
                                <?php
                                $args = array(
                                    'post_type'      => 'campaign',
                                    'posts_per_page' => 2,
                                    'orderby'        => 'date',
                                    'order'          => 'DESC'
                                );
                                $query = new WP_Query($args);
                                if ($query->have_posts()):
                                ?>
                                <ul class="blog-lower-campaign__contents-content">
                                    <?php
                                    while ($query->have_posts()) :
                                        $query->the_post();
                                        $money_price = get_field('money_price');
                                        $discount_price = get_field('discount_price');
                                    ?>
                                    <li class="blog-lower-campaign__content-card">
                                        <a href="<?php echo esc_url(home_url('campaign')); ?>">
                                            <div class="blog-lower-campaign__container">
                                                <div class="blog-lower-campaign__img">
                                                    <?php if (has_post_thumbnail()): ?>
                                                    <?php the_post_thumbnail('full'); ?>
                                                    <?php else: ?>
                                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/cats.jpg"
                                                        alt="デフォルト画像" />
                                                    <?php endif; ?>
                                                </div>
                                                <div class="blog-lower-campaign__container-text">
                                                    <div class="blog-lower-campaign__text-box">
                                                        <p class="blog-lower-campaign__text-box-title">
                                                            <?php the_title(); ?>
                                                        </p>
                                                    </div>
                                                    <div class="blog-lower-campaign__money">
                                                        <p class="blog-lower-campaign__money-title">
                                                            全部コミコミ(お一人様)
                                                        </p>
                                                        <div class="blog-lower-campaign__fee">
                                                            <p class="blog-lower-campaign__discount">
                                                                ¥<?php echo esc_html($money_price); ?>
                                                            </p>
                                                            <p class="blog-lower-campaign__main">
                                                                ¥<?php echo esc_html($discount_price); ?>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </li>
                                    <?php endwhile; ?>
                                </ul>
                                <?php
                                endif;
                                wp_reset_postdata();
                                ?>
                            </div>
                            <div class="blog-lower-reviews__button">
                                <a href="<?php echo esc_url(home_url('campaign')); ?>" class="button">
                                    <div class="button__container">
                                        <p>View more</p>
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png"
                                            alt="" class="button__arrow" />
                                    </div>
                                </a>
                            </div>
                        </aside>
                        <aside class="blog-lower-archive blog-lower-archive-layout">
                            <div class="blog-lower-archive__title title-side">
                                <div class="title-side__container">
                                    <div class="title-side__container-img-ber">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/title-ber.svg"
                                            alt="|">
                                    </div>
                                    <div class="title-side__container-img-fish">
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/fish-title.svg"
                                            alt="">
                                    </div>
                                    <h2 class="title-side__main">アーカイブ</h2>
                                </div>
                            </div>
                            <div class="blog-lower-archive__container archive">
                                <ul class="archive-list">
                                    <?php
                                        global $wpdb;
                                        $archives = $wpdb->get_results("SELECT DISTINCT YEAR(post_date) AS year, MONTH(post_date) AS month FROM $wpdb->posts WHERE post_status = 'publish' AND post_type = 'post' ORDER BY post_date DESC");
                                        $current_year = date('Y');
                                        $years = [];
                                        foreach ($archives as $archive) {
                                            $years[$archive->year][] = $archive->month;
                                        }
                                        foreach ($years as $year => $months) {
                                            $is_active = ($year == $current_year) ? 'is-active' : '';
                                            $aria_expanded = ($year == $current_year) ? 'true' : 'false';
                                            $style = ($year == $current_year) ? '' : 'style="display: none;"';
                                            echo '<li class="archive-list__item">';
                                            echo '<div class="archive-list__year-container">';
                                            echo '<button class="archive-list__year ' . esc_attr($is_active) . '" aria-expanded="' . esc_attr($aria_expanded) . '" data-year="' . esc_attr($year) . '">';
                                            echo '<a href="' . esc_url(get_year_link($year)) . '">' . esc_html($year) . '</a>';
                                            echo '</button>';
                                            echo '</div>';
                                            echo '<ul class="archive-list__months" ' . $style . '>';
                                            foreach ($months as $month) {
                                                $month_name = date_i18n('F', mktime(0, 0, 0, $month, 1));
                                                $month_link = get_month_link($year, $month);
                                                echo '<li class="archive-list__month">';
                                                echo '<a href="' . esc_url($month_link) . '">' . esc_html($month_name) . '</a>';
                                                echo '</li>';
                                            }
                                            echo '</ul>';
                                            echo '</li>';
                                        }
                                        ?>
                                </ul>
                            </div>
                        </aside>
                    </div>
                </aside>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>