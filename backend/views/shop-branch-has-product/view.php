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
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Shop Branch Has Product').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'shop_branch_id' => $model->shop_branch_id, 'product_id' => $model->product_id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                    'method' => 'post',
                ],
            ])
            ?>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        [
            'attribute' => 'shopBranch.name',
            'label' => Yii::t('app', 'Shop Branch'),
        ],
        [
            'attribute' => 'product.name',
            'label' => Yii::t('app', 'Product'),
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
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order-detail']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Order Detail')),
        ],
        'columns' => $gridColumnOrderDetail
    ]);
}
?>
    </div>
</div>