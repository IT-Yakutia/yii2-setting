<?php

use yii\db\Migration;

/**
 * Class m200623_004419_add_role
 */
class m200623_004419_add_role extends Migration
{
    public function safeUp()
    {
        $auth = Yii::$app->authManager;

        $settingRedactor = $auth->getPermission('settings');
        if($settingRedactor != null || $settingRedactor != false){
            $settingRedactor = $auth->createPermission('settings');
            $settingRedactor->description = 'Редактирование настроек';
            $auth->add($settingRedactor);
        }

        $operator = $auth->getRole('operator');
        if($operator != null || $operator != false)
            $auth->addChild($operator,$settingRedactor);
    }

    public function safeDown()
    {
        $auth = Yii::$app->authManager;
        $settingRedactor = $auth->getPermission('settings');
        if($settingRedactor != null || $settingRedactor != false)
            $auth->remove($settingRedactor);
        
    }
}
