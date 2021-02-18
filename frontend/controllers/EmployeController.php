<?php
namespace frontend\controllers;

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
                        'actions' => ['add-request', 'list-request', 'massage'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
           
        ];
    }
	public function actionAddRequest()
	{
		$model = new Employe();

		if ($model->load(Yii::$app->request->post()) && $model->validate()) {
			$model->user_id = Yii::$app->user->identity->id;
			$model->save();

			if ($model->save()){
				Yii::$app->session->setFlash('success', 'Arizangiz muofaqqiyatli yuborildi!');
				$model = new Employe();
			}
			else
				Yii::$app->session->setFlash('error', 'Ariza yuborishda xatolik ro\'y berdi, qayta urinib ko\'ring.');
		    }
		return $this->render('add-request', [
			'model' => $model
		]);
	}
	public function actionListRequest()
	{
		$model = Employe::find()
		->where(['user_id' => Yii::$app->user->identity->id])
		->all();

		return $this->render('list', [
			'model' => $model,
		]);	
	}

	public function actionMassage($id)
	{
		$model = Notes::find()
		->where(['employe_id' => $id])
		->all();

		return $this->render('massage', [
			'model' => $model,
		]);
	}	

}