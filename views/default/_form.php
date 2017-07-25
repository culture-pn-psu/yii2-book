<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;
use kartik\widgets\FileInput;
use culturePnPsu\book\models\BookType;
use firdows\mkeditor\CKEditor;

/* @var $this yii\web\View */
/* @var $model culturePnPsu\book\models\Book */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="book-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'author')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detail')->widget(
                CKEditor::className(), [
            'uploadURL' => Yii::$app->img->getUploadUrl(),
            'uploadDir' => Yii::$app->img->getUploadPath(),
            'filemanager' => true, //true = enabled kcfinder, false = disabled kcfinder
            'preset' => 'full', //toolbar -> basic, standard, full
            'onChange' => true
                ]
        )
    ?>

    <?= $form->field($model, 'book_type_id')->dropDownList(BookType::getList(),['prompt'=>Yii::t('culture','Select')]) ?>
    
    <?=$model->image?>
    <?php //echo Html::img($model->getUploadUrl('image'),['style'=>'width:100;','class'=>'img-thumbnail'])?>
    
    <div class="well well-small">
        <?= $form->field($model, 'image')->widget(FileInput::classname(), [
            'options' => ['accept' => ['image/*']],
            'pluginOptions' => [
              'previewFileType' => 'image',
              'elCaptionText' => '#customCaption',
              //'uploadUrl' => Url::to(['/edoc/default/file-upload']),
              'showPreview' => false,
              'showCaption' => true,
              'showRemove' => true,
              'showUpload' => false,
            ],
            
        ]);?>
          <span id="customCaption" class="text-success">No file selected</span>
    </div>

    <?= $form->field($model, 'status')->textInput() ?>
    

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? Yii::t('book', 'Create') : Yii::t('book', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
