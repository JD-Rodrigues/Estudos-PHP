<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];

	$sentence = "Amanhã será outro dia.";
	$modifiedSentence = str_replace('a', 't', $sentence);
	echo $modifiedSentence;

?>

 