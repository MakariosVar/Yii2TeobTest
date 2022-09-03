<?php

use app\models\Customers;
/** @var yii\web\View $this */

$this->title = 'ΤΟΕΒ Ακράτας';
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent pt-5">
        <img src="data:image/png;base64,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">
        <h1 class="display-4">Ακράτας!</h1>
        <hr>
    </div>

    <div class="d-flex flex-column align-items-center">
        <h3>Επιλέξτε Πελάτη</h3>
        <select  class="form-select-lg mw-50" onchange="this.options[this.selectedIndex].value && (window.location = this.options[this.selectedIndex].value);"> 
           <?php 
                echo '<option value="">Επιλογή..</option>'; 
                
                foreach(Customers::getCustomers() as $customer)
                {
                    
                    echo '<option value="/index.php?r=customers%2Fview&id='.$customer->id.'">'.$customer->firstName.' '.$customer->lastName.' (ΑΦΜ: '.$customer->VAT.')</option>' ;
                
                }
            ?>      
        </select> 
    </div>
<br><br><br>
    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Νέος Πελάτης</h2>

                
                <p><a class="btn btn-outline-secondary" href="?r=customers%2Fcreate">Προσθήκη πελάτη &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Νέο Κτήμα</h2>

            
                <p><a class="btn btn-outline-secondary" href="?r=estate%2Fcreate">Προσθήκη κτήματος &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Νέα Πληρωμή</h2>

                
                <p><a class="btn btn-outline-secondary" href="?r=payments%2Fcreate">πληρωμή &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
