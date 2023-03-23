<?php

use mihaildev\ckeditor\CKEditor;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Article $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'class' => 'js-ajax-form'
        ]
    ]); ?>

    <?= $form->field($model, 'spec')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'announcement')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => [
            'preset' => 'full',
            'inline' => false,
        ],
    ]) ?>

    <?= $form->field($model, 'thumb_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

    <div id="summernote"></div>
    <script>

    </script>

</div>
