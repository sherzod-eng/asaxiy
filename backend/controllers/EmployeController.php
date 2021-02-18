<?php
namespace backend\controllers;

use Yii;
use yii\web\Controller;
use common\models\Employe;
use common\models\Notes;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * 
 */
class EmployeController extends Controller
{
	
	public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['list-request', 'massage'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }

    public function actionListRequest()
    {
    	$model = Employe::find()->all();

    	return $this->render('list', [
    		'model' => $model,
    	]);
    }

    public function actionMassage($id)
    {
    	$model = new Notes();

    	if ($model->load(Yii::$app->request->post())) {
    		$model->employe_id = $id;
    		$model->save();
    	}

    	return $this->render('massage', ['model' => $model]);
    }

    public function actionEditStatus($id)
    {
    	$model
    }
}

