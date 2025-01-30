<?php get_header(); ?>
<div id="mv" class="mv-lower mv-lower--mask">
    <div class="mv-lower__inner">
        <div class="mv-lower__title">
            <h1 class="mv-lower__title-main">Information</h1>
        </div>
        <div class="mv-lower__img">
            <picture>
                <source srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/information-lower.jpg"
                    media="(min-width: 768px)" />
                <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/information-sp.jpg"
                    alt="ダイビング中のダイバーとサンゴ礁の周りに泳ぐカラフルな魚たちの風景">
            </picture>
        </div>
    </div>
</div>
<?php get_template_part('breadcrumb'); ?>
<main>
    <section class="information-lower information-lower-layout">
        <div class="information-lower__inner inner">
            <div class="information-lower__tab">
                <div class="information-lower__tab-list">
                    <a class="information-lower__tab-button" data-number="tab01">ライセンス<br class="u-mobile">講習</a>
                    <a class="information-lower__tab-button" data-number="tab02">ファン<br class="u-mobile">ダイビング</a>
                    <a class="information-lower__tab-button" data-number="tab03">体験<br class="u-mobile">ダイビング</a>
                </div>
                <div class="information-lower__contents">
                    <ul id="tab01" class="information-lower__contents-content js-tab-content is-active ">
                        <li class="information-lower__card">
                            <div class="information-lower__container">
                                <div class="information-lower__text-container">
                                    <p class="information-lower__title-sub">ライセンス講習</p>
                                    <p class="information-lower__text">
                                        泳げない人も、ちょっと水が苦手な人も、ダイビングを「安全に」楽しんでいただけるよう、スタッフがサポートいたします!スキューバダイビングを楽しむためには最低限の知識とスキルが要求されます。知識やスキルと言ってもそんなに難しい事ではなく、安全に楽しむ事を目的としたものです。プロダイバーの指導のもと知識とスキルを習得しCカードを取得して、ダイバーになろう!
                                    </p>
                                </div>
                                <div class="information-lower__img">
                                    <picture>
                                        <source
                                            srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/license-1-pc.jpg"
                                            media="(min-width: 768px)" />
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/license-1.jpg"
                                            alt="青く透き通った海で数名がシュノーケリングを楽しんでいる様子。リーフや珊瑚が確認できるクリアな水中の景色が広がっている。">
                                    </picture>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul id="tab02" class="information-lower__contents-content js-tab-content">
                        <li class="information-lower__card">
                            <div class="information-lower__container">
                                <div class="information-lower__text-container">
                                    <p class="information-lower__title-sub">ファンダイビング</p>
                                    <p class="information-lower__text">
                                        ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！!
                                    </p>
                                </div>
                                <div class="information-lower__img">
                                    <picture>
                                        <source
                                            srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/license-2-pc.jpg"
                                            media="(min-width: 768px)" />
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/license-2.jpg"
                                            alt="青く透き通った海で数名がシュノーケリングを楽しんでいる様子。リーフや珊瑚が確認できるクリアな水中の景色が広がっている。">
                                    </picture>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <ul id="tab03" class="information-lower__contents-content js-tab-content">
                        <li class="information-lower__card">
                            <div class="information-lower__container">
                                <div class="information-lower__text-container">
                                    <p class="information-lower__title-sub">体験ダイビング</p>
                                    <p class="information-lower__text">
                                        ブランクダイバー、ライセンスを取り立ての方も安心！沖縄本島を代表する「青の洞窟」（真栄田岬）やケラマ諸島などメジャーなポイントはモチロンのこと、最北端「辺戸岬」や最南端の「大渡海岸」等もご用意！
                                    </p>
                                </div>
                                <div class="information-lower__img">
                                    <picture>
                                        <source
                                            srcset="<?php echo get_template_directory_uri() ?>/assets/images/common/license-3-pc.jpg"
                                            media="(min-width: 768px)" />
                                        <img src="<?php echo get_template_directory_uri() ?>/assets/images/common/license-3.jpg"
                                            alt="青く透き通った海で数名がシュノーケリングを楽しんでいる様子。リーフや珊瑚が確認できるクリアな水中の景色が広がっている。">
                                    </picture>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <?php get_footer(); ?>