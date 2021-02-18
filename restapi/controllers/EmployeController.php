<?php
namespace restapi\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use restapi\models\Status;

class EmployeController extends ConfigController
{
	public $modelClass = '\restapi\models\Employe';

    // This is index action
    public function actionIndex()
    {
    	$dataProvider = new ActiveDataProvider([
    		'query' => \restapi\models\Employe::find(),
    		'pagination' => [
    			'pageSize' => 15,
    		]
    	]);

    	return $dataProvider;
    }

    public function actionCreate()
    {	
    	$model = new \restapi\models\Employe();

    	$name = Yii::$app->request->post('name');
    	$surname = Yii::$app->request->post('surname');
    	$age = Yii::$app->request->post('age');
    	$address = Yii::$app->request->post('address');
    	$country_of_orign = Yii::$app->request->post('country_of_orign');
    	$email = Yii::$app->request->post('email');
    	$phone = Yii::$app->request->post('phone');
    	$user = Yii::$app->request->post('user_id');

    	$respons = $model->ApiSaveEmploye($name, $surname, $age, $address, $country_of_orign, $email, $phone, $user);


    	return $respons;
    }

    public function actionView($id)
    {
    	$model = new \restapi\models\Employe();
    	$respons = $model->findById($id);

    	return $respons;
    }

    //Qolgan action larni oddiy shu tartibda davom ettiriladi...
}