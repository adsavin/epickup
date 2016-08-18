<?php

namespace app\components;

/**
 * Description of DashboardItemWidget
 *
 * @author Adsavin
 */
class DashboardItemWidget extends \yii\bootstrap\Widget
{

    public $icon;
    public $label;
    public $url;

    public function init()
    {
        parent::init();
        $this->label = \Yii::t('app', $this->label);
    }

    public function run()
    {
        return $this->render("dashboarditem", [
                    "icon" => $this->icon,
                    "label" => $this->label,
                    "url" => $this->url
        ]);
    }

}
