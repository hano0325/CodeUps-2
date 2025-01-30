    <?php
    $home = esc_url( home_url( '/' ) );
    $campaign_url = esc_url( home_url( '/campaign/' ) );
    $about = esc_url( home_url( '/about/' ) );
    $information = esc_url( home_url( '/information/' ) );
    $blog = esc_url( home_url( '/blog/' ) );
    $voice_url = esc_url( home_url( '/voice/' ) );
    $price_url = esc_url( home_url( '/price/' ) );
    $faq = esc_url( home_url( '/faq/' ) );
    $contact = esc_url( home_url( '/contact/' ) );
    ?>
    <?php get_header(); ?>
    <div id="mv" class="mv">
        <div class="mv__inner">
            <div class="mv__slider swiper js-mv-swiper">
                <div class="mv__wrapper swiper-wrapper">
                    <?php
                $mv_slides = SCF::get('mv_slides');
                if (!empty($mv_slides)) :
                    foreach ($mv_slides as $slide) :
                        $image_pc = wp_get_attachment_image_url($slide['image_pc'], 'full');
                        $image_sp = wp_get_attachment_image_url($slide['image_sp'], 'full');
                        $alt_text = esc_attr($slide['alt_text']);
                ?>
                    <div class="mv__slide swiper-slide">
                        <picture>
                            <source srcset="<?php echo esc_url($image_pc); ?>" media="(min-width: 768px)" />
                            <img src="<?php echo esc_url($image_sp); ?>" alt="<?php echo $alt_text; ?>" />
                        </picture>
                    </div>
                    <?php
                    endforeach;
                endif;
                ?>
                </div>
                <div class="mv__title">
                    <h1 class="mv__title-main">diving</h1>
                    <p class="mv__title-sub">into the ocean</p>
                </div>
            </div>
        </div>
    </div>
    <main>
        <section class="campaign campaign-layout">
            <div class="campaign__inner inner">
                <div class="campaign__title title">
                    <p class="title__main">Campaign</p>
                    <h2 class="title__sub">キャンペーン</h2>
                </div>
                <div class="campaign__container">
                    <div class="campaign__swiper swiper js-campaign-swiper">
                        <div class="campaign__wrapper swiper-wrapper">
                            <?php
                            $args = [
                                "post_type" => "campaign",
                                "posts_per_page" => 4,
                                "orderby" => "date",
                                "order" => "DESC"
                            ];
                            $the_query = new WP_Query($args);
                            if ($the_query->have_posts()) :
                            while ($the_query->have_posts()) : $the_query->the_post();
                                $campaign_archives = SCF::get('campaign_archives');
                            if (!empty($campaign_archives)) :
                            foreach ($campaign_archives as $campaign) : ?>
                            <div class="campaign__slide swiper-slide">
                                <img src="<?php echo esc_url(get_the_post_thumbnail_url() ?: get_template_directory_uri() . '/assets/images/common/cats.jpg'); ?>"
                                    alt="<?php the_title(); ?>" />
                                <div class="campaign__container-text text-container">
                                    <div class="campaign__text-box text-box">
                                        <p class="campaign__text-box-maintitle text-box-maintitle">
                                            <?php echo esc_html($campaign['main_tab']); ?>
                                        </p>
                                        <p class="campaign__text-box-subtitle text-box-subtitle">
                                            <?php echo esc_html($campaign['sub_title']); ?>
                                        </p>
                                    </div>
                                    <div class="campaign__money">
                                        <p class="campaign__money-title">
                                            <?php echo esc_html($campaign['money_title']); ?>
                                        </p>
                                        <div class="campaign__fee">
                                            <p class="campaign__discount">
                                                ¥<?php echo esc_html($campaign['discount_price']); ?>
                                            </p>
                                            <p class="campaign__main">
                                                ¥<?php echo esc_html($campaign['main_price']); ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;
                            endif;
                            endwhile;
                            endif;
                            wp_reset_postdata();
                            ?>
                        </div>
                    </div>
                </div>
                <div class="campaign__button">
                    <a href="<?php echo esc_url($campaign_url); ?>" class="button">
                        <div class="button__container">
                            <p>View more</p>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png"
                                alt="矢印" class="button__arrow" />
                        </div>
                    </a>
                </div>
            </div>
            <div class="campaign__button-container">
                <div class="campaign__button-next swiper-button-next"></div>
                <div class="campaign__button-prev swiper-button-prev"></div>
            </div>
        </section>
        <section class="dive dive-layout">
            <div class="dive__inner inner">
                <div class="dive__title title">
                    <p class="title__main">About us</p>
                    <h2 class="title__sub">私たちについて</h2>
                </div>
                <div class="dive__img-container">
                    <div class="dive__img-main">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/ocean2.jpg"
                            alt="海の中に黄色い魚が二匹いる写真" />
                    </div>
                    <div class="dive__img-sub">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/ocean1.jpg"
                            alt="沖縄の屋根" />
                    </div>
                </div>
                <div class="dive__text-container">
                    <div class="dive__text-container-title">
                        Dive into<br />
                        the Ocean
                    </div>
                    <div class="dive__container-sub">
                        <p class="dive__container-subtext">
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。<br>
                            ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入ります。ここにテキストが入り
                        </p>
                        <div class="dive__container-subbutton">
                            <a href="<?php echo $about; ?>" class="button button--transparent">
                                <div class="button__container">
                                    <p>View more</p>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png"
                                        alt="矢印" class="button__arrow" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="license license-layout">
            <div class="license__inner inner">
                <div class="license__title-main title">
                    <p class="title__main">Information</p>
                    <h2 class="title__sub">ダイビング情報</h2>
                </div>
                <div class="license__container">
                    <div class="license__img colorbox">
                        <div class="color"></div>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/license.jpg"
                            alt="海の中に黄色の魚と稚魚がいる写真" />
                    </div>
                    <div class="license__text-container">
                        <p class="license__title-sub">ライセンス講習</p>
                        <p class="license__text text">
                            当店はダイビングライセンス（Cカード）世界最大の教育機関PADIの「正規店」として店舗登録されています。<br />
                            正規登録店として、安心安全に初めての方でも安心安全にライセンス取得をサポート致します。
                        </p>
                        <div class="license__button">
                            <a href="<?php echo $information; ?>" class="button">
                                <div class="button__container">
                                    <p>View more</p>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png"
                                        alt="矢印" class="button__arrow" />
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="blog blog-layout">
            <div class="blog__inner inner">
                <div class="blog__title title">
                    <p class="title__main title__main--white">Blog</p>
                    <h2 class="title__sub title__sub--white">ブログ</h2>
                </div>
                <ul class="blog__cards cards">
                    <?php
                    $args = [
                        "post_type" => "post",
                        "posts_per_page" => 3,
                        "orderby" => "date",
                        "order" => "DESC"
                    ];
                    $blog_query = new WP_Query($args);
                    if ($blog_query->have_posts()) :
                    while ($blog_query->have_posts()) : $blog_query->the_post(); ?>
                    <li class="cards__card card">
                        <a href="<?php the_permalink(); ?>" class="card__container">
                            <div class="card__content">
                                <?php if (has_post_thumbnail()): ?>
                                <?php the_post_thumbnail('full'); ?>
                                <?php else: ?>
                                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/ocean.jpg"
                                    alt="デフォルト画像" />
                                <?php endif; ?>
                            </div>
                            <div class="card__block">
                                <time datetime="<?php echo get_the_date('Y-m-d'); ?>" class="card__block-date">
                                    <?php echo get_the_date('Y.m/d'); ?>
                                </time>
                                <p class="card__block-title">
                                    <?php the_title(); ?>
                                </p>
                                <p class="card__block-subtext">
                                    <?php echo wp_trim_words(get_the_excerpt(), 150, '...'); ?>
                                </p>
                            </div>
                        </a>
                    </li>
                    <?php endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </ul>
                <div class="blog__button">
                    <a href="<?php echo $blog; ?>" class="button">
                        <div class="button__container">
                            <p>View more</p>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png" alt=""
                                class="button__arrow" />
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="voice voice-layout">
            <div class="voice__inner inner">
                <div class="voice__title-main title">
                    <p class="title__main">Voice</p>
                    <h2 class="title__sub">お客様の声</h2>
                </div>
                <ul class="voice__cards cards-voice">
                    <?php
                    $args = [
                    "post_type" => "voice",
                    "posts_per_page" => 2,
                    "orderby" => "date",
                    "order" => "DESC"
                    ];
                    $voice_query = new WP_Query($args);
                    if ($voice_query->have_posts()) :
                    while ($voice_query->have_posts()) : $voice_query->the_post();
                    $gender_age = SCF::get('gender_age');
                    if (!empty($gender_age)) :
                    foreach ($gender_age as $voice) : ?>
                    <li class="cards-voice__card card-voice">
                        <div class="card-voice__container">
                            <div class="card-voice__container-text">
                                <div class="card-voice__text-box text-box">
                                    <p class="card-voice__profile">
                                        <?php echo esc_html($voice['voice_title']); ?>
                                    </p>
                                    <p class="card-voice__text-box-maintitle text-box-maintitle">
                                        <?php echo esc_html($voice['category']); ?>
                                    </p>
                                    <p class="card-voice__text-box-subtitle text-box-subtitle">
                                        <?php echo esc_html($voice['title_text']); ?>
                                    </p>
                                </div>
                                <div class="card-voice__content colorbox">
                                    <div class="color"></div>
                                    <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full'); ?>
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/cats.jpg"
                                        alt="デフォルト画像" />
                                    <?php endif; ?>
                                </div>
                            </div>
                            <p class="card-voice__block-subtext">
                                <?php echo esc_html($voice['description']); ?>
                            </p>
                        </div>
                    </li>
                    <?php endforeach;
                    endif;
                    endwhile;
                    endif;
                    wp_reset_postdata();
                    ?>
                </ul>
                <div class="voice__button">
                    <a href="<?php echo $voice_url; ?>" class="button">
                        <div class="button__container">
                            <p>View more</p>
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png"
                                alt="矢印" class="button__arrow" />
                        </div>
                    </a>
                </div>
            </div>
        </section>
        <section class="price price-layout">
            <div class="price__inner inner">
                <div class="price__title-main title">
                    <p class="title__main">Price</p>
                    <h2 class="title__sub">料金一覧</h2>
                </div>
                <div class="price__container">
                    <div class="price__content colorbox">
                        <div class="color"></div>
                        <picture>
                            <source
                                srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/price-pc.jpg"
                                media="(min-width: 768px)" />
                            <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/price-sp.jpg"
                                alt="海の中に橙色の亀が写真" />
                        </picture>
                    </div>
                    <ul class="price__items">
                        <?php
                        $args = [
                            "post_type" => "fee",
                            "orderby" => "date",
                            "order" => "ASC"
                        ];
                        $price_query = new WP_Query($args);
                        if ($price_query->have_posts()) :
                            while ($price_query->have_posts()) : $price_query->the_post();
                                $price_list = SCF::get('price_list');
                                if (!empty($price_list)) : ?>
                        <li class="price__item">
                            <div class="price__item-container">
                                <p class="price__item-title"><?php the_title(); ?></p>
                                <div class="price__item-container-sub">
                                    <?php foreach ($price_list as $price) : ?>
                                    <div class="price__item-content">
                                        <p class="price__item-event">
                                            <?php echo esc_html($price['course_name']); ?>
                                        </p>
                                        <p class="price__item-price">
                                            ¥<?php echo esc_html($price['course_price']); ?>
                                        </p>
                                    </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </li>
                        <?php endif;
                    endwhile;
                    endif;
                    ?>
                    </ul>
                </div>
            </div>
            <div class="price__button">
                <a href="<?php echo esc_url($price_url); ?>" class="button">
                    <div class="button__container">
                        <p>View more</p>
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png" alt="矢印"
                            class="button__arrow" />
                    </div>
                </a>
            </div>
        </section>
        <?php get_footer(); ?>