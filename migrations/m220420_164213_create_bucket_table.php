<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%bucket}}`.
 */
class m220420_164213_create_bucket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%bucket}}', [
            'id'         => $this->primaryKey(),
            'session_id' => $this->string()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('fk-bucket-product', '{{%bucket}}', 'product_id', '{{%product}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-bucket-product', '{{%bucket}}');
        $this->dropTable('{{%bucket}}');
    }
}
