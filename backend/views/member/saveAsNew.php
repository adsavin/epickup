<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = Yii::t('app', 'Save As New {modelClass}: ', [
    'modelClass' => 'Member',
]). ' ' . $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->username, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Save As New');
?>
<div class="member-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
    'model' => $model,
    ]) ?>

</div>
