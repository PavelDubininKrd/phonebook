<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%phone_numbers}}`.
 */
class m210218_081003_create_phone_numbers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('{{%phone_numbers}}', [
            'phone_number' => $this->bigInteger()->notNull(),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column 'user_id'
        $this->createIndex(
          'idx-user_id',
            'phone_numbers',
            'user_id'
        );

        // add foreign key for table 'user'
        $this->addForeignKey(
          'fk-user_id',
          'phone_numbers',
          'user_id',
          'user',
          'id',
          'CASCADE'
        );

        $this->batchInsert('{{%phone_numbers}}', ['phone_number','user_id'], [
                [89995396000, 1],
                [89965989111, 1],
                [89965364222, 2],
                [89965755333, 2]
            ]
        );
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        $this->dropTable('{{%phone_numbers}}');
    }
}
