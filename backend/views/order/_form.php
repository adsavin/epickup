<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Order */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_date')->textInput() ?>

    <?= $form->field($model, 'total_amount')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->dropDownList([ 'Waiting' => 'Waiting', 'Processing' => 'Processing', 'Ready' => 'Ready', 'Sending' => 'Sending', 'Completed' => 'Completed', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'shop_branch_id')->textInput() ?>

    <?= $form->field($model, 'member_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'process_date')->textInput() ?>

    <?= $form->field($model, 'ready_date')->textInput() ?>

    <?= $form->field($model, 'sending_date')->textInput() ?>

    <?= $form->field($model, 'completed_date')->textInput() ?>

    <?= $form->field($model, 'need_delivery')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'delivery_latitude')->textInput() ?>

    <?= $form->field($model, 'delivery_longitude')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
