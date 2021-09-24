<?php

use frontend\models\Categories;
use frontend\models\UserFilter;
use yii\widgets\ListView;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

/** @var object $provider ActiveDataProvider
 * @var object $filter UserFilter
 * @var object $form ActiveForm
 */
?>

<section class="user__search">
    <?= ListView::widget([
        'dataProvider' => $filter->getDataProvider(),
        'itemView' => '_user'
    ]); ?>
</section>
<section class="search-task">
    <div class="search-task__wrapper">
        <?php $form = ActiveForm::begin([
            'options' => ['class' => 'search-task__form']
        ]); ?>
        <?= $form->field($filter, 'categories', [
            "template" => Html::tag('legend',"{labelTitle}") . "\n{input}",
            'options' => [
                'tag' => 'fieldset',
                'class' => 'search-task__categories',
            ]
        ])->checkboxList(Categories::getCategorisList(), [
            'unselect' => null,
            'tag' => false,
            'item' => function ($index, $label, $name, $checked, $value) {
                return Html::beginTag('label',['class' =>'checkbox__legend']) .
                    Html::checkbox($name, $checked, [
                        'class' => 'visually-hidden checkbox__input',
                        'value' => $value
                    ]) . Html::tag('span',$label) . Html::endTag('label');
            }
        ]);?>
        <fieldset class="search-task__categories">
            <legend>Дополнительно</legend>
            <?= $form->field($filter, 'isFree', [
                'options' => [],
                'checkboxTemplate' => Html::beginTag('label',['class' =>'checkbox__legend']) ."{input}".Html::tag('span',"{labelTitle}"). Html::endTag('label'),
            ])->checkbox([
                'uncheck' => null,
                'class' => 'visually-hidden checkbox__input',
            ]); ?>
            <?= $form->field($filter, 'isOnline', [
                'options' => [],
                'checkboxTemplate' => Html::beginTag('label',['class' =>'checkbox__legend']) ."{input}".Html::tag('span',"{labelTitle}"). Html::endTag('label'),
            ])->checkbox([
                'uncheck' => null,
                'class' => 'visually-hidden checkbox__input',
            ]); ?>
            <?= $form->field($filter, 'withReviews', [
                'options' => [],
                'checkboxTemplate' => Html::beginTag('label',['class' =>'checkbox__legend']) ."{input}".Html::tag('span',"{labelTitle}"). Html::endTag('label'),
            ])->checkbox([
                'uncheck' => null,
                'class' => 'visually-hidden checkbox__input',
            ]); ?>
            <?= $form->field($filter, 'favorite', [
                'options' => [],
                'checkboxTemplate' => Html::beginTag('label',['class' =>'checkbox__legend']) ."{input}".Html::tag('span',"{labelTitle}"). Html::endTag('label'),
            ])->checkbox([
                'uncheck' => null,
                'class' => 'visually-hidden checkbox__input',
            ]); ?>
        </fieldset>
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
