<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $year
 * @property string|null $description
 * @property string|null $isbn
 * @property string|null $cover
 *
 * @property Authors[] $authors
 * @property BooksAuthors[] $booksAuthors
 */
class Books extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'books';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['year'], 'integer'],
            [['description'], 'string'],
            [['title', 'isbn', 'cover'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'year' => 'Year',
            'description' => 'Description',
            'isbn' => 'Isbn',
            'cover' => 'Cover',
            'authors' => 'Authors'
        ];
    }

    /**
     * Gets query for [[Authors]].
     *
     * @return ActiveQuery
     */
    public function getAuthors()
    {
        return $this->hasMany(Authors::class, ['id' => 'authors_id'])->viaTable('books_authors', ['books_id' => 'id']);
    }


    /**
     * Gets query for [[BooksAuthors]].
     *
     * @return ActiveQuery
     */
    public function getBooksAuthors()
    {
        return $this->hasMany(BooksAuthors::class, ['books_id' => 'id']);
    }
}
