<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "book_genre".
 *
 * @property integer $id
 * @property integer $book_id
 * @property integer $genre_id
 *
 * @property Genre $genre
 * @property Book $book
 */
class BookGenre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['book_id', 'genre_id'], 'integer'],
            [['genre_id'], 'exist', 'skipOnError' => true, 'targetClass' => Genre::className(), 'targetAttribute' => ['genre_id' => 'id']],
            [['book_id'], 'exist', 'skipOnError' => true, 'targetClass' => Book::className(), 'targetAttribute' => ['book_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'book_id' => 'Book ID',
            'genre_id' => 'Genre ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGenre()
    {
        return $this->hasOne(Genre::className(), ['id' => 'genre_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
