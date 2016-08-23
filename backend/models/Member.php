<?php

namespace app\models;

use \app\models\base\Member as BaseMember;

/**
 * This is the model class for table "member".
 */
class Member extends BaseMember
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return array_replace_recursive(parent::rules(),
	    [
            [['username', 'email', 'birthdate', 'register_date', 'status', 'picture'], 'required'],
            [['birthdate', 'register_date'], 'safe'],
            [['status', 'address'], 'string'],
            [['latitude', 'longitude'], 'number'],
            [['username', 'tel'], 'string', 'max' => 45],
            [['email', 'picture'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique']
        ]);
    }
	
}
