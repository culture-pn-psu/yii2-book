<?php

namespace culturePnPsu\book\models;

use Yii;

/**
 * This is the model class for table "book".
 *
 * @property integer $id
 * @property string $title
 * @property string $detail
 * @property integer $book_type_id
 * @property string $path
 * @property string $image
 * @property integer $status
 * @property string $create_date
 * @property integer $created_at
 * @property integer $created_by
 * @property integer $updated_at
 * @property integer $updated_by
 *
 * @property BookType $bookType
 */
class Book extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'book';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'detail', 'book_type_id', 'image', 'status'], 'required'],
            [['detail'], 'string'],
            [['book_type_id', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            //[['create_date'], 'safe'],
            [['title', 'image'], 'string', 'max' => 255],
            [['path'], 'string', 'max' => 100],
            [['book_type_id'], 'exist', 'skipOnError' => true, 'targetClass' => BookType::className(), 'targetAttribute' => ['book_type_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('book', 'ID'),
            'title' => Yii::t('book', 'Title'),
            'detail' => Yii::t('book', 'Detail'),
            'book_type_id' => Yii::t('book', 'Book Type ID'),
            'path' => Yii::t('book', 'Path'),
            'image' => Yii::t('book', 'Image'),
            'status' => Yii::t('book', 'Status'),
            //'create_date' => Yii::t('book', 'Create Date'),
            'created_at' => Yii::t('book', 'Created At'),
            'created_by' => Yii::t('book', 'Created By'),
            'updated_at' => Yii::t('book', 'Updated At'),
            'updated_by' => Yii::t('book', 'Updated By'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getBookType()
    {
        return $this->hasOne(BookType::className(), ['id' => 'book_type_id']);
    }
}
