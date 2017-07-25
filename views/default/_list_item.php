<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\helpers\StringHelper;
?>


<div class='col-xs-12 col-sm-4 col-md-3 col-lg-3' >
    <a class="thumbnail fancybox" rel="ligthbox" href="<?= Url::to(['/book/view','id'=>$model->id]) ?>" id="popupModal">
        <div  style="float: left;overflow: hidden;height: 200px;display: block;width: 100%;margin-bottom: 5px;border-bottom: 1px solid #eee;background: #eee;">
            <?= Html::img($model->getUploadUrl('image'), [ 'width' => '100%', 'class' => 'center-block img-responsive']) ?>
        </div>
        <div class='text-left' style="margin:5px 5px 15px 5px;">
            <?=Html::tag('h4',StringHelper::truncate($model->title,50),['style'=>'margin-bottom:0px;']) ?>
            <small class='text-muted'>
                <?=StringHelper::truncate(strip_tags($model->detail),80);?>
            </small>
            <?php if(isset($model->number)):?>
               <br/><small class='text-muted'><?=Yii::t('culture/book','{number} Pages',['number'=>$model->number]);?></small>
            <?php endif;?>
            <hr style="margin: 5px;"/>
            <div style="height: 40px;">
              <?php if(isset($model->author)):?>
                <small class='text-muted'>
                    <?=  StringHelper::truncate($model->author,70);?>
                </small>
                <?php endif;?>
            </div>
        </div> <!-- text-right / end -->
    </a>
</div> <!-- col-6 / end -->
