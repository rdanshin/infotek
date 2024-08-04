<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%subsribers}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%authors}}`
 */
class m240801_222352_create_subscribers_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%subscribers}}', [
            'id' => $this->primaryKey(),
            'author_id' => $this->integer(),
            'phone' => $this->string()->notNull(),
        ]);

        // creates index for column `author_id`
        $this->createIndex(
            '{{%idx-subscribers-author_id}}',
            '{{%subscribers}}',
            'author_id'
        );

        // add foreign key for table `{{%authors}}`
        $this->addForeignKey(
            '{{%fk-subscribers-author_id}}',
            '{{%subscribers}}',
            'author_id',
            '{{%authors}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%authors}}`
        $this->dropForeignKey(
            '{{%fk-subsribers-author_id}}',
            '{{%subscribers}}'
        );

        // drops index for column `author_id`
        $this->dropIndex(
            '{{%idx-subsribers-author_id}}',
            '{{%subscribers}}'
        );

        $this->dropTable('{{%subscribers}}');
    }
}
