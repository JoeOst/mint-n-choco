<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "chapter".
 *
 * @property integer $id
 * @property string $title
 * @property string $text
 * @property string $date
 * @property integer $viewed
 * @property integer $book_id
 * @property integer $status
 *
 * @property Book $book
 */
class Chapter extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'chapter';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['text'], 'required'],
            [['book_id'], 'required'],
            [['book_id'], 'integer'],
            [['title', 'text'], 'string'],
            [['date'], 'date','format'=>'php:Y-m-d'],
            [['date'], 'default','value'=>date('Y-m-d')],
            [['status'], 'integer'],
            [['status'], 'default', 'value'=>'0'],
            [['title'], 'string', 'max'=>255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Назва',
            'text' => 'Текст',
            'date' => 'Дата',
            'viewed' => 'Перегляди',
            'book_id' => 'Book ID',
            'status' => 'Статус',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBook()
    {
        return $this->hasOne(Book::className(), ['id' => 'book_id']);
    }
}
