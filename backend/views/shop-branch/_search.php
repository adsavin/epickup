<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBranchSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="form-shop-branch-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id', ['template' => '{input}'])->textInput(['style' => 'display:none']); ?>

    <?= $form->field($model, 'code')->textInput(['maxlength' => true, 'placeholder' => 'Code']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true, 'placeholder' => 'Name']) ?>

    <?= $form->field($model, 'tel')->textInput(['maxlength' => true, 'placeholder' => 'Tel']) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true, 'placeholder' => 'Email']) ?>

    <?php /* echo $form->field($model, 'opening_time')->textInput(['maxlength' => true, 'placeholder' => 'Opening Time']) */ ?>

    <?php /* echo $form->field($model, 'closing_time')->textInput(['maxlength' => true, 'placeholder' => 'Closing Time']) */ ?>

    <?php /* echo $form->field($model, 'shop_branch_id')->widget(\kartik\widgets\Select2::classname(), [
        'data' => \yii\helpers\ArrayHelper::map(\app\models\Shop::find()->orderBy('id')->asArray()->all(), 'id', 'name'),
        'options' => ['placeholder' => Yii::t('app', 'Choose Shop')],
        'pluginOptions' => [
            'allowClear' => true
        ],
    ]); */ ?>

    <?php /* echo $form->field($model, 'address')->textarea(['rows' => 6]) */ ?>

    <?php /* echo $form->field($model, 'active')->dropDownList([ 'Y' => 'Y', 'N' => 'N', ], ['prompt' => '']) */ ?>

    <?php /* echo $form->field($model, 'latitude')->textInput(['placeholder' => 'Latitude']) */ ?>

    <?php /* echo $form->field($model, 'longitude')->textInput(['placeholder' => 'Longitude']) */ ?>

    <?php /* echo $form->field($model, 'bank_account')->textInput(['maxlength' => true, 'placeholder' => 'Bank Account']) */ ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
