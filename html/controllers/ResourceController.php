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
use yii\helpers\BaseVarDumper;

class ResourceController extends Controller
{

    public function actionIndex()
    {

    }

    public function actionGet()
    {
        Resources::curlList();

        echo 'Sessions data stored!<br />';

        printf('<pre>%s</pre>', print_r(Resources::getList(),1));
    }

    public function actionSessions()
    {
        //Get file path
        $fp = fopen(Yii::getAlias('@app').'/'.Resources::LOCATION.'/json/sessions.json', 'a');

        //Empty file
        ftruncate($fp, 0);

        //Write JSON parsed content
        fwrite($fp, Json::encode( Resources::parseSessions( Resources::get('sessions') ) ));
        fclose($fp);

        echo 'Session Parse Complete';die;
    }
}