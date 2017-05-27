<?php

use yii\db\Migration;

/**
 * Handles the creation of table `chater`.
 */
class m170521_133336_create_chapter_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('chapter', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->text(),
            'date' => $this->date(),
            'viewed' => $this->integer(),
            'book_id' => $this->integer(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('chapter');
    }
}
