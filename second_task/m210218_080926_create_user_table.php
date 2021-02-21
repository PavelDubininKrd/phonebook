<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m210218_080926_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%user}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'surname'=> $this->string()->notNull(),
            'patronymic' => $this->string(),
            'last_update' => $this->date(),
        ]);

        $this->batchInsert('{{%user}}', ['name','surname','patronymic','last_update'], [
            ['name0', 'surname0','patronymic0',date('Y-m-d')],
            ['name1', 'surname1','patronymic1',date('Y-m-d')]
            ]
        );
    }



    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%user}}');
    }
}
