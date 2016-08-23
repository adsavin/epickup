<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBranch */

?>
<div class="shop-branch-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->name) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'code',
        'name',
        'tel',
        'email:email',
        'opening_time',
        'closing_time',
        [
            'attribute' => 'shopBranch.name',
            'label' => Yii::t('app', 'Shop Branch'),
        ],
        'address:ntext',
        'active',
        'latitude',
        'longitude',
        'bank_account',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
</div>