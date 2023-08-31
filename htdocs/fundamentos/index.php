<?php
    require 'autoloader.php';
    
    $pit = new Pitagoras();
    echo $pit->logFormula();

    $bas = new Baskara();
    echo $bas->logFormula();

?>