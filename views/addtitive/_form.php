<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\Additive $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="additive-form">

    <?php Pjax::begin(); ?>
    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'js-ajax-form'
        ]
    ]); ?>

    <?= $form->field($model, 'code')->textInput(['readonly' => true]) ?>

    <?= $form->field($model, 'spec')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'functions')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'in_russia')->textInput() ?>

    <?= $form->field($model, 'appearance')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'in_eu')->textInput() ?>

    <?= $form->field($model, 'negative_effects')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'seq')->textInput() ?>

    <?= $form->field($model, 'order_number')->textInput() ?>

    <?= $form->field($model, 'employment')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'extracted_from')->textInput(['rows' => 6]) ?>

    <?= $form->field($model, 'creator_id')->textInput() ?>

    <?= $form->field($model, 'create_time')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php Pjax::end(); ?>

</div>
