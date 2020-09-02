<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model jaymar0526\auditlogs\models\AuditTrail */

$this->title = 'Update Audit Trail: ' . $model->activity_id;
$this->params['breadcrumbs'][] = ['label' => 'Audit Trails', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->activity_id, 'url' => ['view', 'id' => $model->activity_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="audit-trail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
