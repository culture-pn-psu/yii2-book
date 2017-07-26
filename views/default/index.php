<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel culturePnPsu\book\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('culture/book', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('culture/book', 'Create Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',

            //'image',
            [
                'attribute' => 'image',
                'format' => 'html',
                'contentOptions'=>['width'=>100],
                'value' => function($model){
                    return Html::img($model->getUploadUrl('image'),['width'=>'100']);
                }
            ],
            'title',
            'author',
            'number',
            //'detail:ntext',
            //'book_type_id',
            [
                'attribute' => 'book_type_id',
                'value' => 'bookType.title'
            ],
            //'path',
            // 'image',
            // 'status',
            'created_at:datetime',
            //'created_by',
            [
                'attribute' => 'created_by',
                'value' => 'createdBy.displayname'
            ],

            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
