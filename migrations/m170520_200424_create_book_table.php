<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book`.
 */
class m170520_200424_create_book_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book', [
            'id' => $this->primaryKey(),
            'title' => $this->string(),
            'annotation' => $this->text(),
            'text' => $this->text(),
            'date' => $this->date(),
            'image' => $this->string(),
            'viewed' => $this->integer(),
            'author_id' => $this->integer(),
            'status' => $this->integer(),
            'mark' => $this->float(),
            'voted' => $this->integer(),
            'rating' => $this->float(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book');
    }
}
