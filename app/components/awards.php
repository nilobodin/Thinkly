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
                        <img src="/assets/img/awards/новичек (вопросы).svg" class="user-info__reward"></img>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Награда, которую получает пользователь за первый вопрос
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                    <img src="/assets/img/awards/новичек (ответы).svg" class="user-info__reward"></img>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Награда, которую получает пользователь за первый ответ
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                    <img src="/assets/img/awards/опытный (вопросы).svg" class="user-info__reward"></img>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Данную награду можно получить за 25 вопросов
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                    <img src="/assets/img/awards/опытный (ответы).svg" class="user-info__reward"></img>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Данную награду можно получить за 25 ответов
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                    <img src="/assets/img/awards/продвинутый (вопросы).svg" class="user-info__reward"></img>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Эту награду получают только задавшие 100 вопросов на сайте!
                            </p>
                        </div>
                    </div>
                    <div class="awards-main__award-wrapper">
                    <img src="/assets/img/awards/продвинутый (ответы).svg" class="user-info__reward"></img>
                        <div class="awards-main__awards-wrapper_description">
                            <p class="awards-main__awards-wrapper_description-text">
                                Эту награду получают только ответившие на 100 вопросов на сайте!
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
include 'modals/modal-prompt.php';
include 'modals/pop-up.php';
include 'footer.php'
?>