<?php

use app\models\Authors;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Books $model */
/** @var int[] $authors */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="books-form">

    <?php $form = ActiveForm::begin(['options'=>['enctype'=>'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true])->label('Название') ?>

    <?= $form->field($model, 'year')->textInput()->label('Год выпуска') ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6])->label('Описание') ?>

    <?= $form->field($model, 'isbn')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'cover')->fileInput(['maxlength' => true])->label('Фото главной страницы') ?>

    <?= $form->field($authors, 'id')->listBox(
            Authors::find()->select('name, id')->indexBy('id')->column(),
            ['multiple' =>true]
    )->label('Авторы') ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
