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
<?php get_template_part('breadcrumb'); ?>
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
                    <ul class="tab__campaign-contents-content is-active">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <?php
                            $campaign_archives = SCF::get('campaign_archives'); ?>
                        <?php if (!empty($campaign_archives)) : ?>
                        <?php foreach ($campaign_archives as $campaign) : ?>
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
                                            <?php echo esc_html($campaign['main_tab']); ?>
                                        </p>
                                        <p class="tab__campaign-text-box-subtitle">
                                            <?php echo esc_html($campaign['sub_title']); ?>
                                        </p>
                                    </div>
                                    <div class="tab__campaign-money">
                                        <p class="tab__campaign-money-title">
                                            <?php echo esc_html($campaign['money_title']); ?>
                                        </p>
                                        <div class="tab__campaign-fee">
                                            <p class="tab__campaign-discount">
                                                ¥<?php echo esc_html($campaign['discount_price']); ?>
                                            </p>
                                            <p class="tab__campaign-main">
                                                ¥<?php echo esc_html($campaign['main_price']); ?>
                                            </p>
                                        </div>
                                        <p class="tab__campaign-text-main u-desktop">
                                            <?php echo nl2br(esc_html($campaign['main_text'])); ?>
                                        </p>
                                        <div class="tab__campaign-date-container u-desktop">
                                            <p class="tab__campaign-date-time">
                                                <?php echo esc_html($campaign['data_time']); ?>
                                            </p>
                                            <p class="tab__campaign-date-text">
                                                <?php echo esc_html($campaign['data_text']); ?>
                                            </p>
                                            <div class="tab__campaign-form-button">
                                                <a href="<?php echo esc_url(home_url('contact')); ?>" class="button">
                                                    <div class="button__container">
                                                        <p>Contact us</p>
                                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/Vector.png"
                                                            alt="矢印" class="button__arrow" />
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <?php endforeach; ?>
                        <?php endif; ?>
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