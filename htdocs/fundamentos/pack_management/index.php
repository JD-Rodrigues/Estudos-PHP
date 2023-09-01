<?php
    require 'autoloader.php';
    
    $pit = new formulas\Pitagoras();
    echo $pit->logFormula();

    $bas = new formulas\Baskara();
    echo $bas->logFormula();

    $add = new calculos\Addition();
    echo $add->logCalculo();

?>