<?php
/*
*
*	This class will save all actions performed by all users.
*
*/

namespace ramyaj\auditlogs\classes;

use Yii;
use ramyaj\auditlogs\models\Log;


class ModelAudit extends \yii\db\ActiveRecord
{
	/**
     * Override function afterSave
     * Creates a new Log record on database everytime a record is inserted or updated.
     * The details of the Inserted or Updated record is saved.
     */
    public function afterSave($insert, $changedAttributes){
        $model = new Log();
        $model->id          = $this->getPrimaryKey();
        $model->class       = $this->className();
        $model->user        = Yii::$app->user->isGuest ? 0 : Yii::$app->user->id;
        $model->datetime    = date('Y-m-d H:i:s');

        if($insert){
            $model->type    = 'Insert';
            $model->original_details  = json_encode($this->attributes);
            $model->save();
        }else{
            $model->type    = 'Update';
            $original       = [];
            $updated        = [];
            if(isset($changedAttributes)){
                foreach($changedAttributes as $key=>$val){
                    if($this->$key != $val){
                        $original[$key]=$val;
                        $updated[$key]=$this->$key;
                    }
                }
            }

            $model->original_details    = json_encode($original);
            $model->update_details      = json_encode($updated);
            if(!empty($original) && !empty($updated) ){
                $model->save();
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }


    /**
     * Override function afterSave
     * Creates a new Log record on database everytime a record is deleted.
     * The details of the deleted record is saved.
     */
    public function beforeDelete()
    {
        if (parent::beforeDelete()) {
            $model                      = new Log();
            $model->id                  = $this->getPrimaryKey();
            $model->class               = $this->className();
            $model->user                = Yii::$app->user->id;
            $model->datetime            = date('Y-m-d H:i:s');
            $model->type                = 'Delete';
            $model->original_details    = json_encode($this->attributes);
            $model->save();
            return true;
        } else {
            return false;
        }
    }


}