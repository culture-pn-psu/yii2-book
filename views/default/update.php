<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model culturePnPsu\book\models\Book */

$this->title = Yii::t('book', 'Update {modelClass}: ', [
    'modelClass' => 'Book',
]) . $model->title;
$this->params['breadcrumbs'][] = ['label' => Yii::t('book', 'Books'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('book', 'Update');
?>
<div class="book-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
