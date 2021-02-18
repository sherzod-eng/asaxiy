<?php
namespace restapi\controllers;

use Yii;
use yii\rest\ActiveController;
use yii\web\Response;
use yii\filters\auth\CompositeAuth;
use yii\filters\auth\HttpBasicAuth;
use yii\filters\auth\HttpBearerAuth;

class ConfigController extends ActiveController
{
    // This is unset default actions
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        unset($actions['create']);
        unset($actions['view']);
        //unset($actions['delete']);
        //unset($actions['update']);

        return $actions;
    }


	public $serializer = [
        'class' => 'yii\rest\Serializer',
        'collectionEnvelope' => 'items',
        ];
	//This is uath filter(CORS minimal auth)
    public function behaviors()
    {
        $behaviors = parent::behaviors();

        $behaviors['corsFilter'] = [
            'class' => \yii\filters\Cors::className(),
            'cors' => [
                
                'Origin' => ['http://url-test', 'https://www.myserver.com'],
                
                'Access-Control-Request-Method' => ['POST', 'PUT', 'GET', 'DELETE'],
               
                'Access-Control-Request-Headers' => ['X-Wsse'],
                
                'Access-Control-Allow-Credentials' => true,
               
                'Access-Control-Max-Age' => 3600,
                
                'Access-Control-Expose-Headers' => ['X-Pagination-Current-Page'],
            ],
        ];

        $behaviors['formats'] = [
            'class' => 'yii\filters\ContentNegotiator',
            'formats' => [
                'application/json' => Response::FORMAT_JSON,
            ],
        ];
	//this is Basic auth and Bearer auth
         $behaviors['authenticator'] = [
        'class' => CompositeAuth::className(),
        'authMethods' => [
            HttpBasicAuth::className(),
            HttpBearerAuth::className(),
        ],
    ];

        return $behaviors;
    }
}