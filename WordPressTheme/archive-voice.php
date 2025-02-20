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
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/voice-sp.jpg"
                    alt="海面上にダイバーが複数人いる写真">
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('parts/breadcrumb'); ?>
<main>
    <section class="voice-lower voice-lower-layout">
        <div class="voice-lower__inner">
            <div class="voice-lower__tab tab">
                <div class="tab__list">
                    <?php
                    $is_archive_page = is_post_type_archive('voice');
                    $terms = get_terms(array(
                        'taxonomy' => 'voice_category',
                        'hide_empty' => true,
                    ));
                    ?>
                    <a class="tab__button <?php echo $is_archive_page ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_post_type_archive_link('voice')); ?>">
                        ALL
                    </a>
                    <?php
                    if (!empty($terms)) :
                    foreach ($terms as $term) :
                    $is_active_term = is_tax('voice_category', $term->slug);
                    ?>
                    <a class="tab__button <?php echo $is_active_term ? 'is-active' : ''; ?>"
                        href="<?php echo esc_url(get_term_link($term)); ?>">
                        <?php echo esc_html($term->name); ?>
                    </a>
                    <?php endforeach;
                    endif; ?>
                </div>
                <div class="tab-voice__contents">
                    <ul class="tab-voice__contents-content">
                        <?php if (have_posts()): ?>
                        <?php while (have_posts()): the_post(); ?>
                        <?php
                            $voice_group = get_field('voice_group');
                            $voice_age = $voice_group['voice_age'] ?? '';
                            $voice_gender = $voice_group['voice_gender'] ?? '';
                            $voice_text = get_field('voice_text');
                        ?>
                        <li class="tab-voice__card card-voice">
                            <div class="card-voice__container">
                                <div class="card-voice__container-text">
                                    <div class="card-voice__text-box text-box">
                                        <p class="card-voice__profile">
                                            <?php echo $voice_age; ?>
                                            <?php echo $voice_gender; ?>
                                        </p>
                                        <p class="card-voice__text-box-maintitle text-box-maintitle">
                                            <?php
                                                $terms = get_the_terms(get_the_ID(), 'voice_category');
                                                echo $terms && !is_wp_error($terms) ? esc_html(implode(', ', wp_list_pluck($terms, 'name'))) : 'カテゴリーなし';
                                            ?>
                                        </p>
                                        <p class="card-voice__text-box-subtitle text-box-subtitle">
                                            <?php echo get_the_title(); ?>
                                        </p>
                                    </div>
                                    <div class="card-voice__content colorbox">
                                        <div class="color"></div>
                                        <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full'); ?>
                                        <?php else: ?>
                                        <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/images/common/cats.jpg"
                                            alt="デフォルト画像" />
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <p class="card-voice__block-subtext">
                                    <?php echo $voice_text; ?>
                                </p>
                            </div>
                        </li>
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