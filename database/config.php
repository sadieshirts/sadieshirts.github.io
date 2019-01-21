<?php
$localhost_cleardb_url = "mysql://bbc0f6e8090213:32d6923d@us-cdbr-iron-east-01.cleardb.net/heroku_14909b2ad6d9a9e?reconnect=true";

if(!getenv("CLEARDB_DATABASE_URL")){
	putenv("CLEARDB_DATABASE_URL=$localhost_cleardb_url");
}