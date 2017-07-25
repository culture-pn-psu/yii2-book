<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel culturePnPsu\book\models\BookSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('book', 'Books');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a(Yii::t('book', 'Create Book'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
<<<<<<< HEAD
            'image',
            'title',
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
            'created_by',
=======
            'title',
            //'detail:ntext',
            'book_type_id',
            'path',
            // 'image',
            // 'status',
            //'create_date',
            // [
            //     'attribute'=> 'create_date',
            //     'value'=>function($model){
            //         return strtotime($model->create_date);
            //     }
            // ],
             'created_at:datetime',
            // 'created_by',
>>>>>>> dc4ca8ef25d66f3e569da4706965e7fe10578c53
            // 'updated_at',
            // 'updated_by',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
