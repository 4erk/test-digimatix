<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220420_163840_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id'         => $this->primaryKey(),
            'name'       => $this->string()->notNull(),
            'count'      => $this->integer()->notNull()->defaultValue(0),
            'catalog_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('fk-product-catalog', '{{%product}}', 'catalog_id', '{{%catalog}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-product-catalog', '{{%product}}');
        $this->dropTable('{{%product}}');

    }
}
