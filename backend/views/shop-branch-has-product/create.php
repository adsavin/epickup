<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopBranchHasProduct */

$this->title = Yii::t('app', 'Create Shop Branch Has Product');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Branch Has Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-branch-has-product-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
