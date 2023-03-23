<?php

use yii\helpers\Html;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\ArticleSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Статьи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'spec',
            'announcement:ntext',
            'thumb_name',
            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {view} {delete}',
                'buttons' => [
                    'delete' => function ($url, $model) {
                        return Html::a('<i class="bi bi-trash"></i>', null, [
                            'data-bs-target' => '#deleteModal',
                            'data-bs-toggle' => 'modal',
                            'data-bs-id' => $model['id']
                        ]);
                    },
                ]
            ],
        ],
    ]); ?>


</div>

<?php include "partials/delete_popup.php"; ?>
