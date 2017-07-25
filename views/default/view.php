<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model culturePnPsu\book\models\Book */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('culture/book', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('culture/book', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a(Yii::t('culture/book', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('culture/book', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>
    
    <div class="row">
        <div class="col-sm-3 text-center">
            <?=Html::img($model->getUploadUrl('image'),['style'=>'width:100%;','class'=>'img-thumbnail'])?>
        </div>
        <div class="col-sm-9">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    //'id',
                    'title',
                    'author',
                    'number',
                    'detail:html',
                    [
                        'attribute' => 'book_type_id',
                        'value' => $model->bookType->title
                    ],
                    //'path',
                    //'image',
                    'status',
                    //'create_date',
                    'created_at:datetime',
                    'created_by',
                    'updated_at:datetime',
                    'updated_by',
                ],
            ]) ?>
        </div>
    </div>
</div>
