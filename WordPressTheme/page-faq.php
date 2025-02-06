<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">FAQ</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/mv-4-pc.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/mv-4-sp.jpg"
                    alt="海と砂が広がっている写真" />
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('breadcrumb'); ?>
<main>
    <section class="faq-lower faq-lower-layout">
        <div class="faq-lower__inner">
            <ul class="faq-list">
                <?php
                $faq_items = SCF::get('faq_items'); ?>
                <?php if (!empty($faq_items)): ?>
                <?php foreach ($faq_items as $faq): ?>
                <li class="faq-list__item">
                    <p class="faq-list__item-question">
                        <?php echo esc_html($faq['faq_question']); ?>
                    </p>
                    <p class="faq-list__item-answer">
                        <?php echo nl2br(esc_html($faq['faq_answer'])); ?>
                    </p>
                </li>
                <?php endforeach; ?>
                <?php endif; ?>
            </ul>
        </div>
    </section>
    <?php get_footer(); ?>