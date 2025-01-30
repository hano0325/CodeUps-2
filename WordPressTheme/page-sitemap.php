<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">Site MAP</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/site-pc.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/site-sp.jpg"
                    alt=" サンゴ礁の上を多くの小さな魚が泳いでいる海中の風景。青い海と光の差し込む水中の様子が広がっている。" />
            </picture>
        </div>
    </div>
</div>
<?php
    $home = esc_url( home_url( '/' ) );
    $campaign = esc_url( home_url( '/campaign/' ) );
    $about = esc_url( home_url( '/about-us/' ) );
    $information = esc_url( home_url( '/information/' ) );
    $blog = esc_url( home_url( '/blog/' ) );
    $voice = esc_url( home_url( '/voice/' ) );
    $price = esc_url( home_url( '/price/' ) );
    $faq = esc_url( home_url( '/faq/' ) );
    $contact = esc_url( home_url( '/contact/' ) );
    $privacy = esc_url( home_url( '/privacy/' ) );
    $service = esc_url( home_url( '/service/' ) );
    $site = esc_url( home_url( '/site/' ) );
    ?>
<main>
    <div class="site site-layout">
        <div class="site__menu menu">
            <div class="menu__nav-inner">
                <div class="menu__nav-items menu__nav-items--green">
                    <div class="menu__nav-container-first">
                        <div class="menu__nav-content">
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green ">
                                    <a href="<?php echo $campaign; ?>">キャンペーン</a>
                                </li>
                                <?php
                                $terms = get_terms('campaign_category');
                                foreach ($terms as $term):
                                    ?>
                                <li class="menu__nav-item-sub">
                                    <a href="<?php echo esc_url(get_term_link($term)); ?>">
                                        <?php echo esc_html($term->name); ?>
                                    </a>
                                </li>
                                <?php
                                endforeach;
                                ?>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $about; ?>">私たちについて</a>
                                </li>
                            </ul>
                        </div>
                        <div class="menu__nav-content">
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $information; ?>">ダイビング情報</a>
                                </li>
                                <li class="menu__nav-item-sub">
                                    <a href="<?php echo $information; ?>?tab=tab01">ライセンス講習</a>
                                </li>
                                <li class="menu__nav-item-sub">
                                    <a href="<?php echo $information; ?>?tab=tab03">体験ダイビング</a>
                                </li>
                                <li class="menu__nav-item-sub">
                                    <a href="<?php echo $information; ?>?tab=tab02">ファンダイビング</a>
                                </li>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main">
                                    <a href="<?php echo $blog; ?>">ブログ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="menu__nav-container-second">
                        <div class="menu__nav-content">
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $voice; ?>">お客様の声</a>
                                </li>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $price; ?>">料金一覧</a>
                                </li>
                                <?php
                                $args = [
                                    "post_type" => "fee",
                                    "orderby" => "date",
                                    "order" => "ASC",
                                    "posts_per_page" => -1,
                                ];
                                $footer_query = new WP_Query($args);
                                ?>
                                <?php if ($footer_query->have_posts()) : ?>
                                <?php while ($footer_query->have_posts()) : $footer_query->the_post(); ?>
                                <?php
                                $section_id = sanitize_title(get_the_title());
                                ?>
                                <li class="menu__nav-item-sub">
                                    <a href="<?php echo esc_url($price . '#' . $section_id); ?>">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </a>
                                </li>
                                <?php endwhile; ?>
                                <?php wp_reset_postdata(); ?>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="menu__nav-content">
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $faq; ?>">よくある質問</a>
                                </li>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $privacy; ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                                </li>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $service; ?>">利用規約</a>
                                </li>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $site; ?>">サイトマップ</a>
                                </li>
                            </ul>
                            <ul class="menu__nav-item">
                                <li class="menu__nav-item-main menu__nav-item-main--green">
                                    <a href="<?php echo $contact; ?>">お問い合わせ</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <?php get_footer(); ?>