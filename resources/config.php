<?php

/*
The important thing to realize is that the config file should be included in every
page of your project, or at least any page you want access to these settings.
This allows you to confidently use these settings throughout a project because
if something changes such as your database credentials, or a path to a specific resource,
you'll only need to update it here.
 */

$config = array(
    "db" => array(
        "dbname" => "gradetracker",
        "username" => "root",
        "password" => "251458760",
        "host" => "localhost",
    ),
    "urls" => array(
        "baseUrl" => "http://example.com",
    ),
    "paths" => array(
        "resources" => "/path/to/resources",
        //"css" => $_SERVER['HTTP_REFERER'],
        "images" => array(
            "content" => $_SERVER["DOCUMENT_ROOT"] . "/images/content",
            "layout" => $_SERVER["DOCUMENT_ROOT"] . "/images/layout"
        ),
    ),
);

// Database Connection
$connect = mysqli_connect($config['db']['host'], $config['db']['username'], $config['db']['password'], $config['db']['dbname']);

if (!$connect) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}else {
    echo "Connected successfully";
}

// =======================================================================

// Constants for heavily used paths
defined("LIBRARY_PATH")
or define("LIBRARY_PATH", realpath(dirname(__FILE__) . '/library'));

defined("TEMPLATES_PATH")
or define("TEMPLATES_PATH", realpath(dirname(__FILE__) . '/templates'));

defined("SCRIPT_ROOT")
or define("SCRIPT_ROOT", "http://localhost:301/gradetracker.git/resources/library");
// =======================================================================

//  Error reporting.
ini_set("error_reporting", "true");
error_reporting(E_ALL | E_STRCT);
// =======================================================================

?>