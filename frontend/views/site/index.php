<?php

/* @var $this yii\web\View */
use yii\helpers\Html;


?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!</h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Example Select Model/Create Command</h2>
                <p><?=Html::a( "View ", $url = ["site/select"], $options = [] ) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Example Insert Using Model</h2>

                <p><?=Html::a( "View ", $url = ["site/insert"], $options = [] ) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Example Update Using Model</h2>
                <p><?=Html::a( "View ", $url = ["site/update"], $options = [] ) ?></p>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-4">
                <h2>Example Run Package</h2>
                <p><?=Html::a( "View ", $url = ["site/package"], $options = [] ) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Example Run Package Return Some value from package</h2>
                <p><?=Html::a( "View ", $url = ["site/package-return"], $options = [] ) ?></p>
            </div>
            <div class="col-lg-4">
                <h2>Example Run Package Return Cursor value from oracle function</h2>
                <p><?=Html::a( "View ", $url = ["site/cursor"], $options = [] ) ?></p>
            </div>
        </div>

    </div>
</div>
