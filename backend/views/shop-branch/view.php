<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBranch */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shop Branches'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-branch-view">

    <div class="row">
        <div class="col-sm-8">
            <h2><?= Yii::t('app', 'Shop Branch').' '. Html::encode($this->title) ?></h2>
        </div>
        <div class="col-sm-4" style="margin-top: 15px">
<?=             
             Html::a('<i class="fa glyphicon glyphicon-hand-up"></i> ' . Yii::t('app', 'PDF'), 
                ['pdf', 'id' => $model->id],
                [
                    'class' => 'btn btn-danger',
                    'target' => '_blank',
                    'data-toggle' => 'tooltip',
                    'title' => Yii::t('app', 'Will open the generated PDF file in a new window')
                ]
            )?>
            <?= Html::a(Yii::t('app', 'Save As New'), ['save-as-new', 'id' => $model->id], ['class' => 'btn btn-info']) ?>            
            <?= Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
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
    
    <div class="row">
<?php
if($providerOrder->totalCount){
    $gridColumnOrder = [
        ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'id', 'visible' => false],
            'order_date',
            'total_amount',
            'status',
                        [
                'attribute' => 'member.username',
                'label' => Yii::t('app', 'Member')
            ],
            [
                'attribute' => 'user.username',
                'label' => Yii::t('app', 'User')
            ],
            'process_date',
            'ready_date',
            'sending_date',
            'completed_date',
            'need_delivery',
            'delivery_latitude',
            'delivery_longitude',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerOrder,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-order']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Order')),
        ],
        'columns' => $gridColumnOrder
    ]);
}
?>
    </div>
    
    <div class="row">
<?php
if($providerShopBranchHasProduct->totalCount){
    $gridColumnShopBranchHasProduct = [
        ['class' => 'yii\grid\SerialColumn'],
                        [
                'attribute' => 'product.name',
                'label' => Yii::t('app', 'Product')
            ],
            'price',
            'start_date',
            'end_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerShopBranchHasProduct,
        'pjax' => true,
        'pjaxSettings' => ['options' => ['id' => 'kv-pjax-container-shop-branch-has-product']],
        'panel' => [
        'type' => GridView::TYPE_PRIMARY,
        'heading' => '<span class="glyphicon glyphicon-book"></span> ' . Html::encode(Yii::t('app', 'Shop Branch Has Product')),
        ],
        'columns' => $gridColumnShopBranchHasProduct
    ]);
}
?>
    </div>
</div>