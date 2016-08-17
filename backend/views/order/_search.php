<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_date') ?>

    <?= $form->field($model, 'total_amount') ?>

    <?= $form->field($model, 'status') ?>

    <?= $form->field($model, 'shop_branch_id') ?>

    <?php // echo $form->field($model, 'member_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'process_date') ?>

    <?php // echo $form->field($model, 'ready_date') ?>

    <?php // echo $form->field($model, 'sending_date') ?>

    <?php // echo $form->field($model, 'completed_date') ?>

    <?php // echo $form->field($model, 'need_delivery') ?>

    <?php // echo $form->field($model, 'delivery_latitude') ?>

    <?php // echo $form->field($model, 'delivery_longitude') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
