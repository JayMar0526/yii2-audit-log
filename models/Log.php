<?php

namespace jaymar0526\auditlogs\models;

use Yii;

/**
 * This is the model class for table "change_log".
 *
 * @property integer $id
 * @property string $class
 * @property integer $change_id
 * @property string $type
 * @property integer $user
 * @property string $datetime
 * @property string $update_details
 * @property string $original_details
 */
class Log extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'change_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'class', 'user', 'datetime', 'original_details'], 'required'],
            [['type', 'update_details', 'original_details'], 'string'],
            [['datetime','id', 'user'], 'safe'],
            [['class'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'class' => 'Class',
            'change_id' => 'Change ID',
            'type' => 'Type',
            'user' => 'User',
            'datetime' => 'Datetime',
            'update_details' => 'Update Details',
            'original_details' => 'Original Details',
        ];
    }
}
