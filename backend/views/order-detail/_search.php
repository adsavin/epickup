<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\OrderDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'order_id') ?>

    <?= $form->field($model, 'shop_branch_id') ?>

    <?= $form->field($model, 'product_id') ?>

    <?= $form->field($model, 'amount') ?>

    <?php // echo $form->field($model, 'total') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
