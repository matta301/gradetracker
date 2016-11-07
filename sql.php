<?php

    require_once("resources/config.php");


    global $connect;

    $createMembers = $connect->query("CREATE TABLE members 
    								 (
								    	  id int(11) NOT NULL,
										  username varchar(30) NOT NULL,
										  firstname varchar(100) NOT NULL,
										  email varchar(50) NOT NULL,
										  password varchar(128) NOT NULL,
										  active tinyint(1) NOT NULL DEFAULT '0'
									 )");


    if($createMembers){
    	echo "success";
    }else {
    	echo "failed";
    }
