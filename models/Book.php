<?php

namespace culturePnPsu\book\models;

use Yii;

use mongosoft\file\UploadBehavior;
use yii\behaviors\BlameableBehavior;
use yii\behaviors\TimestampBehavior;
use yii\data\ActiveDataProvider;

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
    function behaviors()
    {
        return [
            [
                'class' => BlameableBehavior::className(),
            ],
            [
                'class' => TimestampBehavior::className(),
            ],
            [
                'class' => UploadBehavior::className(),
                'attribute' => 'image',
                //'attributeName' => 'file_name',
                'scenarios' => ['insert', 'update'],
                'path' => '@uploads/book/{id}',
                'url' => '/uploads/book/{id}',
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'detail', 'book_type_id' ], 'required'],
            [['detail'], 'string'],
            [['book_type_id', 'number', 'status', 'created_at', 'created_by', 'updated_at', 'updated_by'], 'integer'],
            //[['create_date'], 'safe'],
            [['title', 'author'], 'string', 'max' => 255],
            [['path'], 'string', 'max' => 100],
            ['image', 'file', 'extensions' => 'png, jpg', 'on' => ['insert', 'update']],
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
            'author' => Yii::t('book', 'Author'),
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
    
     public function getCreatedBy()
    {
        return $this->hasOne(\culturePnPsu\user\models\User::className(), ['id' => 'created_by']);
    }
    
    public static function getForIndex($pageSize=8) {
        $query = self::find();
        $provider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $pageSize,
            ],
            'sort' => [
                'defaultOrder' => [
                    'created_at' => SORT_DESC,
                    'title' => SORT_ASC,
                ]
            ],
        ]);

        return $provider;
    }
}
