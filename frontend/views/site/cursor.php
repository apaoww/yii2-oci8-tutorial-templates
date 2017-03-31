<pre>
    $connection = \Yii::$app->db;
        $sql = <<<sql
        DECLARE
        P_ID VARCHAR2(200);
        v_Return VARCHAR2(200);
        BEGIN
        P_ID := :ID_IN;

        v_Return := FIND_EMP(
        P_ID => P_ID
        );
        /* Legacy output:
        DBMS_OUTPUT.PUT_LINE('v_Return = ' || v_Return);
        */
        :v_Return := v_Return;
        rollback;
        END;

        sql;

        $usingCommand = $connection->createCommand($sql,[
        ":ID_IN" => 2,
        ]);
        $my_cursor_value_from_oracle = 0;
        $usingCommand->bindParam(':v_Return',$my_cursor_value_from_oracle, null, 32);
        $usingCommand->execute();
</pre>
<?php
/**
 * Created by PhpStorm.
 * User: safiee
 * Date: 3/31/17
 * Time: 5:32 PM
 */
echo "Cursor value return from oracle: ";
echo $my_cursor_value_from_oracle;?>