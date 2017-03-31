<?php
namespace frontend\controllers;

use frontend\models\Employee;
use Yii;
use common\models\LoginForm;
use frontend\models\PasswordResetRequestForm;
use frontend\models\ResetPasswordForm;
use frontend\models\SignupForm;
use frontend\models\ContactForm;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\db\Query;
/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'signup'],
                'rules' => [
                    [
                        'actions' => ['signup'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionIndex()
    {

        return $this->render('index', [
            "model"=>[],
        ]);
    }

    /**
     * Logs in a user.
     *
     * @return mixed
     */
    public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        } else {
            return $this->render('login', [
                'model' => $model,
            ]);
        }
    }

    public function actionSelect(){
        $usingModel = Employee::find()->limit(100)->all();
        $connection = \Yii::$app->db;
        $usingCommand = $connection->createCommand("select * from EMPLOYEE ");
        //$model = $connection->createCommand('SELECT * FROM ec_new_acad where rownum <= 100');
        $usingCommandResult = $usingCommand->queryAll();

        return $this->render('select', [
            "usingModel"=>$usingModel,
            "usingCommandResult"=>$usingCommandResult,
        ]);
    }

    public function actionInsert(){
        $emp = new Employee();
        $emp->NAME = substr( md5(rand()), 0, 7);
        $emp->save();
        $usingModel = Employee::find()->orderBy(['ID'=>'asc'])->limit(100)->all();
        return $this->render('insert', [
            "usingModel"=>$usingModel,
        ]);
    }

    public function actionPackage(){
        $connection = \Yii::$app->db;
        $sql = <<<sql
BEGIN
EMPLOYEE_TAPI.INS(
:p_NAME
);
END;

sql;

        $usingCommand = $connection->createCommand($sql,[
            ':p_NAME' => "".substr( md5(rand()), 0, 7)
        ]);
        $usingCommand->execute();
        $usingModel = Employee::find()->orderBy(['ID'=>'asc'])->limit(100)->all();
        return $this->render('insert_package', [
            "usingModel"=>$usingModel,
        ]);
    }

    public function actionPackageReturn(){
        $connection = \Yii::$app->db;
        $sql = <<<sql
BEGIN
EMPLOYEE_TAPI.MY_RANDOM_NUMBER(
:random_number
);
END;

sql;

        $usingCommand = $connection->createCommand($sql,[]);
        $my_random_number = 0;
        $usingCommand->bindParam(':random_number',$my_random_number, null, 32);
        $usingCommand->execute();
        $usingModel = Employee::find()->orderBy(['ID'=>'asc'])->limit(100)->all();
        return $this->render('package_return', [
            "my_random_number"=>$my_random_number,
        ]);
    }

    public function actionCursor(){
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
        $usingModel = Employee::find()->orderBy(['ID'=>'asc'])->limit(100)->all();
        return $this->render('cursor', [
            "my_cursor_value_from_oracle"=>$my_cursor_value_from_oracle,
        ]);
    }

    public function actionUpdate(){
        $emp = Employee::find(1)->one();
        $emp->NAME = substr( md5(rand()), 0, 7);
        $emp->save();
        $usingModel = Employee::find()->orderBy(['ID'=>'asc'])->limit(100)->all();
        return $this->render('update', [
            "usingModel"=>$usingModel,
        ]);
    }

    /**
     * Logs out the current user.
     *
     * @return mixed
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return mixed
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail(Yii::$app->params['adminEmail'])) {
                Yii::$app->session->setFlash('success', 'Thank you for contacting us. We will respond to you as soon as possible.');
            } else {
                Yii::$app->session->setFlash('error', 'There was an error sending email.');
            }

            return $this->refresh();
        } else {
            return $this->render('contact', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Displays about page.
     *
     * @return mixed
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Signs user up.
     *
     * @return mixed
     */
    public function actionSignup()
    {
        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->signup()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    /**
     * Requests password reset.
     *
     * @return mixed
     */
    public function actionRequestPasswordReset()
    {
        $model = new PasswordResetRequestForm();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if ($model->sendEmail()) {
                Yii::$app->session->setFlash('success', 'Check your email for further instructions.');

                return $this->goHome();
            } else {
                Yii::$app->session->setFlash('error', 'Sorry, we are unable to reset password for email provided.');
            }
        }

        return $this->render('requestPasswordResetToken', [
            'model' => $model,
        ]);
    }

    /**
     * Resets password.
     *
     * @param string $token
     * @return mixed
     * @throws BadRequestHttpException
     */
    public function actionResetPassword($token)
    {
        try {
            $model = new ResetPasswordForm($token);
        } catch (InvalidParamException $e) {
            throw new BadRequestHttpException($e->getMessage());
        }

        if ($model->load(Yii::$app->request->post()) && $model->validate() && $model->resetPassword()) {
            Yii::$app->session->setFlash('success', 'New password was saved.');

            return $this->goHome();
        }

        return $this->render('resetPassword', [
            'model' => $model,
        ]);
    }
}
