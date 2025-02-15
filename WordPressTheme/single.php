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
    <?php get_template_part('parts/breadcrumb'); ?>
    <main>
        <section class="blog-lower blog-lower-layout">
            <div class="blog-lower__inner inner">
                <div class="blog-lower__section">
                    <div class="blog-lower__container">
                        <div class="blog-lower__card-detail card-lower-detail">
                            <div class="card-lower-detail__content">
                                <?php if (have_posts()): ?>
                                <?php while (have_posts()) : the_post(); ?>
                                <div class="card-lower-detail__container">
                                    <time
                                        datetime="<?php echo get_the_date('Y-m-d'); ?>T<?php echo get_the_time('H:i:s'); ?>+09:00"
                                        class=" card__block-date">
                                        <?php echo get_the_date('Y.m/d'); ?>
                                    </time>
                                    <h1 class="card-lower-detail__title"><?php the_title(); ?></h1>
                                    <div class="card-lower-detail__img">
                                        <?php if (has_post_thumbnail()): ?>
                                        <?php the_post_thumbnail('full'); ?>
                                        <?php else: ?>
                                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/common/cats.jpg"
                                            alt="デフォルト画像" />
                                        <?php endif; ?>
                                    </div>
                                    <div class="card-lower-detail__entry">
                                        <?php the_content(); ?>
                                    </div>
                                    <?php endwhile; ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <div class="blog-lower__detail-pagenavi pagenavi">
                            <div class="pagenavi__inner">
                                <div class="wp-pagenavi">
                                    <?php if (get_previous_post()): ?>
                                    <div class="previouspostslink-detail">
                                        <?php previous_post_link('%link', ''); ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if (get_next_post()): ?>
                                    <div class="nextpostslink-detail">
                                        <?php next_post_link('%link', ''); ?>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php get_sidebar(); ?>
                </div>
            </div>
        </section>
        <?php get_footer(); ?>