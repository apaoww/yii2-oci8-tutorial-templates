<?php
namespace console\controllers;

use yii\console\Controller;
use frontend\models\Employee;

class SeedController extends Controller
{
    public function actionIndex()
    {


        $emp = new Employee();
        for ( $i = 1; $i <= 20; $i++ )
        {
            $emp->setIsNewRecord(true);
            $emp->id = null;

            $emp->name = substr( md5(rand()), 0, 7);
            $emp->save();
        }

    }
}