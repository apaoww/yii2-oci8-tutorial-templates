<?php
/**
 * Created by PhpStorm.
 * User: safiee
 * Date: 3/31/17
 * Time: 3:31 PM
 */
use yii\helpers\BaseJson;

$this->title="Query Select Example";
?>

<div class="row">
    <div class="col-md-6">
        <h3>Insert Using Model Employee</h3>
        <pre>
            <code>
                $emp = new Employee();
                $emp->NAME = substr( md5(rand()), 0, 7);
                $emp->save();
            </code>
        </pre>

        <table class="table table-bordered">
            <thead>
            <tr>
                <td>Id</td>
                <td>Name</td>
            </tr>
            </thead>
            <tbody>
            <?php foreach($usingModel as $item){ ?>
                <tr>
                    <td><?= $item->ID ?></td>
                    <td><?= $item->NAME ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>