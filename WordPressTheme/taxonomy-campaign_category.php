<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">Campaign</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign-mv-pc.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/campaign-mv-sp.jpg"
                    alt="海の中に黄色い魚が二匹いる写真">
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('parts/breadcrumb'); ?>
<main>
    <section class="campaign-lower campaign-lower-layout">
        <div class="campaign-lower__inner">
            <div class="campaign-lower__tab tab">
                <div class="tab__list">
                    <?php
                    $terms = get_terms(array(
                        'taxonomy' => 'campaign_category',
                        'hide_empty' => true,
                    ));
                    $current_term = get_queried_object();
                    ?>
                    <a class="tab__button <?php echo (!is_tax('campaign_category')) ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_post_type_archive_link('campaign')); ?>">
                        ALL
                    </a>
                    <?php
                    if (!empty($terms)) :
                        foreach ($terms as $term) : ?>
                    <a class="tab__button <?php echo ($current_term->slug === $term->slug) ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                    <?php endforeach;
                    endif; ?>
                </div>
                <div class="tab__campaign-contents">
                    <ul class="tab__campaign-contents-content">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <?php
                            $money_group = get_field('money_group');
                            $money_price = $money_group['money_price'] ?? '';
                            $discount_price = $money_group['discount_price'] ?? '';
                            $time_group = get_field('time_group');
                            $start_time = $time_group['start_time'] ?? '';
                            $end_time = $time_group['end_time'] ?? '';
                            $campaign_text = get_field('campaign_text');
                        ?>
                        <li class="tab__campaign-card">
                            <div class="tab__campaign-container">
                                <div class="tab__campaign-img">
                                    <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full'); ?>
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/cats.jpg"
                                        alt="デフォルト画像" />
                                    <?php endif; ?>
                                </div>
                                <div class="tab__campaign-container-text">
                                    <div class="tab__campaign-text-box">
                                        <p class="tab__campaign-text-box-maintitle">
                                            <?php
                                                $terms = get_the_terms(get_the_ID(), 'campaign_category');
                                                echo $terms && !is_wp_error($terms) ? esc_html(implode(', ', wp_list_pluck($terms, 'name'))) : 'カテゴリーなし';
                                            ?>
                                        </p>
                                        <p class="tab__campaign-text-box-subtitle">
                                            <?php echo the_title(); ?>
                                        </p>
                                    </div>
                                    <div class="tab__campaign-money">
                                        <p class="tab__campaign-money-title">
                                            全部コミコミ(お一人様)
                                        </p>
                                        <div class="tab__campaign-fee">
                                            <p class="tab__campaign-discount">
                                                ¥<?php echo number_format($money_price); ?>
                                            </p>
                                            <p class="tab__campaign-main">
                                                ¥<?php echo number_format($discount_price); ?>
                                            </p>
                                        </div>
                                        <p class="tab__campaign-text-main u-desktop">
                                            <?php echo $campaign_text; ?>
                                        </p>
                                        <div class="tab__campaign-date-container u-desktop">
                                            <p class="tab__campaign-date-time">
                                                <?php echo $start_time; ?><?php echo $end_time; ?>
                                            </p>
                                            <p class="tab__campaign-date-text">
                                                ご予約・お問い合わせはコチラ
                                            </p>
                                            <div class="tab__campaign-form-button">
                                                <?php
                                                    $campaign_id = get_the_ID();
                                                    $contact_url = add_query_arg('campaign_id', $campaign_id, home_url('contact'));
                                                    ?>
                                                <a href="<?php echo esc_url($contact_url); ?>" class="button">
                                                    <div class="button__container">
                                                        <p>Contact us</p>
                                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/Vector.png"
                                                            alt="矢印" class="button__arrow">
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
            <div class="campaign-lower__pagenavi pagenavi">
                <div class="pagenavi__inner">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>