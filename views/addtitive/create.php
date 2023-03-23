<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Additive $model */

$this->title = 'Create Additive';
$this->params['breadcrumbs'][] = ['label' => 'Additives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="additive-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
