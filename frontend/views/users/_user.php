<?php

/** @var User $model */
?>

<div class="content-view__feedback-card user__search-wrapper">
    <div class="feedback-card__top">
        <div class="user__search-icon">
            <a href="#"><img src="./img/man-glasses.jpg" width="65" height="65"></a>
            <span><?= $user->tasks; ?> заданий</span>
            <span><?= $user->reviews; ?> отзывов</span>
        </div>
        <div class="feedback-card__top--name user__search-card">
            <p class="link-name"><a href="#" class="link-regular"><?= $user->name; ?></a></p>
            <span></span><span></span><span></span><span></span><span class="star-disabled"></span>
            <b><?= $user->rate; ?></b>
            <p class="user__search-content"><?= $user->description; ?></p>
        </div>
        <span class="new-task__time"><?= $user->last_visit; ?></span>
    </div>
    <div class="link-specialization user__search-link--bottom">
        <a href="#" class="link-regular"><?= $user->categories; ?></a>
    </div>
</div>
