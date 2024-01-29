<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%books}}`.
 */
class m240127_233609_create_books_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable(
            '{{%books}}',
            [
                'id' => $this->primaryKey(),
                'author' => $this->string()->notNull(),
                'country' => $this->string(),
                'imageLink' => $this->string(),
                'link' => $this->string(),
                'pages' => $this->smallInteger(),
                'title' => $this->string()->notNull(),
                'year' => $this->smallInteger(),
            ]
        );

        $this->createIndex(
            '{{%idx-unique-book-author-title}}',
            '{{%book}}',
            ['author', 'title'],
            true
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%books}}');
    }
}
