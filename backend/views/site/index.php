<?php
/* @var $this yii\web\View */

use app\components\DashboardItemWidget;

$this->title = 'ePickUp - Main';
?>

<div class="row-fluid">
    <?=
    DashboardItemWidget::widget([
        "icon" => 'user',
        'label' => 'User',
        'url' => ["/user"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'diamond',
        'label' => 'Product',
        'url' => ["/product"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'tree',
        'label' => 'Branch',
        'url' => ["/branch"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'home',
        'label' => 'Shop',
        'url' => ["/shop"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'gear',
        'label' => 'Unit',
        'url' => ["/unit"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'send',
        'label' => 'Delivery',
        'url' => ["/delivery"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'users',
        'label' => 'Member',
        'url' => ["/member"]
    ]);
    ?>
    <?=
    DashboardItemWidget::widget([
        "icon" => 'list-ol',
        'label' => 'Order',
        'url' => ["/order"]
    ]);
    ?>
</div>