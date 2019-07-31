<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel jaymar0526\auditlogs\models\AuditTrailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Audit Trails';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="audit-trail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Audit Trail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'activity_id',
            'user_id',
            'datetime',
            'module',
            'controller',
            'action',
            'route',
            'params:ntext',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
