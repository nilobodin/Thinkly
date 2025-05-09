<?php
ob_start();

$title = 'Профиль';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$core_path = '../functions/core.php';

include 'header.php';

$userId = $_SESSION['user']['id'] ?? null;
if (!$userId) {
    $_SESSION['error'] = 'Пользователь не найден';
    header("Location: /");
    exit;
}

include '../functions/createdCounter.php';
include '../functions/lastVisit.php';
include '../functions/showProfileInfo.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <section class="user-profile">
                <div class="user-profile__avatar">
                    <img src="<?= $user['avatar'] ?>" alt="user avatar" class="user-profile__avatar-img">
                </div>
                <div class="user-profile__information">
                    <div class="user-profile__information-container">
                        <div class="user-profile__information_name">
                            <p class="user-profile__information_name-text">
                                <?= $user['nickname'] ?>
                            </p>
                        </div>
                        <div class="user-profile__information-wrapper">
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
                                        <?= $user['location'] ?? 'Не указано' ?>
                                    </p>
                                </div>
                            </div>
                            <div class="user-profile__information-wrapper_bottom">
                                <div class="user-profile__information-wrapper_links">
                                    <?php if (!empty($user['tg_link'])) { ?>
                                        <i class="user-profile__information-wrapper_icon bi-telegram"></i>
                                        <p class="user-profile__information-wrapper_link">
                                            <?= htmlspecialchars($_SESSION['user']['tg_link']) ?>
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="user-profile__information-wrapper_links">
                                    <?php if (!empty($user['github_link'])) { ?>
                                        <i class="user-profile__information-wrapper_icon bi-github"></i>
                                        <p class="user-profile__information-wrapper_link">
                                            <?= htmlspecialchars($_SESSION['user']['github_link']) ?>
                                        </p>
                                    <?php } ?>
                                </div>
                                <div class="user-profile__information-wrapper_links">
                                    <?php if (!empty($user['site_link'])) { ?>
                                        <i class="user-profile__information-wrapper_icon bi-link"></i>
                                        <p class="user-profile__information-wrapper_link">
                                            <?= htmlspecialchars($_SESSION['user']['site_link']) ?>
                                        </p>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="user-profile__edit">
                        <button class="user-profile__edit_btn">
                            <img class="user-profile__edit_pencil" src="/assets/img/icons/edit.svg" alt="pencil">
                            <p class="user-profile__edit_text" id="edit_profile_btn">Редактировать профиль</p>
                        </button>
                    </div>
                </div>
            </section>
            <section class="user-btns">
                <button class="btn-profile user-btns__btn btn-active" id="profile_btn">Профиль</button>
                <button class="btn-profile user-btns__btn" id="setting_btn">Настройки</button>
                <button class="btn-profile user-btns__btn" id="reward_btn">Награды</button>
            </section>
            <section class="user-info profile active">
                <div class="user-info__upper">
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
                    <article class="user-info__about-me">
                        <p class="user-info__about-me_title">
                            Обо мне
                        </p>
                        <div class="user-info__about-me_wrapper">
                            <?php if (!empty($user['about_me'])) {
                                echo "<p class='user-info__about-me_text'>" . $user['about_me'] . "</p>";
                            } else { ?>
                                <p class="user-info__about-me_void">
                                    Ваш раздел "Обо мне" в настоящее время пуст
                                    Хотите добавить его? <a href="#" class="edit-link">Редактировать профиль</a>
                                </p>
                            <?php } ?>
                        </div>
                    </article>
                </div>
                <div class="user-info__bottom">
                    <article class="user-info__posts">
                        <div class="user-info__posts_title">
                            Посты
                        </div>
                        <div class="user-info__posts_wrapper">
                            <?php if (empty($questions)) { ?>
                                <p class="user-info__posts_void">
                                    Здесь будут отображаться ваши вопросы, чтобы узнать ответ на свой вопрос
                                    <a href="/app/components/ask.php">задать его можно здесь</a> 
                                </p>
                            <?php } else { ?>
                                <ol class="user-information__list">
                                    <?php foreach ($questions as $question) { ?>
                                        <a href="<?= "/app/components/question.php/?id=" . $question['id'] ?>">
                                            <li class="user-information__list_item">
                                                <?= $question['title'] ?? 'Пока ничего не спрашивал' ?>
                                            </li>
                                        </a>
                                    <?php } ?>
                                <?php } ?>
                            </ol>
                        </div>
                    </article>
                </div>
            </section>
            <div class="user-info-settings-delete">
                <div class="user-info-nav user-info">
                    <button class="btn-profile user-info-nav-btn" id="edit_btn">Редактировать профиль</button>
                    <button class="btn-profile user-info-nav-btn" id="delete_btn">Удалить профиль</button>
                </div>
                <section class="user-info settings">
                    <header class="user-info__title">
                        <p class="user-info__title-text">Изменение профиля</p>
                        <div class="user-info__line"></div>
                    </header>
                    <div class="user-info-container">
                        <form class="user-info__change" action="/app/functions/changeProfile.php" method="POST"
                            enctype="multipart/form-data">
                            <article class="user-info__image">
                                <p class="user-info__image_title">Изображение профиля</p>
                                <div class="user-info__image-wrapper">
                                    <img src="<?= $user['avatar'] ?>" alt="Изображение профиля"
                                        class="user-info__image_picture" id="avatarPreview">
                                    <input type="file" name="avatar" class="user-info__image_change-btn"
                                        id="avatarInput" onchange="previewImage(this)"
                                        placeholder="Изменить картинку"></input>
                                </div>
                            </article>
                            <article class="user-info__inputs-wrapper">
                                <div class="user-info__inputs-wrapper-left">
                                    <div class="user-info__input">
                                        <p class="user-info__input_title">Отображаемое имя</p>
                                        <input maxlength="15" type="text" value="<?= $user['nickname'] ?>"
                                            class="user-info__input_input" name="nickname">
                                    </div>
                                    <div class="user-info__input">
                                        <p class="user-info__input_title">Местоположение</p>
                                        <input maxlength="15" name="location" type="text"
                                            value="<?= $user['location'] ?? '' ?>" class="user-info__input_input">
                                    </div>
                                    <div class="user-info__input">
                                        <p class="user-info__input_title">Статус</p>
                                        <input type="text" name="status" value="<?= $_SESSION['user']['status'] ?>"
                                            class="user-info__input_input" name="status">
                                    </div>
                                </div>
                                <div class="user-info__inputs-wrapper-right">
                                    <div class="user-info__input">
                                        <p class="user-info__input_title">Обо мне</p>
                                        <textarea type="text" name="about_me"
                                            class="user-info__input_textarea"><?= $user['about_me'] ?></textarea>
                                    </div>
                                </div>
                            </article>
                            <article class="user-info__links">
                                <p class="user-info__links_title">Ссылки</p>
                                <div class="user-info__links_wrapper">
                                    <div class="user-info__links-input">
                                        <i class="user-info__links-input_icon bi-telegram"></i>
                                        <input placeholder="Ссылка или имя профиля" name="tg_link"
                                            value="<?= $user['tg_link'] ?>" type="text"
                                            class="user-info__links-input_input">
                                    </div>
                                    <div class="user-info__links-input">
                                        <i class="user-info__links-input_icon bi-github"></i>
                                        <input placeholder="Ссылка на GitHub" name="github_link"
                                            value="<?= $user['github_link'] ?>" type="text"
                                            class="user-info__links-input_input">
                                    </div>
                                    <div class="user-info__links-input">
                                        <i class="user-info__links-input_icon bi-link"></i>
                                        <input placeholder="Ссылка на личный сайт" name="site_link"
                                            value="<?= $user['site_link'] ?>" type="text"
                                            class="user-info__links-input_input">
                                    </div>
                                </div>
                            </article>
                            <article class="user-info__name">
                                <p class="user-info__name_title">Полное имя <span>Не показывается публично</span></p>
                                <div class="user-info__wrapper">
                                    <input name="fullname" maxlength="50" value="<?= $user['fullname'] ?>" type="text"
                                        class="user-info__wrapper_input">
                                </div>
                            </article>
                            <div class="user-info__btns-form">
                                <button class="btn user-info__btns_btn" id="save_change_btn">Сохранить
                                    изменения</button>
                                <button class="btn btn-disable user-info__btns_btn">Отмена</button>
                            </div>
                        </form>
                    </div>
                </section>
                <section class="user-info delete">
                    <header class="user-info__title">
                        <p class="user-info__title-text">Удаление профиля</p>
                        <div class="user-info__line"></div>
                    </header>
                    <div class="user-info-container">
                        <form class="user-info__change user-info__delete">
                            <p class="user-info__delete_title">
                                Прежде чем подтвердить, что вы хотите <span>удалить</span> свой профиль,
                                мы хотели бы остановиться на минутку и объяснить последствия удаления:
                            </p>
                            <ul class="user-info__delete_list">
                                <li class="user-info__delete_list-item">
                                    Удаление необратимо, и у вас не будет возможности
                                    восстановить какой-либо исходный контент, если удаление будет выполнено, а вы
                                    впоследствии передумаете.
                                </li>
                                <li class="user-info__delete_list-item">
                                    Ваши вопросы и ответы останутся на сайте, но доступ к вашему профилю будет навсегда
                                    утерян
                                </li>
                            </ul>
                            <div class="user-info__delete_check-block">
                                <input type="checkbox" class="user-info__delete_checkbox">
                                <p class="user-info__delete_text">Я прочитал(а) информацию, указанную выше, и понимаю
                                    последствия удаления моего профиля. Я хочу продолжить удаление моего профиля.</p>
                            </div>
                            <button disabled class="user-info__delete_btn">Удалить профиль</button>
                        </form>
                    </div>
                </section>
            </div>
            <section method="POST" class="user-info reward">
                <header class="user-info__title">
                    <p class="user-info__title-text">Мои награды</p>
                    <div class="user-info__line"></div>
                </header>
                <div class="user-info__container">
                    <div class="user-info__reward-title">
                        Продолжайте в том же духе!
                    </div>
                    <div class="user-info__reward-text">
                        отвечайте на вопросы пользователей,
                        и задавайте свои. Получайте за это награды!
                    </div>
                    <div class="user-info__reward-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring newbie-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Новичок</p>
                                <p class="user-info__reward_text-level">(вопрос)</p>
                            </div>
                        </div>
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring newbie-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Новичок</p>
                                <p class="user-info__reward_text-level">(вопрос)</p>
                            </div>
                        </div>
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring newbie-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Новичок</p>
                                <p class="user-info__reward_text-level">(вопрос)</p>
                            </div>
                        </div>
                    </div>
                </div>
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