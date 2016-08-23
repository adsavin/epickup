<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Shop */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Shops'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shop-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Yii::t('app', 'Shop').' '. Html::encode($this->title) ?></h2>
        </div>
    </div>

    <div class="row">
<?php 
    $gridColumn = [
        ['attribute' => 'id', 'visible' => false],
        'code',
        'name',
        'logo',
        'created_date',
    ];
    echo DetailView::widget([
        'model' => $model,
        'attributes' => $gridColumn
    ]); 
?>
    </div>
    
    <div class="row">
<?php
if($providerShopBranch->totalCount){
    $gridColumnShopBranch = [
        ['class' => 'yii\grid\SerialColumn'],
        ['attribute' => 'id', 'visible' => false],
        'code',
        'name',
        'tel',
        'email:email',
        'opening_time',
        'closing_time',
                'address:ntext',
        'active',
        'latitude',
        'longitude',
        'bank_account',
    ];
    echo Gridview::widget([
        'dataProvider' => $providerShopBranch,
        'panel' => [
            'type' => GridView::TYPE_PRIMARY,
            'heading' => Html::encode(Yii::t('app', 'Shop Branch')),
        ],
        'panelHeadingTemplate' => '<h4>{heading}</h4>{summary}',
        'toggleData' => false,
        'columns' => $gridColumnShopBranch
    ]);
}
?>
    </div>
</div>
