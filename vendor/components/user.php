<?php
$title = 'Пользователь';
$currentPage = 'users';
$core_path = '../functions/core.php';
include 'header.php';

$userId = $_GET['id'] ?? null;
if (!$userId) {
    $_SESSION['error'] = 'Пользователь не найден';
    header("Location: /vendor/components/users.php");
    exit;
}

include '../functions/createdCounter.php';
include '../functions/lastVisit.php';
include '../functions/showUser.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="user-profile">
                <div class="user-profile__avatar">
                    <img src="<?= htmlspecialchars($user['avatar']) ?? 'assets/img/avatar/user.png' ?>"
                        alt="user avatar" class="user-profile__avatar-img">
                </div>
                <div class="user-profile__information">
                    <div class="user-profile__information-container">
                        <div class="user-profile__information_name">
                            <p class="user-profile__information_name-text">
                                <?= htmlspecialchars($user['nickname']) ?? 'Неизвестный пользователь' ?>
                            </p>
                        </div>
                        <div class="user-profile__information-wrapper_top">
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/birth.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Участник
                                    <?= $days ?> дней
                                </p>
                            </div>
                            <div class="user-profile__info">
                                <img class="user-profile__information_svg" src="/assets/img/icons/clock.svg"
                                    alt="pancake">
                                <p class="user-profile__information_text">Был(а)
                                    <?= $lastSeen ?> назад
                                </p>
                            </div>
                            <div class="user-profile__info">
                                <svg class="user-profile__information_svg" width="20.000000" height="20.000000"
                                    viewBox="0 0 20 20" fill="none" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink">
                                    <g clip-path="url(#clip58_27)">
                                        <path id="path"
                                            d="M17.54 8.31C17.54 10.58 16.29 12.72 14.77 14.48C12.46 17.16 10 19 10 19C10 19 7.59 17.11 5.28 14.43C3.76 12.68 2.51 10.54 2.51 8.27C2.51 6.32 2.84 4.53 4.34 3.15C5.84 1.77 7.87 1 10 1C12.12 1 13.97 1.92 15.47 3.3C16.97 4.68 17.54 6.5 17.54 8.31Z"
                                            fill="#FFFFFF" fill-opacity="1.000000" fill-rule="nonzero" />
                                        <path id="path"
                                            d="M4.34 3.15C5.84 1.77 7.87 1 10 1C12.12 1 13.97 1.92 15.47 3.3C16.97 4.68 17.54 6.5 17.54 8.31C17.54 10.58 16.29 12.72 14.77 14.48C12.46 17.16 10 19 10 19C10 19 7.59 17.11 5.28 14.43C3.76 12.68 2.51 10.54 2.51 8.27C2.51 6.32 2.84 4.53 4.34 3.15Z"
                                            stroke="#808080" stroke-opacity="1.000000" stroke-width="1.500000"
                                            stroke-linejoin="round" />
                                        <path id="path"
                                            d="M10 10C11.65 10 13 8.65 13 7C13 5.34 11.65 4 10 4C8.34 4 7 5.34 7 7C7 8.65 8.34 10 10 10Z"
                                            fill="#FFFFFF" fill-opacity="0" fill-rule="nonzero" />
                                        <path id="path"
                                            d="M13 7C13 5.34 11.65 4 10 4C8.34 4 7 5.34 7 7C7 8.65 8.34 10 10 10C11.65 10 13 8.65 13 7Z"
                                            stroke="#808080" stroke-opacity="1.000000" stroke-width="1.500000"
                                            stroke-linejoin="round" />
                                    </g>
                                </svg>

                                <p class="user-profile__information_text">
                                    <?= $user['location'] ?? 'Не указан' ?>
                                </p>
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
                        Последние вопросы
                        <?= htmlspecialchars($user['nickname']) ?? 'Неизвестный пользователь' ?>
                    </p>
                    <div class="user-info__line"></div>
                    <ol class="user-information__list">
                        <?php foreach ($questions as $question) { ?>
                            <a href="<?= "/vendor/components/question.php/?id=" . $question['id'] ?>">
                                <li class="user-information__list_item">
                                    <?= $question['title'] ?? 'Пока ничего не спрашивал' ?>
                                </li>
                            </a>
                        <?php } ?>
                    </ol>
                </article>
                <article class="user-information-article last-question">
                    <p class="user-information__title">
                        Последние ответы
                        <?= htmlspecialchars($user['nickname']) ?? 'Неизвестный пользователь' ?>
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
                                    <p class="user-info__statistic_number">
                                        <?= $user['reputation'] ?? '0' ?>
                                    </p>
                                    <p class="user-info__statistic_text">репутация</p>
                                </div>
                                <div class="user-info__statistic_answer">
                                    <p class="user-info__statistic_number">
                                        <?= $user['answers_count'] ?? '0' ?>
                                    </p>
                                    <p class="user-info__statistic_text">ответы</p>
                                </div>
                            </div>
                            <div class="user-info__statistic_questions">
                                <p class="user-info__statistic_number">
                                    <?= $user['questions_count'] ?? '0' ?>
                                </p>
                                <p class="user-info__statistic_text">вопросы</p>
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
                        О
                        <?= $user['nickname'] ?? 'Неизвестный пользователь' ?>
                    </p>
                    <p class="about-us__description">
                        <?= $user['about_me'] ?? 'Пользователь не указывал ничего о себе' ?>
                    </p>
                </article>
            </section>
        </main>
    </div>
</div>

<?php
include 'modals/modal.php';
include 'modals/modal-prompt.php';
include 'modals/pop-up.php';
include 'footer.php'
?>