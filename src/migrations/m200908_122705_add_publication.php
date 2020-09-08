<?php

use yii\db\Migration;

/**
 * Class m200908_122705_add_publication
 */
class m200908_122705_add_publication extends Migration
{
    public function safeUp()
    {
        $this->addColumn('{{%setting}}', 'is_publish', $this->boolean()->defaultValue(true));
    }

    public function safeDown()
    {
        $this->dropColumn('{{%setting}}', 'is_publish');
    }
}
