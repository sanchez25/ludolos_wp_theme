<?php
/*Template Name: Main*/
?>

<?php get_header()?>

<section class="main-block">
    <div class="main-text-block">
        <div class="container">
            <div class="header-logo-img main" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/ludolostop-logo.svg)"></div>
            <div class="main-text-block-title">
                <h1>LudoЛось Top?</h1>
            </div>
            <div class="main-text-block-content">
                <div class="main-text-block-info">
                    <p>
                        <strong>LudoЛось Top?</strong> - стример казино, быстро набирающий популярность в сфере онлайн гемблинга. Начал карьеру в декабре 2020 и уже сейчас имеет свою аудиторию, активно взаимодействует с чатом, проводит регулярные розыгрыши и викторины. Стрим казино сегодня очень популярная тема, поэтому трансляции проходят дважды в сутки - утром и вечером.
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="main-stream-block">
    <div class="container">
        <div class="stream-block">
            <div class="stream-block-title">
                <h2>Стараюсь стримить в лицензионных онлайн казино</h2>
            </div>
            <div class="casino-list">
                <?php
                    if ($items = get_posts(array('numberposts' => 50, 'post_type' => 'post'))) {
                        foreach($items as $item) {
                            $link = get_field('link', $item->ID);
                            echo '<div class="casino-card">';
                                echo '<div class="casino-card-item one">';
                                    echo '<a class="casino-card-link" aria-label="Casino card" href="'.get_permalink($item->ID).'">';
                                        echo '<div class="casino-card-image">';
                                            echo get_the_post_thumbnail($item->ID);
                                        echo '</div>';
                                    echo '</a>';
                                    echo '<div class="casino-card-middle title">';
                                        echo '<span class="casino-card-title">Бонус на депозит</span>';
                                        $cur_terms = get_the_terms( $item->ID, 'bonuses' );
                                        if( is_array( $cur_terms ) ) {
                                            foreach ( $cur_terms as $cur_term ) {
                                                echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                    echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                echo '</a>';
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="casino-card-item two">';
                                    echo '<div class="casino-card-middle">';
                                        echo '<span class="casino-card-title">Вагер на бонус</span>';
                                        $cur_terms = get_the_terms( $item->ID, 'vager' );
                                        if( is_array( $cur_terms ) ) {
                                            foreach ( $cur_terms as $cur_term ) {
                                                echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                    echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                echo '</a>';
                                            }
                                        }
                                    echo '</div>';
                                    echo '<div class="casino-card-middle type">';
                                        $cur_terms = get_the_terms( $item->ID, 'type' );
                                        if( is_array( $cur_terms ) ) {
                                            foreach ( $cur_terms as $cur_term ) {
                                                $tax_image = z_taxonomy_image_url($cur_term->term_id, 'pay_cards');
                                                echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                    if ($tax_image) {
                                                        echo '<img id="patch" class="type-bonus-img" src="'.z_taxonomy_image_url($cur_term->term_id, 'pay_cards').'" />';
                                                        echo '<div class="hover-block-patch">';
                                                            echo '<p>Липкий бонус</p>';
                                                        echo '</div>';
                                                    } else {
                                                        echo '<img id="no-patch" class="type-bonus-img" src="'.get_template_directory_uri().'/img/no-patch.svg">';
                                                        echo '<div class="hover-block-patch">';
                                                            echo '<p>Нелипкий бонус</p>';
                                                        echo '</div>';
                                                    }
                                                echo '</a>';
                                            }
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="casino-card-item three">';
                                    echo '<div class="casino-card-middle">';
                                        $cur_terms = get_the_terms( $item->ID, 'spin' );
                                        if( is_array( $cur_terms ) ) {
                                            foreach ( $cur_terms as $cur_term ) {
                                                echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                    echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                echo '</a>';
                                                if ( $cur_term->description ) {
                                                    echo '<span id="promocode-casino-'.$item->ID.'" class="promocode-casino">'.$cur_term->description.'</span>';
                                                    echo '<button id="copy-'.$item->ID.'" class="btn-code-copy-card">Скопировать</button>';
                                                    echo '<div class="hover-block casino" id="hover-block-'.$item->ID.'">';
                                                        echo '<div class="copy-icon" style="background-image: url('.get_template_directory_uri().'/img/copy.svg);"></div>';
                                                        echo '<span>Скопировать код</span>';
                                                    echo '</div>';
                                                } else {
                                                    echo '<span class="no-promo">без ПРОМО</span>';
                                                }
                                            }
                                        } else {
                                            echo '<span class="no-promo">Бесплатных спинов НЕТ</span>';
                                        }
                                    echo '</div>';
                                    echo '<div class="casino-card-middle">';
                                        $cur_terms = get_the_terms( $item->ID, 'dep' );
                                        if( is_array( $cur_terms ) ) {
                                            foreach ( $cur_terms as $cur_term ) {
                                                echo '<a href="'. get_term_link( $cur_term->term_id, $cur_term->taxonomy ) .'">';
                                                    echo '<span class="casino-card-bonus page">'.$cur_term->name.'</span>';
                                                echo '</a>';
                                                echo '<a class="link-dep" href="https://www.youtube.com/channel/UCHD_Dx5tet1ZHHsn1kLYcZQ" target="_blank" rel="noreferrer">Перейти на канал</a>';
                                            }
                                        } else {
                                            echo '<span class="no-promo dep">Бездепозитных бонусов НЕТ</span>';
                                        }
                                    echo '</div>';
                                echo '</div>';
                                echo '<div class="casino-card-item four">';
                                    echo '<div class="casino-card-last">';
                                        echo '<a class="casino-card-submit" href="'.$link.'" rel="noreferrer">';  
                                            echo '<span>Регистрация</span>';
                                        echo '</a>';
                                        echo '<a class="casino-card-overview" href="'.get_permalink($item->ID).'">';
                                            echo '<div class="casino-card-overview-icon" style="background-image: url('.get_template_directory_uri().'/img/magnifier.svg)"></div>';
                                            echo '<span>Обзор</span>';
                                        echo '</a>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        }
                    }
                ?>
            </div>
        </div>
    </div>
</section>
<section class="slots-block">
    <div class="container">
        <div class="slots-block-title">
            <h2>Играть в слоты бесплатно</h2>
        </div>
        <div class="slots-block-content">
            <?php
                if ($items = get_posts(array('numberposts' => 4, 'post_type' => 'Slots'))) {
                    foreach($items as $item) {
                        $rate = get_field('rate-slots', $item->ID);
                        echo '<div class="main-slots-item">';
                            echo '<a class="main-slots-item-link" href="'.get_permalink($item->ID).'">';
                                echo '<div class="main-slots-block-image">';
                                    echo get_the_post_thumbnail($item->ID);
                                    echo '<div class="main-slots-block-back">';
                                        if ($rate) {
                                            echo '<div class="casino-card-rate slots">'.$rate.'</div>';
                                        }
                                        echo '<span class="play-btn">';
                                            echo '<div class="ikon-play-btn" style="background-image: url('.get_template_directory_uri().'/img/play.svg)"></div>';
                                        echo '</span>';
                                        echo '<div class="play-text">Играть бесплатно</div>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</a>';
                            echo '<div class="main-slots-block-title top">';
                                echo '<span class="title-main-slots-span">'.$item->post_title.' </span>';
                                echo '<span>от</span>';
                                echo the_terms( $item->ID, 'providers' , ' ' );
                            echo '</div>';
                        echo '</div>';
                    }
                }
            ?>
        </div>
        <div class="after-cards-block">
            <a href="/slots/" class="after-cards-button">
                <span>Больше слотов</span>
                <div class="after-cards-button-icon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/all.svg)"></div>
            </a>
        </div>
    </div>
</section>
<section class="main-tabs-block" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/main-banner.svg)">
    <div class="container">
        <div class="main-tabs-title">
            <h2>О себе</h2>
        </div>
        <div class="main-tabs-content-text">
            <P>
                В Петербург приехал из Подмосковья несколько лет назад. Обосновался на новом месте, женился, есть ребенок. Всегда интересовался покером, с автоматами особо не взаимодействовал, но играли мои друзья. Обычно те, кто не связан с гемблингом думают, что в этой сфере можно встретить только зависимых маргинальных личностей. Это не так, здесь много разных людей, в том числе, с высшим образованием. Кто-то имеет свой бизнес и руководит крупными отделами, получает неплохой заработок. Все играют довольно адекватно, умеют останавливаться и не испытывают больших финансовых проблем. Некоторые устанавливают правила - играть только на 10% от заработанных средств. Именно такой компанией мы иногда собирались. Потом я начал думать о том, как стать стримером, потому что смотрел много трансляций. Накопил денег и решил попробовать в качестве личного проекта, который будет приносить удовольствие и заработок. Не все могут увлечь публику на пять часов и повторять одно и то же, а я довольно болтлив - людям это подходит. У меня есть хороший бэкграунд и много историй про казино.
            </P>
            <!--<div class="main-iframe">
                <iframe width="1280" height="720" src="https://www.youtube.com/embed/A8EO70yS590" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>-->
            <P>
                Никнейм <strong>LudoЛось Top?</strong> поймут люди из тусовки. У одного из популярных стримеров есть подписчик с похожим ником. Однажды он посоветовал слот, который дал очень крупный выигрыш, после чего стал локальным мемом среди остальных. Я вспомнил про это и про слот Seasons от Yggdrasil. Там функции Wild выполняют изображения зайцев, сов, оленей и лис. Каждый из символов соответствуют сезону. Вместо оленя решил использовать лося, более созвучного для никнейма. Хочу заметить, что ник заключает в себе вопрос - а может быть и LudoЛось Top? Небольшие отсылки, попытки найти свою аудиторию с известного мема.
            </P>
        </div>
    </div>
</section>
<!--<section class="main-block-bonuses">
    <div class="container">
        <div class="bonus-block-title">
            <h2>Бонусы</h2>
        </div>
        <div class="bonus-block-content">
            <?php
                if ($items = get_posts(array('numberposts' => 2, 'post_type' => 'Bonuses'))) {
                    foreach($items as $item) {
                        $bonus = get_field('link-bonus', $item->ID);
                        echo '<div class="bonus-block-item">'.$bonus.'</div>';
                    }
                }
            ?>
        </div>
        <div class="after-cards-block">
            <a href="/bonusy/" class="after-cards-button">
                <span>Больше бонусов</span>
                <div class="after-cards-button-icon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/all.svg)"></div>
            </a>
        </div>
    </div>
</section>-->
<section class="faq-block">
    <div class="faq-block-title">
        <h2>Советы игрокам от LudoЛося</h2>
    </div>
    <div class="schema-faq wp-block-yoast-faq-block content-faq">
        <div id="faq-question-1597235112661" class="schema-faq-section">
            <div class="schema-faq-section-item">
                <div class="faq-title">
                    <div class="faq-img">?</div>
                    <div class="schema-faq-question">
                        Как <span>не</span> замазаться <span>после</span> крупного зано<span>са?</span>
                    </div>
                </div>
                <div class="schema-faq-ikon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/guides.svg)"></div>
            </div>
            <div class="schema-faq-answer-item">
                <p class="schema-faq-answer">
                    Постарайтесь не думать, что был занос, не нужно терять ритм игры. А лучше — сделать перерыв дней на пять. Ну и в целом следует забыть о факте, что на счете стало больше денег.
                </p>
                <a href="/guides/#tab-one" class="guides-block-item-btn question">
                    <span>Подробнее</span>
                </a>
            </div>
        </div>
        <div id="faq-question-1597235125069" class="schema-faq-section">
            <div class="schema-faq-section-item">
                <div class="faq-title">
                    <div class="faq-img">?</div>
                    <div class="schema-faq-question">
                        <span>Как</span> контролиров<span>ать</span> игровую завис<span>имость?</span>
                    </div>
                </div>
                <div class="schema-faq-ikon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/guides.svg)"></div>
            </div>
            <div class="schema-faq-answer-item">
                <p class="schema-faq-answer">В идеале нужно давать себе конкретные дни, в которые ты можешь сесть и спокойно поиграть. Не следует превращать весь процесс в ежедневный депозит.</p>
                <a href="/guides/#tab-two" class="guides-block-item-btn question">
                    <span>Подробнее</span>
                </a>
            </div>
        </div>
        <div id="faq-question-1597235173289" class="schema-faq-section">
            <div class="schema-faq-section-item">
                <div class="faq-title">
                    <div class="faq-img">?</div>
                    <div class="schema-faq-question">
                        Как <span>выбрать</span> надежные ка<span>зи</span>но?
                    </div>
                </div>
                <div class="schema-faq-ikon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/guides.svg)"></div>
            </div>
            <div class="schema-faq-answer-item">
                <p class="schema-faq-answer">
                    Нужно следить за гемблинг новостями и стримерами. Я всегда играю только надежных казино, список вы сможете найти на этом сайте и в других соцсетях. 
                    Обычно комьюнити стримеров продвигают хорошие продукты. Есть и базовые возможности, доступные каждому игроку. Например, в коде страницы можно посмотреть, куда ссылается механика игры.
                </p>
                <a href="/guides/#tab-three" class="guides-block-item-btn question">
                    <span>Подробнее</span>
                </a>
            </div>
        </div>
        <div id="faq-question-1597235184398" class="schema-faq-section">
            <div class="schema-faq-section-item">
                <div class="faq-title">
                    <div class="faq-img">?</div>
                    <div class="schema-faq-question">
                        <span>Зачем</span> нужна вер<span>ифи</span>кация?
                    </div>
                </div>
                <div class="schema-faq-ikon" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/guides.svg)"></div>
            </div>
            <div class="schema-faq-answer-item">
                <p class="schema-faq-answer">
                    Верификация обязует игрока выслать данные лицензионному казино. По сути это партнерские взаимоотношения, где каждый может доверять друг другу. 
                    Тем самым гарантируя как выплаты, так и надежное решение при спорных ситуациях, которое устроит всех.
                </p>
                <a href="/guides/#tab-four" class="guides-block-item-btn question">
                    <span>Подробнее</span>
                </a>
            </div>
        </div>
    </div>
</section>
<section class="main-tabs-block" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/main-banner.svg)">
    <div class="container">
        <div class="main-tabs-title">
            <h2>Топовые заносы</h2>
        </div>
        <div class="main-tabs-content-text">
            <p>
                Если у меня онлайн стрим казино, то я делаю депозиты по 10 - 20 тысяч, так как нужно подольше поиграть. Конечно, топ стримеры играют на довольно большие деньги, но меня устраивает такая сумма, пока не думаю повышать банк. Если играю не на камеру, то предпочитаю минимальную ставку и минимальные депы. С тысячи поднять десять - гораздо приятнее.
            </p>
            <!--<div class="main-iframe">
                <iframe width="1280" height="720" src="https://www.youtube.com/embed/ZJ5BaRZqybw" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>-->
            <p>
                Самый большой занос до стрима был в слоте <strong>Genie jackpots MegaWays</strong> от <strong>Blueprint Gaming</strong> по 20 рублей. Мне выпала бонуска с mystery символами, поставила поляну таких символов с топовым джекпотом. Я выиграл 100 тысяч рублей (х5000) в <strong>JOY Casino</strong>. Уже на стриме в новом слоте <strong>Lovely Lady</strong> от <strong>Amatic</strong> мне выпал бонус, а в нем 2 раза по пять скатеров. Итого - 120 тысяч (х4000) в <strong>Казино Чемпион</strong>.
            </p>
        </div>
    </div>
</section>

<?php get_footer()?>
