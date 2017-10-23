<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ServiceDetails */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="service-details-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'employee_id')->textInput() ?>

    <?= $form->field($model, 'services_ID')->textInput() ?>

    <?= $form->field($model, 'rooms_id')->textInput() ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <?= $form->field($model, 'time_started')->textInput() ?>

    <?= $form->field($model, 'time_ended')->textInput() ?>

    <?= $form->field($model, 'booking_type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'service_booking_id')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
