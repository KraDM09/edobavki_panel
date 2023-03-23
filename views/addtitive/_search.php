<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\AddtitiveSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="additive-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'code') ?>

    <?= $form->field($model, 'spec') ?>

    <?= $form->field($model, 'functions') ?>

    <?= $form->field($model, 'in_russia') ?>

    <?php // echo $form->field($model, 'appearance') ?>

    <?php // echo $form->field($model, 'in_eu') ?>

    <?php // echo $form->field($model, 'negative_effects') ?>

    <?php // echo $form->field($model, 'seq') ?>

    <?php // echo $form->field($model, 'order_number') ?>

    <?php // echo $form->field($model, 'information') ?>

    <?php // echo $form->field($model, 'employment') ?>

    <?php // echo $form->field($model, 'extracted_from') ?>

    <?php // echo $form->field($model, 'updater_id') ?>

    <?php // echo $form->field($model, 'update_time') ?>

    <?php // echo $form->field($model, 'creator_id') ?>

    <?php // echo $form->field($model, 'create_time') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
