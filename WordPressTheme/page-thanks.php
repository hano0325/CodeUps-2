<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">Contact</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/contact-pc.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/contact-sp.jpg"
                    alt="海と砂が広がっている写真" />
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('breadcrumb'); ?>
<main>
    <div class="thanks-page thanks-page-layout">
        <div class="thanks-page__inner inner">
            <div class="thanks-page__text">
                <?php echo the_content(); ?>
            </div>
        </div>
    </div>
    </div>
    <?php get_footer(); ?>