<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ShopBranch */

$this->title = Yii::t('app', 'Create Shop Branch');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Branches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-branch-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
