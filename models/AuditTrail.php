<?php

namespace jaymar0526\auditlogs\models;

use Yii;

/**
 * This is the model class for table "audit_trail".
 *
 * @property integer $activity_id
 * @property integer $user_id
 * @property string $datetime
 * @property string $module
 * @property string $controller
 * @property string $action
 * @property string $route
 * @property string $params
 */
class AuditTrail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'audit_trail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'datetime'], 'required'],
            [['user_id'], 'integer'],
            [['datetime'], 'safe'],
            [['params'], 'string'],
            [['module', 'controller', 'action', 'route'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'activity_id' => 'Activity ID',
            'user_id' => 'User ID',
            'datetime' => 'Datetime',
            'module' => 'Module',
            'controller' => 'Controller',
            'action' => 'Action',
            'route' => 'Route',
            'params' => 'Params',
        ];
    }
}
