<?php
namespace restapi\controllers;

use Yii;
use yii\data\ActiveDataProvider;

class ProductController extends ConfigController
{
    public $modelClass = '\restapi\models\Product';

    // This is unset default actions
    public function actions()
    {
    	$actions = parent::actions();
    	unset($actions['index']);
    	unset($actions['create']);
    	unset($actions['view']);
    	unset($actions['delete']);
    	unset($actions['update']);

    	return $actions;
    }

    // This is index action
    public function actionIndex()
    {
    	$dataProvider = new ActiveDataProvider([
    		'query' => \restapi\models\Product::find(),
    		'pagination' => [
    			'pageSize' => 15,
    		]
    	]);

    	return $dataProvider;

    }
    //This is add product
    public function actionCreate()
    {
    	$name = Yii::$app->request->post('name');
    	$desc = Yii::$app->request->post('description');
    	$price = Yii::$app->request->post('price');
    	$cat_id = Yii::$app->request->post('category_id');
    	$rat = Yii::$app->request->post('rating');

    	$model = new \restapi\models\Product();
    	$model->name = $name;
    	$model->description = $desc;
    	$model->price = $price;
    	$model->category_id = $cat_id;
    	$model->rating = $rat;
    	$model->save();

    	if ($model->save()) return true;
    	else return false;
    }

    public function actionView()
    {
    	$id = Yii::$app->request->get('id');

    	$product = \restapi\models\Product::findOne($id);

    	return $product;
    }

    //Delete
    public function actionDelete()
    {
    	$id = Yii::$app->request->get('id');

    	$delete_product = \restapi\models\Product::findOne($id);
    	$delete_product->delete();
    	if(isset($delete_product)) return true;
    	else return false;

    }
    //This is update, method get
    public function actionUpdate()
    {
    	$name = Yii::$app->request->get('name');
    	$desc = Yii::$app->request->get('description');
    	$price = Yii::$app->request->get('price');
    	$cat_id = Yii::$app->request->get('category_id');
    	$rat = Yii::$app->request->get('rating');

    	$update_product = \restapi\models\Product::findOne($id);
    	$update_product->name = $name;
    	$update_product->description = $desc;
    	$update_product->price = $price;
    	$update_product->category_id = $cat_id;
    	$update_product->rating = $rat;
    	$update_product->update();
    	return $update_product;

    	
    }
    

}