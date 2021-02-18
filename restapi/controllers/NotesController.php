<?php
namespace restapi\controllers;

use Yii;
use yii\data\ActiveDataProvider;
use restapi\models\Status;

class NotesController extends ConfigController
{
	public $modelClass = '\restapi\models\Notes';

    // This is index action
    public function actionIndex()
    {
    	$dataProvider = new ActiveDataProvider([
    		'query' => \restapi\models\Notes::find(),
    		'pagination' => [
    			'pageSize' => 15,
    		]
    	]);

    	return $dataProvider;
    }

    public function actionCreate()
    {	
    	$model = new \restapi\models\Notes();

    	$content = Yii::$app->request->post('content');
        $date = Yii::$app->request->post('inter_date');
    	$id = Yii::$app->request->post('employe_id');
    	
    	$respons = $model->ApiSaveNotes($content, $date, $id);

    	return $respons;
    }

}