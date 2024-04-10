<?php
require "conn.php";
require "settings.php";

// Function to import a batch of SQL files
function importBatch($start, $filesPath, $filesToUpload, $filePrefix, array $conn)
{
    try {
        $host = $conn['host'];
        $database = $conn['database'];

        $pdo = new PDO("mysql:host={$host};dbname={$database}", $conn['username'], $conn['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $filesCount = count($filesToUpload) - 2;

        for ($i = $start; $i <= $filesCount; $i++) {
            $filename = "$filesPath/$filePrefix" . "_$i.sql";

            if (file_exists($filename)) {
                $sql = file_get_contents($filename);

                if ($sql !== false) {
                    try {
                        // Execute the SQL directly without preparing it each time
                        $pdo->exec($sql);
                        echo "Imported $filename\n";
                    } catch (PDOException $e) {
                        echo "Error importing: file - $filename" . $e->getMessage() . "\n";
                        echo "Continuing with next file." . PHP_EOL;
                        continue; // Move to the next iteration of the loop
                    }
                } else {
                    break;
                }
            } else {
                echo "Not found: $filename\n";
            }
        }
    } catch (PDOException $e) {
        print_r($e);
    }
}

// Import the batch of SQL files
importBatch($startFileNumber, $sqlFilesPath, $filesToUpload, $filePrefix, $conn);
