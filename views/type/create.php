<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model culturePnPsu\book\models\BookType */

$this->title = Yii::t('culture/book', 'Create Book Type');
$this->params['breadcrumbs'][] = ['label' => Yii::t('culture/book', 'Book Types'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="book-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
