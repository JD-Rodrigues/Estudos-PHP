<?php

    ini_set('display_errors', '1');
    ini_set('display_startup_errors', '1');
    error_reporting(E_ALL);
    
    require 'vendor/autoload.php';
    
    use classes\formulas;
    use Monolog\Level;
    use Monolog\Logger;
    use Monolog\Handler\StreamHandler;

    $pit = new formulas\Pitagoras();
    echo $pit->logFormula();

    $bas = new formulas\Baskara();
    echo $bas->logFormula();

    $add = new classes\calculos\Addition();
    echo $add->logCalculo();

    

    // create a log channel
    $log = new Logger('Testando');
    $log->pushHandler(new StreamHandler('test.log', Level::Warning));

    // add records to the log
    $log->warning('Foo');
    $log->error('Bar');

    

?>