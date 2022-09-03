<?php

namespace app\controllers;

use app\models\Customers;
use app\models\Estates;
use app\models\EstateTypes;
use app\models\ChargeTypes;
use app\models\Debt;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * EstateController implements the CRUD actions for Estates model.
 */
class EstateController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Estates models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $dataProvider = new ActiveDataProvider([
            'query' => Estates::find(),
            /*
            'pagination' => [
                'pageSize' => 50
            ],
            'sort' => [
                'defaultOrder' => [
                    'id' => SORT_DESC,
                ]
            ],
            */
        ]);

        return $this->render('index', [
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Estates model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Estates model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Estates();
        if ($this->request->isPost) {
            if ($model->load($this->request->post()))
            {   
            
                $customer = Customers::find()
                    ->where(['id' => $model->customerId])
                    ->one();
                $model->customerFirstName = $customer->firstName;
                $model->customerLastName = $customer->lastName;

            

                $debt = new Debt();      

                $chargeType = EstateTypes::find()
                ->where(['name' => $model->estateType])
                ->one()
                ->chargeType;

                $amount = ChargeTypes::find()
                ->where(['name' => $chargeType])
                ->one()
                ->amount;
                
                $debt->amount = $amount*$model->size;
                $debt->customerId = $model->customerId;
                $debt->debtType = 'Τρέχουσας Χρήσης';
               
                $customer->TotalDebt = $customer->TotalDebt + $debt->amount; 
                if($model->save() && $debt->save() && $customer->save()) {
                  
                    return $this->redirect(['view', 'id' => $model->id]);
                }
            } 
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Estates model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()))
        {
            $debt = Debt::find()
            ->where(['id' => $id])
            ->one();

            $chargeType = EstateTypes::find()
            ->where(['name' => $model->estateType])
            ->one()
            ->chargeType;
            
            $amount = ChargeTypes::find()
            ->where(['name' => $chargeType])
            ->one()
            ->amount;
            

            $debt->amount = $amount *$model->size;
            if($model->save() && $debt->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Estates model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Estates model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Estates the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Estates::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
