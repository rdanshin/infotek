<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "books_authors".
 *
 * @property int $books_id
 * @property int $authors_id
 *
 * @property Authors $authors
 * @property Books[] $books
 * @property Books $books0
 */
class BooksAuthors extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books_authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['books_id', 'authors_id'], 'required'],
            [['books_id', 'authors_id'], 'integer'],
            [['books_id', 'authors_id'], 'unique', 'targetAttribute' => ['books_id', 'authors_id']],
            [['authors_id'], 'exist', 'skipOnError' => true, 'targetClass' => Authors::class, 'targetAttribute' => ['authors_id' => 'id']],
            [['books_id'], 'exist', 'skipOnError' => true, 'targetClass' => Books::class, 'targetAttribute' => ['books_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'books_id' => 'Books ID',
            'authors_id' => 'Authors ID',
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasOne(Authors::class, ['id' => 'authors_id']);
    }

    /**
     * Gets query for [[Books]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['author_id' => 'books_id']);
    }

    /**
     * Gets query for [[Books0]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBooks0()
    {
        return $this->hasOne(Books::class, ['id' => 'books_id']);
    }
}
