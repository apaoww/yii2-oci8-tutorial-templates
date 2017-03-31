<?php

use apaoww\oci8\Schema;
use yii\db\Migration;

class m130524_201442_create_table_employee extends Migration
{
    public function up()
    {

        $this->createTable('{{%employee}}', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' DEFAULT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('{{%employee}}');
    }
}
