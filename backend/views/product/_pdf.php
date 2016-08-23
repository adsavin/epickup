<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Products'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Product').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'code',
        'name',
        'description:ntext',
        [
                'attribute' => 'unit.name',
                'label' => Yii::t('app', 'Unit')
            ],
        'active',
        'logo',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerShopBranchHasProduct->totalCount){
    $gridColumnShopBranchHasProduct = [
        ['class' => 'yii\grid\SerialColumn'],
        [
                'attribute' => 'shopBranch.name',
                'label' => Yii::t('app', 'Shop Branch')
            ],
                'price',
        'start_date',
        'end_date',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerShopBranchHasProduct,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Shop Branch Has Product')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnShopBranchHasProduct
    ]);
}
?>
    </div>
</div>
