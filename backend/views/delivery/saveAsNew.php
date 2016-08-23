<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Delivery */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Delivery',
]). ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Deliveries'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="delivery-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
