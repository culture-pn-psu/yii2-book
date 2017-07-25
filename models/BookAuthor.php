<?php

namespace culturePnPsu\book\models;

use Yii;

/**
 * This is the model class for table "book_author".
 *
 * @property integer $id
 * @property string $name
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property Book[] $books
 */
class BookAuthor extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book_author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('book', 'ID'),
            'name' => Yii::t('book', 'Name'),
            'created_at' => Yii::t('book', 'Created At'),
            'created_by' => Yii::t('book', 'Created By'),
            'updated_at' => Yii::t('book', 'Updated At'),
            'updated_by' => Yii::t('book', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBooks()
    {
        return $this->hasMany(Book::className(), ['book_author_id' => 'id']);
    }
}
