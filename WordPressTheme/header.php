    <!DOCTYPE html>
    <html <?php language_attributes(); ?>>

    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>" />
        <meta name="viewport" content="width=device-width,initial-scale=1.0" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="google-site-verification" content="zh9Z_2dirLeMbHCXHbXISJ7jZzmpVpwteKe6UC6qtW8" />
        <?php wp_head(); ?>
    </head>

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

    <body <?php body_class(); ?>>
        <?php wp_body_open(); ?>
        <header class="header">
            <div class="header__inner">
                <div class="header__logo">
                    <a href="<?php echo $home;?>">
                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/CodeUps.svg"
                            alt="Codeups" /></a>
                </div>
                <button class="header__hamburger hamburger js-hamburger">
                    <span></span>
                    <span></span>
                    <span></span>
                </button>
                <ul class="header__nav-items">
                    <li class="header__nav-item">
                        <a href="<?php echo $campaign;?>" class="header__nav-link"><span>campaign</span>キャンペーン</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $about;?>" class="header__nav-link"><span>about us</span>私たちについて</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $information;?>"
                            class="header__nav-link"><span>information</span>ダイビング情報</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $blog;?>" class="header__nav-link"><span>blog</span>ブログ</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $voice;?>" class="header__nav-link"><span>voice</span>お客様の声</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $price;?>" class="header__nav-link"><span>price</span>料金一覧</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $faq;?>"
                            class="header__nav-link header__nav-link--large"><span>faq</span>よくある質問</a>
                    </li>
                    <li class="header__nav-item">
                        <a href="<?php echo $contact;?>" class="header__nav-link"><span>contact</span>お問い合わせ</a>
                    </li>
                </ul>
                <nav class="header__drawer drawer js-drawer">
                    <div class="drawer__inner">
                        <div class="drawer__logo">
                            <a href="<?php echo $home;?>">
                                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/CodeUps.svg"
                                    alt="Codeups" /></a>
                        </div>
                        <button class="drawer__hamburger hamburger js-hamburger">
                            <span></span>
                            <span></span>
                            <span></span>
                        </button>
                    </div>
                    <div class="drawer__menu menu">
                        <div class="menu__nav-inner">
                            <div class="menu__nav-items">
                                <div class="menu__nav-container-first">
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
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
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $about; ?>">私たちについて</a>
                                        </li>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
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
                                <div class="menu__nav-container-second">
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $voice; ?>">お客様の声</a>
                                        </li>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
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
                                            $counter = 1;
                                            ?>
                                        <?php if ($footer_query->have_posts()) : ?>
                                        <?php while ($footer_query->have_posts()) : $footer_query->the_post(); ?>
                                        <?php
                                            $section_id = sanitize_title(get_the_title());
                                            ?>
                                        <li class="menu__nav-item-sub">
                                            <a href="<?php echo esc_url($price . '#target' . $counter); ?>">
                                                <?php echo esc_html(get_the_title()); ?>
                                            </a>
                                        </li>
                                        <?php $counter++; ?>
                                        <?php endwhile; ?>
                                        <?php wp_reset_postdata(); ?>
                                        <?php endif; ?>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $faq; ?>">よくある質問</a>
                                        </li>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $privacy; ?>">プライバシー<br class="u-mobile" />ポリシー</a>
                                        </li>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $service; ?>">利用規約</a>
                                        </li>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $site; ?>">サイトマップ</a>
                                        </li>
                                    </ul>
                                    <ul class="menu__nav-item">
                                        <li class="menu__nav-item-main">
                                            <a href="<?php echo $contact; ?>">お問い合わせ</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </nav>
            </div>
        </header>