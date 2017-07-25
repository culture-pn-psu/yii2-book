<?php

use yii\helpers\Html;
use yii\helpers\BaseStringHelper;
use culturePnPsu\reserveCar\components\Navigate;

/* @var $this \yii\web\View */
/* @var $content string */

$controller = $this->context;
//$menus = $controller->module->menus;
//$route = $controller->route;
?>
<?php $this->beginContent('@app/views/layouts/main.php') ?>


        <div class="box box-info">
            <div class="box-header with-border">
                <h3 class="box-title">
                    <?= $this->title ?>
                </h3>
            </div>
            <div class="box-body pad">
                <div class="row">
                    <div class="col-md-12">
                        <?= $content ?>
                    </div>
                </div>
            </div><!--box-body pad-->
        </div><!--box box-info-->
        <!-- /. box -->
   


<?php $this->endContent(); ?>
