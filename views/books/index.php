<?php

use app\models\Books;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\BooksSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Books';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="books-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(!Yii::$app->user->isGuest): ?>
        <p>
            <?= Html::a('Create Books', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    <?php endif; ?>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'title',
            'year',
            [
                'attribute' => 'authors',
                'value' => function ($searchModel) { return implode(', ', $searchModel->getAuthors()->select('name')->column()); }
            ],
            [
                'class' => ActionColumn::className(),
                'visibleButtons' => [
                        'update' => !Yii::$app->user->isGuest,
                        'delete' => !Yii::$app->user->isGuest
                ],
                'urlCreator' => function ($action, Books $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
