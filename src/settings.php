<?php

/**
 * Global settings
 */

// UPLOADS
// Set the path to your SQL files and the file prefix
$projectName = "";
$sqlFilesPath = realpath("../final/$projectName");
$filePrefix = $projectName . "_table";

// Specify the range of files to import
$startFileNumber = 0;

// Usage
$inputSqlFile = 'path/to/file';
$outputFilePrefix = $projectName . '_table';