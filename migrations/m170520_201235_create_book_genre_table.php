<?php

use yii\db\Migration;

/**
 * Handles the creation of table `book_genre`.
 */
class m170520_201235_create_book_genre_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('book_genre', [
            'id' => $this->primaryKey(),
            'book_id'=>$this->integer(),
            'genre_id'=>$this->integer()
        ]);
        // creates index for column `user_id`
        $this->createIndex(
            'genre_book_book_id',
            'book_genre',
            'book_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'genre_book_book_id',
            'book_genre',
            'book_id',
            'book',
            'id',
            'CASCADE'
        );
        // creates index for column `user_id`
        $this->createIndex(
            'idx_genre_id',
            'book_genre',
            'genre_id'
        );
        // add foreign key for table `user`
        $this->addForeignKey(
            'fk-genre_id',
            'book_genre',
            'genre_id',
            'genre',
            'id',
            'CASCADE'
        );

    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('book_genre');
    }
}
