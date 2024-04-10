<?php

/**
 * Global settings
 */

// UPLOADS
// Set the path to your SQL files and the file prefix
$projectName = "project-name";
$sqlFilesPath = realpath("../final/$projectName");
$filePrefix = $projectName . "_table";

// Specify the range of files to import
$startFileNumber = 0;

// Usage
$inputSqlFile = '../dump/test.sql';
$outputFilePrefix = $projectName . '_table';
$filesToUpload = scandir("../final/project-name");
