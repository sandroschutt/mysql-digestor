<h1>Split SQL tables</h1>

<?php
require "settings.php";
error_reporting(E_ALL);
ini_set('display_errors', '1');

function splitSqlFile($inputFile, $outputFilePrefix, $sqlFilesPath)
{

    try {
        $sqlContent = file_get_contents($inputFile);
        // Use regular expression to find SQL statements
        $sqlStatements = preg_split('/;\s*\n/', $sqlContent);

        // Output each SQL statement into a separate file
        foreach ($sqlStatements as $index => $statement) {
            $trimmedStatement = trim($statement);
            if (!empty($trimmedStatement)) {
                file_put_contents($sqlFilesPath . "/" . $outputFilePrefix . "_$index.sql", $trimmedStatement . ";");
            }
        }

        echo "Success!";
    } catch (\Error $error) {
        echo $error;
    }
}

try {
    splitSqlFile($inputSqlFile, $outputFilePrefix, $sqlFilesPath);
} catch (\Error $error) {
    echo $error;
}

?>