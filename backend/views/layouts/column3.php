<?php

use yii\widgets\Menu;

$this->beginContent('@app/views/layouts/main.php');
?>
<div class="row-fluid">
    <div class="col-md-2">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <i class="fa fa-list-alt fa-2x"></i> <span class="fa-2x"><?= Yii::t('app', 'Menu') ?></span>
            </div>
            <div class="panel-body">
                <?php
                echo Menu::widget([
                    'items' => [
                        // Important: you need to specify url as 'controller/action',
                        // not just as 'controller' even if default action is used.
                        ['label' => Yii::t('app', 'Home'), 'url' => ['site/index']],
                        // 'Products' menu item will be selected as long as the route is 'product/index'
                        ['label' => Yii::t('app', 'Orders'), 'url' => ['order/index']],
                        ['label' => Yii::t('app', 'Product'), 'url' => ['product/index']],
                        ['label' => Yii::t('app', 'Unit'), 'url' => ['unit/index']],
                        ['label' => Yii::t('app', 'Shop'), 'url' => ['shop/index']],
                        ['label' => Yii::t('app', 'Branch'), 'url' => ['shopbranch/index']],
                        ['label' => Yii::t('app', 'Member'), 'url' => ['member/index']],
                    ],
                    'options' => [
                        'class' => 'nav nav-pills nav-stacked'
                    ]
                ]);
                ?>
            </div>
        </div>
    </div>
    <div class="<?= isset($this->params['rightmenus']) ? 'col-md-8' : 'col-sm-10' ?>">
        <?php echo $content; ?>
    </div>
    <?php if (isset($this->params['rightmenus'])): ?>
        <div class="col-md-2">
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <i class="fa fa-list-alt fa-2x"></i> <span class="fa-2x"><?= Yii::t('app', 'Operation') ?></span>
                </div>
                <div class="panel-body">
                    <?php
                    echo Menu::widget([
                        'items' => $this->params['rightmenus'],
                        'options' => [
                            'class' => 'nav nav-pills nav-stacked'
                        ]
                    ]);
                    ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
</div>
<?php
$this->endContent();
