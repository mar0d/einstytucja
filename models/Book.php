<?php

namespace app\models;

use yii\db\ActiveRecord;

/**
 * This is the model class for table "books".
 *
 * @property int $id
 * @property string $author
 * @property string|null $country
 * @property string|null $imageLink
 * @property string|null $link
 * @property int|null $pages
 * @property string $title
 * @property int|null $year
 */
class Book extends ActiveRecord
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
            [['country', 'imageLink', 'link', 'pages', 'year'], 'default', 'value' => null],
            ['pages', 'integer', 'min' => 1],
            ['year', 'match', 'pattern' => '/^[1-9]{1}[0-9]{3}$/i'],
            [['author', 'title'], 'required'],
            [['author', 'country', 'imageLink', 'link', 'title'], 'string', 'min' => 2, 'max' => 255],
            [['imageLink', 'link'], 'url'],
            [['author', 'title'], 'unique', 'targetAttribute' => ['author', 'title']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author' => 'Autor',
            'country' => 'Kraj',
            'imageLink' => 'Link do grafiki',
            'link' => 'Link',
            'pages' => 'Liczba stron',
            'title' => 'Tytuł',
            'year' => 'Rok',
        ];
    }
}
