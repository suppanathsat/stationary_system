<?php
 include_once 'config/database.php';
 include_once 'obj/stationary.php';
 include_once 'obj/issue_status.php';
 $database = new Database();
 $db = $database->getConnection();
 $IssueStatus = new IssueStatus($db);
 $IssueStatus->read();
?>