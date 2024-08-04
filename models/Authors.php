<?php

namespace app\models;

use yii\base\InvalidConfigException;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "authors".
 *
 * @property int $id
 * @property string $name
 *
 * @property Books[] $books
 * @property BooksAuthors[] $booksAuthors
 * @property Subscribers[] $subscribers
 */
class Authors extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'authors';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
        ];
    }


    /**
     * Gets query for [[Books]].
     *
     * @return ActiveQuery
     * @throws InvalidConfigException
     */
    public function getBooks()
    {
        return $this->hasMany(Books::class, ['id' => 'books_id'])->viaTable('books_authors', ['authors_id' => 'id']);
    }

    /**
     * Gets query for [[BooksAuthors]].
     *
     * @return ActiveQuery
     */
    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::class, ['authors_id' => 'id']);
    }

    public function getSubscribers()
    {
        return $this->hasMany(Subscribers::class, ['author_id' => 'id']);
    }
}
