<?php

use yii\db\Migration;

/**
 * Class m200925_155742_news
 */
class m200925_155742_news extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('news',[
            'id' => $this->primaryKey(),
            'alias' => $this->string(),
            'title' => $this->string()->notNull(),
            'description' => $this->string(),
            'text' => $this->text(),
            'date_create' => $this->dateTime(),
            'date_update' => $this->dateTime()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('news');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200925_155742_news cannot be reverted.\n";

        return false;
    }
    */
}
