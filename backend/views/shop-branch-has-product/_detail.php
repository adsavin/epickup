<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use kartik\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\ShopBranchHasProduct */

?>
<div class="shop-branch-has-product-view">

    <div class="row">
        <div class="col-sm-9">
            <h2><?= Html::encode($model->shop_branch_id) ?></h2>
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
</div>