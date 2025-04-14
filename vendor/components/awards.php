<?php
$title = 'Пользователи';
$currentPage = basename($_SERVER['PHP_SELF'], '.php');
$core_path = '../functions/core.php';
include 'header.php';
?>
<div class="container">
    <div class="main-container">
        <?php include 'aside.php' ?>
        <main class="main">
            <div class="awards-container">
                <header class="awards-header">
                    <p class="awards-header__title">
                        Награды
                    </p>
                    <p class="awards-header__description">
                        Помимо получения репутации за ответы и вопросы, вы можете получать награды за дополнительные
                        действия на сайте. Награды отображаются в вашем профиле.
                    </p>
                </header>
                <main class="awards-main">
                    <div class="awards-main__award-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring newbie-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Новичок</p>
                                <p class="user-info__reward_text-level">(вопрос)</p>
                            </div>
                        </div>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Первая награда которую получает пользователь за заданые вопросы
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring newbie-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Новичок</p>
                                <p class="user-info__reward_text-level">(ответ)</p>
                            </div>
                        </div>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Первая награда которую получает пользователь за ответы на вопрос
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring experienced-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Опытный</p>
                                <p class="user-info__reward_text-level">(вопрос)</p>
                            </div>
                        </div>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Задайте 25 вопросов, чтобы получить данную награду
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring experienced-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Опытный</p>
                                <p class="user-info__reward_text-level">(ответ)</p>
                            </div>
                        </div>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Ответь на 25 вопросов, чтобы получить данную награду
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring advanced-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Продвинутый</p>
                                <p class="user-info__reward_text-level">(вопрос)</p>
                            </div>
                        </div>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Задайте 100 вопросов, чтобы получить данную награду
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                        <div class="user-info__reward">
                            <div class="user-info__reward_ring advanced-color-award"></div>
                            <div class="user-info__reward_text">
                                <p class="user-info__reward_text-name">Продвинутый</p>
                                <p class="user-info__reward_text-level">(ответ)</p>
                            </div>
                        </div>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Ответьте на 100 вопросов, чтобы получить данную награду
                            </p>
                        </div>
                    </div>
                </main>
            </div>
        </main>
    </div>
</div>

<?php 
include 'modals/modal.php';
include 'modals/pop-up.php';
include 'footer.php' 
?>