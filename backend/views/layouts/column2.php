<?php

use yii\widgets\Menu;

$this->beginContent('@app/views/layouts/main.php');
?>
<div class="row-fluid">
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-list-alt fa-2x"></i> <span class="fa-2x">Menu</span>
            </div>
            <div class="panel-body">
                <?php
                echo Menu::widget([
                    'items' => [
                        // Important: you need to specify url as 'controller/action',
                        // not just as 'controller' even if default action is used.
                        ['label' => 'Home', 'url' => ['site/index']],
                        // 'Products' menu item will be selected as long as the route is 'product/index'
                        ['label' => 'Products', 'url' => ['product/index']],
                    ],
                    'options' => [
                        'class' => 'nav nav-pills nav-stacked'
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="col-md-10">
        <?php echo $content; ?>
    </div>
</div>
<?php
$this->endContent();
