<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\tinymce\TinyMce;
/* @var $this yii\web\View */
/* @var $model frontend\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'ID')->textInput() ?>

    <?= $form->field($model, 'Titulo')->textInput(['maxlength' => true]) ?>

    <!--?= $form->field($model, 'Texto')->textarea(['rows' => 6]) ?-->

    <?= $form->field($model, 'Texto')->widget(TinyMce::className(), [ 'options' => ['rows' => 6], 'language' => 'es', 'clientOptions' => [ 'plugins' => [ "advlist autolink lists link charmap print preview anchor", "searchreplace visualblocks code fullscreen", "insertdatetime media table contextmenu paste" ], 'toolbar' => "undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image" ] ]);?>

    <?= $form->field($model, 'Publicar')->textInput() ?>

    <?= $form->field($model, 'Fecha_creacion')->textInput() ?>

    <?= $form->field($model, 'Fecha_edicion')->textInput() ?>

    <!--?= $form->field($model, 'idAutor')->textInput() ?-->

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
