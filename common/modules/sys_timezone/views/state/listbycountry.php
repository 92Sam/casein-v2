<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\sys_timezone\models\SysState */
/* @var $form ActiveForm */
?>

<option value="">-- Seleccionar Estado --</option>
<?php
    if($model != NULL){
        foreach ($model as $key => $value) { ?>
            <option value="<?= $value->id ?>"><?= $value->name ?></option>
  <?php }
    }
?>
