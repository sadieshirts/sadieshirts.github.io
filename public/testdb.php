<?php
	require_once(“Dao.php”);
	$dao = new Dao();
	echo "hello";
	echo $dao->getConnectionStatus();