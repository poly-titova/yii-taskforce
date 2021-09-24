<?php

use frontend\models\Categories;
use frontend\models\TaskFilter;
use yii\widgets\ListView;
use yii\bootstrap\{ActiveForm, Html};

/**
 * @var TaskFilter $filter
 * @var $form ActiveForm
 */
?>

<section class="new-task">
    <div class="new-task__wrapper">
        <h1>Новые задания</h1>
        <?= ListView::widget([
            'dataProvider' => $filter->getDataProvider(),
            'itemView' => '_task'
        ]); ?>
    </div>
</section>
<section class="search-task">
    <div class="search-task__wrapper">
        <?php $form = ActiveForm::begin([
            'action' => [''],
            'method' => 'post',
            'options' => ['class' => 'search-task__form']
        ]); ?>
        <?= $form->field($filter, 'categories', [
            'template' => Html::tag('legend', '{labelTitle}') . "\n{input}",
            'options' => [
                'tag' => 'fieldset',
                'class' => 'search-task__categories',
            ]
        ])->checkboxList(Categories::getCategorisList(), [
            'unselect' => null,
            'tag' => false,
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::beginTag('label', ['class' => 'checkbox__legend']) .
                    Html::checkbox($name, $checked, [
                        'class' => 'visually-hidden checkbox__input',
                        'value' => $value
                    ]) . Html::tag('span', $label) . Html::endTag('label');
            }
        ]); ?>
        <fieldset class="search-task__categories">
            <legend>Дополнительно</legend>
            <?= $form->field($filter, 'withoutReplies', [
                'options' => [],
                'checkboxTemplate' => Html::beginTag('label', ['class' => 'checkbox__legend']) . "{input}" . Html::tag('span', "{labelTitle}") . Html::endTag('label'),
            ])->checkbox([
                'uncheck' => null,
                'class' => 'visually-hidden checkbox__input',
            ]); ?>
            <?= $form->field($filter, 'isRemote', [
                'options' => [],
                'checkboxTemplate' => Html::beginTag('label', ['class' => 'checkbox__legend']) . "{input}" . Html::tag('span', "{labelTitle}") . Html::endTag('label'),
            ])->checkbox([
                'uncheck' => null,
                'class' => 'visually-hidden checkbox__input',
            ]); ?>
        </fieldset>
        <?= $form->field($filter, 'period', [
            'options' => [
                'class' => 'field-container',
            ],
            'labelOptions' => ['class' => 'search-task__name'],
            'template' => "{label}\n{input}"
        ])->dropDownList($filter->getPeriodMap(), ['class' => 'multiple-select input']); ?>
        <?= $form->field($filter, 'name', [
            'options' => [
                'class' => 'field-container',
            ],
            'labelOptions' => ['class' => 'search-task__name'],
            'template' => "{label}\n{input}"
        ])->textInput(['class' => 'input-middle input']); ?>
        <?= Html::submitButton('Искать', ['class' => 'button']); ?>

        <?php ActiveForm::end(); ?>
    </div>
</section>
