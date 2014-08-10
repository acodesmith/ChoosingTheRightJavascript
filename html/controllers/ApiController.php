<?php

namespace app\controllers;

use app\models\Resources;
use Yii;
use yii\filters\AccessControl;
use yii\helpers\Json;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use CurlLib;

Yii::$classMap['CurlLib'] = '@vendor/Curl/Curl.php';


class ApiController extends Controller
{

    public function actionPage($page = null)
    {
        $pages  = Resources::getList();
        $success= true;
        $data   = array();

        if($page !== null){
            if(in_array($page, array_keys($pages))){
                $html = Resources::get($page);
                $html = substr($html,strpos($html,'<table'));
                $html = str_replace('/assets/content/', 'http://www.ncdevcon.com/assets/content/', $html);

                switch($page)
                {
                    case 'sessions':
                        $data['html']=Resources::parseSessions($html);
                        break;
                }

            }else{
                $success=false;
            }
        }else{
            $data['pages']=$pages;
        }

        \Yii::$app->response->format = 'json';
        return Json::encode(array(
            'success'=>$success,
            'data'=>$data
        ));
    }

}