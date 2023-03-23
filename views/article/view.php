<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Article $model */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Articles', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="article-view">

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
                'data-bs-id' => $model['id']
            ])
        ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'spec',
            'announcement:ntext',
            'content:ntext',
            'thumb_name',
            'updater_id',
            'update_time',
            'creator_id',
            'create_time',
        ],
    ]) ?>

</div>

<?php include "partials/delete_popup.php"; ?>
