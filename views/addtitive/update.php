<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Additive $model */

$this->title = 'Редактировать: ' . $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Additives', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="additive-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
