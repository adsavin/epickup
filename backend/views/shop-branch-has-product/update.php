<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBranchHasProduct */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Shop Branch Has Product',
]) . ' ' . $model->shop_branch_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Branch Has Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->shop_branch_id, 'url' => ['view', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="shop-branch-has-product-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
