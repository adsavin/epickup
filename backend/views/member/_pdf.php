<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Member */

$this->title = $model->username;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Members'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="member-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Member').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'username',
        'email:email',
        'birthdate',
        'tel',
        'register_date',
        'status',
        'picture',
        'address:ntext',
        'latitude',
        'longitude',
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
                'attribute' => 'shopBranch.name',
                'label' => Yii::t('app', 'Shop Branch')
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
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Order')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnOrder
    ]);
}
?>
    </div>
</div>
