<?php
/* @var $this yii\web\View */

use app\components\DashboardItemWidget;

$this->title = 'ePickUp - Main';
?>

<div class="row-fluid fa-support">
    <?=
    DashboardItemWidget::widget([
        "icon" => 'user',
        'label' => 'User',
        'url' => ["/user"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'support',
        'label' => 'Product'
    ]);
    ?>
</div>