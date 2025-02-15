<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main"><?php the_archive_title(); ?></h1>
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
<?php get_template_part('parts/breadcrumb'); ?>
<main>
    <section class="blog-lower blog-lower-layout">
        <div class="blog-lower__inner">
            <div class="blog-lower__section">
                <div class="blog-lower__container">
                    <ul class="blog-lower__cards cards cards--blog">
                        <?php if (have_posts()) : ?>
                        <?php while (have_posts()) : the_post(); ?>
                        <li class="cards__card card" data-year="<?php echo get_the_date('Y'); ?>"
                            data-month="<?php echo get_the_date('n'); ?>">
                            <a href="<?php the_permalink(); ?>" class="card__container">
                                <div class="card__content">
                                    <?php if (has_post_thumbnail()): ?>
                                    <?php the_post_thumbnail('full'); ?>
                                    <?php else: ?>
                                    <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/ocean.jpg"
                                        alt="デフォルト画像">
                                    <?php endif; ?>
                                </div>
                                <div class="card__block">
                                    <time
                                        datetime="<?php echo get_the_date('Y-m-d'); ?>T<?php echo get_the_time('H:i:s'); ?>+09:00"
                                        class=" card__block-date">
                                        <?php echo get_the_date('Y.m/d'); ?>
                                    </time>
                                    <p class="card__block-title"><?php the_title(); ?></p>
                                    <div class="card__block-subtext">
                                        <?php the_content(); ?>
                                    </div>
                                </div>
                            </a>
                        </li>
                        <?php endwhile; ?>
                    </ul>
                    <?php
                    endif;
                    ?>
                </div>
                <?php get_sidebar(); ?>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>