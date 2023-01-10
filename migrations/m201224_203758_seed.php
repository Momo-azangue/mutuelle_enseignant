<?php

use app\models\Administrator;
use app\models\User;
use yii\db\Migration;

/**
 * Class m201224_203758_seed
 */
class m201224_203758_seed extends Migration
{
    /**
     * {@inheritdoc}
     * @throws \yii\base\Exception
     */
    public function safeUp()
    {
        $user = new User();
        $user->password = (new \yii\base\Security())->generatePasswordHash("root");
        $user->name = "root";
        $user->first_name = "root";
        $user->tel = "00000";
        $user->email = "root@root.root";
        $user->type = "ADMINISTRATOR";
        $user->save();


        $administrator = new Administrator();
        $administrator->user_id = $user->id;
        $administrator->username = "root";
        $administrator->root = true;
        $administrator->save();


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m201224_203758_seed cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m201224_203758_seed cannot be reverted.\n";

        return false;
    }
    */
}
