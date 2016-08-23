<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBranchHasProduct */

$this->title = $model->shop_branch_id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Branch Has Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-branch-has-product-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Shop Branch Has Product').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
                'attribute' => 'shopBranch.name',
                'label' => Yii::t('app', 'Shop Branch')
            ],
        [
                'attribute' => 'product.name',
                'label' => Yii::t('app', 'Product')
            ],
        'price',
        'start_date',
        'end_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerOrderDetail->totalCount){
    $gridColumnOrderDetail = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        [
                'attribute' => 'order.id',
                'label' => Yii::t('app', 'Order')
            ],
                'product_id',
        'amount',
        'total',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrderDetail,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Order Detail')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnOrderDetail
    ]);
}
?>
    </div>
</div>
