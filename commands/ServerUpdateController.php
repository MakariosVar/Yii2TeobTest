<?php

namespace app\commands;

use yii\console\Controller;
use yii\console\ExitCode;


class ServerUpdateController extends Controller
{
/**
 * This command credits the accounts of the new year. (Run at 1 of January)
 *
 * @author Makarios Vardaxis 
 * @since 2.0
 */
    public function actionIndex()
    {
        $customers = \app\models\Customers::find()->all();
        $debts = \app\models\Debt::find()->all();

        foreach($customers as $customer)
        {
           foreach($debts as $debt)
           {
                if($debt->customerId == $customer->id)
                {
                    $customer->TotalDebt += $debt->amount;

                }
           }
           $customer->save();
           
        }


        echo "Οι νέοι λογαριασμού πιστώθηκαν στους πελάτες  \n";
        return ExitCode::OK;
    }

    /**
     * This command set Debts as Expired status(run it at 1 of August)
     *
     * @author Makarios Vardaxis 
     * @since 2.0
     */
    public function actionPastDebts()
    {
    

        $debts = \app\models\Debt::find()->all();

       
           foreach($debts as $debt)
           {
                $debt->debtType = 'Παρελθούσας Χρήσης';
                
                $debt->save();
           }
       

        echo "Οι λογαριασμού πέρασαν στην Παρελθούσα χρήση  \n";
        return ExitCode::OK;
    }

}
