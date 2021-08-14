<?php

/** @var Task $model */
?>

<div class="new-task__card">
    <div class="new-task__title">
        <a href="#" class="link-regular">
            <h2><?= $model->name; ?></h2>
        </a>
        <a class="new-task__type link-regular" href="#">
            <p><?= $model->category_id; ?></p>
        </a>
    </div>
    <div class="new-task__icon new-task__icon--translation"></div>
    <p class="new-task_description">
        <?= $model->description; ?>
    </p>
    <b class="new-task__price new-task__price--translation"><?= $model->budget; ?><b> ₽</b></b>
    <p class="new-task__place"><?= $model->address; ?></p>
    <span class="new-task__time"><?= $model->dt_add; ?></span>
</div>