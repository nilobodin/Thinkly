<?php
$title = 'Пользователь';
$currentPage = 'users';
$core_path = '../functions/core.php';
include 'header.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="user-profile">
                <div class="user-profile__avatar">
                    <img src="/assets/img/avatar/user2.png" alt="user avatar" class="user-profile__avatar-img">
                </div>
                <div class="user-profile__information">
                    <div class="user-profile__information-container">
                        <div class="user-profile__information_name">
                            <p class="user-profile__information_name-text">Saul Goodman</p>
                        </div>
                        <div class="user-profile__information-wrapper">
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/birth.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Участник 829 дней</p>
                            </div>
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/clock.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Был 1 час назад</p>
                            </div>
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/geo.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Альбукерке</p>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="user-btns">
                <button class="btn-profile user-btns__btn btn-active" id="activity_btn">Активность</button>
                <button class="btn-profile user-btns__btn" id="statistic_btn">Статистика</button>
            </section>
            <section class="user-information activity active">
                <article class="user-information-article last-question">
                    <p class="user-information__title">
                        Последние вопросы Soul Goodman
                    </p>
                    <div class="user-info__line"></div>
                    <ol class="user-information__list">
                        <a href="#">
                            <li class="user-information__list_item">Как получить детальный доступ к DynamoDB, работая с
                                предполагаемыми разрешениями?</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Подскажите, как развернуть проект на Laravel?</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Что делать если не работает Visual Studio Code!!!?
                            </li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Не выходит установить расширение для OS Panel</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Не выходит!!!!!! На помощь!</li>
                        </a>
                    </ol>
                </article>
                <article class="user-information-article last-question">
                    <p class="user-information__title">
                        Последние ответы Soul Goodman
                    </p>
                    <div class="user-info__line"></div>
                    <ol class="user-information__list">
                        <a href="#">
                            <li class="user-information__list_item">Нужно построить SQL - запрос.</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Нужно сделать двухфакторную аутентификацию на языке
                                PHP</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">HTTPS что это?!</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Как запустить Linux на Windows?</li>
                        </a>
                        <a href="#">
                            <li class="user-information__list_item">Кто разбирается в компутерах?!</li>
                        </a>
                    </ol>
                </article>
            </section>
            <section class="user-information statistic">
                <div class="statistic-awards">
                    <article class="user-info__statistic">
                        <p class="user-info__statistic_title">Статистика</p>
                        <div class="user-info__statistic_wrapper">
                            <div class="user-info__statistic_reputation-answers">
                                <div class="user-info__statistic_reputation">
                                    <p class="user-info__statistic_number">1</p>
                                    <p class="user-info__statistic_text">репутация</p>
                                </div>
                                <div class="user-info__statistic_answer">
                                    <p class="user-info__statistic_number">0</p>
                                    <p class="user-info__statistic_text">ответы</p>
                                </div>
                            </div>
                            <div class="user-info__statistic_questions">
                                <p class="user-info__statistic_number">0</p>
                                <p class="user-info__statistic_text">ответы</p>
                            </div>
                        </div>
                    </article>
                    <article class="awards">
                        <p class="awards__title">
                            Награды
                        </p>
                        <div class="awards__wrapper">
                            <div class="user-info__reward">
                                <div class="user-info__reward_ring newbie-color-award"></div>
                                <div class="user-info__reward_text">
                                    <p class="user-info__reward_text-name">Новичок</p>
                                    <p class="user-info__reward_text-level">(ответ)</p>
                                </div>
                            </div>
                            <div class="user-info__reward">
                                <div class="user-info__reward_ring newbie-color-award"></div>
                                <div class="user-info__reward_text">
                                    <p class="user-info__reward_text-name">Новичок</p>
                                    <p class="user-info__reward_text-level">(ответ)</p>
                                </div>
                            </div>
                        </div>
                    </article>
                </div>
                <article class="about-us">
                    <p class="about-us__title">
                        О Saul Goodman
                    </p>
                    <p class="about-us__description">
                        Двуличный и жадный до тщеславия, денег и признания. Раньше работал адвокатом, но после встречи
                        с двумя ребятами по имени Уолтер Уайт и Джесси Пинкман решил сменить место жительства, приобрел
                        новый пылесос Экстра Шовер Про Макс 5000 с насадкой для глубокой очистки поверхности и исчез из
                        Альбукерке...
                    </p>
                </article>
            </section>
        </main>
    </div>
</div>

<?php
include 'footer.php';
?>