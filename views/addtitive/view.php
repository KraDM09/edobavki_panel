<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Additive $model */

$this->title = $model->code;
$this->params['breadcrumbs'][] = ['label' => 'Additives', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="additive-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(
            Html::button('Удалить', [
                'class' => 'btn btn-danger',
            ]),
            null,
            [
                'data-bs-target' => '#deleteModal',
                'data-bs-toggle' => 'modal',
                'data-bs-id' => $model['code']
            ])
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'code',
            'spec:ntext',
            'functions:ntext',
            'in_russia:boolean',
            'appearance:ntext',
            'in_eu:boolean',
            'negative_effects:ntext',
            'seq',
            'order_number',
            'information:ntext',
            'employment:ntext',
            'extracted_from:ntext',
            'updater_id',
            'update_time',
            'creator_id',
            'create_time',
        ],
    ]) ?>

</div>

<?php include "partials/delete_popup.php"; ?>
