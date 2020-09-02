<?php
/*
*
*	This class will save all actions performed by all users.
*
*/

namespace jaymar0526\auditlogs\classes;

use Yii;
use jaymar0526\auditlogs\models\AuditTrail;


class ControllerAudit extends \yii\web\Controller
{
		/*
		* Saves the action, userid, route, params datetime to the database.
		*
		*/
		public function afterAction($action, $result)
		{
		    $result = parent::afterAction($action, $result);

		    $model = new AuditTrail();
		    $model->user_id	= Yii::$app->user->isGuest ? 0 : Yii::$app->user->id;
		    $model->module = Yii::$app->controller->module  ? Yii::$app->controller->module->id : "";
		    $model->controller = Yii::$app->controller->id;
		    $model->action = Yii::$app->controller->action->id;
		    $request = Yii::$app->request;
		    $model->route = $request->pathInfo;
		    $model->params =  $request->queryString;
		    $model->datetime = date('Y-m-d H:i:s');
		    $model->save();



		    return $result;
		}


}
