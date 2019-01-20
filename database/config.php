<?php
	$localhost_cleardb_url = "mysql://b77bcea4cd6805:49825e14@us-cdbr-iron-east-01.cleardb.net/heroku_335aeb6cbfa2822?reconnect=true";


	if(!getenv("CLEARDB_DATABASE_URL")){
		putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
	}