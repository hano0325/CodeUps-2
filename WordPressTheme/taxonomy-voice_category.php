<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">Voice</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/voice-pc.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/voice-sp.jpg"
                    alt="海面上にダイバーが複数人いる写真">
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('breadcrumb'); ?>
<main>
    <section class="campaign-lower campaign-lower-layout">
        <div class="campaign-lower__inner">
            <div class="campaign-lower__tab tab">
                <!-- タブボタン -->
                <div class="tab__list">
                    <?php
                    $current_term = get_queried_object();
                    $terms = get_terms(array(
                        'taxonomy' => 'voice_category',
                        'hide_empty' => true,
                    ));
                    ?>
                    <!-- "ALL" タブボタン -->
                    <a class="tab__button <?php echo (!is_tax('voice_category')) ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">
                        ALL
                    </a>
                    <?php
                    if (!empty($terms)) :
                        foreach ($terms as $term) :
                            $is_active = ($current_term && $current_term->slug === $term->slug);
                            ?>
                    <a class="tab__button <?php echo $is_active ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                    <?php endforeach;
                    endif; ?>
                </div>
                <div class="tab-voice__contents">
                    <ul class="tab-voice__contents-content">
                        <?php
                        $args = [
                            "post_type" => "voice",
                            "posts_per_page" => 6
                        ];
                        $the_query = new WP_Query($args);
                        ?>
                        <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post(); ?>
                        <?php
                        $gender_age = SCF::get('gender_age'); ?>
                        <?php if (!empty($gender_age)) : ?>
                        <?php foreach ($gender_age as $voice) : ?>
                        <li class="tab-voice__card card-voice">
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
                        <?php endforeach; ?>
                        <?php endif; ?>
                        <?php endwhile; ?>
                        <?php endif; ?>
                    </ul>
                </div>
                <div class="voice-lower__pagenavi pagenavi">
                    <?php wp_pagenavi(); ?>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>