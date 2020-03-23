<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model ityakutia\setting\models\Setting */

$this->title = 'Новый параметр';
// $this->params['breadcrumbs'][] = ['label' => 'Settings', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-create">
    <div class="row">
        <div class="col s12">
		    <?= $this->render('_form', [
		        'model' => $model,
		    ]) ?>
		</div>
	</div>
</div>
