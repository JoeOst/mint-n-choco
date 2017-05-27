<?php

namespace app\models;

use Yii;
use yii\data\Pagination;

/**
 * This is the model class for table "genre".
 *
 * @property integer $id
 * @property string $title
 *
 * @property BookGenre[] $bookGenres
 */
class Genre extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'genre';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
        ];
    }

    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['id' => 'book_id'])
            ->viaTable('book_genre', ['genre_id' => 'id']);
    }

    public static function getAll() {
        return Genre::find()->all();
    }

    public static function getCurrentGenre($id) {
        return Genre::findOne($id);
    }

    public static function getBooksByGenre($id) {
        // build a DB query to get all articles
        $query = Book::find()->innerJoin('book_genre', '`book_genre`.`book_id` = `book`.`id`')->innerJoin('genre', '`book_genre`.`genre_id` = `genre`.`id`')->where(['genre_id'=> $id]);


        // get the total number of articles (but do not fetch the article data yet)
        $count = $query->count();

        // create a pagination object with the total count
        $pagination = new Pagination(['totalCount' => $count, 'pageSize' => 2]);

        // limit the query using the pagination and retrieve the articles
        $books = $query->offset($pagination->offset)
            ->limit($pagination->limit)
            ->all();

        $data['books'] = $books;
        $data['pagination'] = $pagination;

        return $data;
    }
}
