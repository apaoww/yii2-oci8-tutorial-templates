<?php
/**
 * Created by PhpStorm.
 * User: safiee
 * Date: 3/31/17
 * Time: 3:31 PM
 */
use yii\helpers\BaseJson;

$this->title="Query Update Example";
?>

<div class="row">
    <div class="col-md-6">
        <h3>Insert Using EMPLOYEE package</h3>
        <pre>
            <code>
                $connection = \Yii::$app->db;
                $sql = "
                    BEGIN
                    EMPLOYEE_TAPI.INS(
                    :p_NAME
                    );
                    END;

                    ";

                    $usingCommand = $connection->createCommand($sql,[
                    ':p_NAME' => "".substr( md5(rand()), 0, 7)
                    ]);
                    $usingCommand->execute();
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
    <div class="col-md-6">
        <h3>Example package generate using sql developer</h3>
        <pre>
            create or replace PACKAGE employee_tapi
IS
type employee_tapi_rec
IS
  record
  (
    name employee.name%type ,
    id employee.id%type );
type employee_tapi_tab
IS
  TABLE OF employee_tapi_rec;
  -- insert
  PROCEDURE ins(
      p_name IN employee.name%type DEFAULT NULL );
  -- update
  PROCEDURE upd(
      p_name IN employee.name%type DEFAULT NULL ,
      p_id   IN employee.id%type );
  -- delete
  PROCEDURE del(
      p_id IN employee.id%type );

  PROCEDURE my_random_number(
      p_id out number );

END employee_tapi;
        </pre>
        <pre>
            create or replace PACKAGE body employee_tapi
IS
  -- insert
  PROCEDURE ins(
      p_name IN employee.name%type DEFAULT NULL  )
  IS
  BEGIN
    INSERT INTO employee
      ( name
      ) VALUES
      ( p_name
      );
  END;
-- update
  PROCEDURE upd
    (
      p_name IN employee.name%type DEFAULT NULL ,
      p_id   IN employee.id%type
    )
  IS
  BEGIN
    UPDATE employee SET name = p_name WHERE id = p_id;
  END;
-- del
  PROCEDURE del(
      p_id IN employee.id%type )
  IS
  BEGIN
    DELETE FROM employee WHERE id = p_id;
  END;
-- random
  PROCEDURE my_random_number(
      p_id out number )
  IS
  rand number;
  BEGIN
    select dbms_random.random into rand from dual;
    p_id := rand;
  END;

END employee_tapi;
        </pre>
    </div>
</div>