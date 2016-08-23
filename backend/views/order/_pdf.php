<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Order */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Order').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'order_date',
        'total_amount',
        'status',
        [
                'attribute' => 'shopBranch.name',
                'label' => Yii::t('app', 'Shop Branch')
            ],
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
                'attribute' => 'shopBranch.shop_branch_id',
                'label' => Yii::t('app', 'Shop Branch')
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
