<?php
require "conn.php";
require "settings.php";

// Function to import a batch of SQL files
function importBatch($start, $filesPath, $filePrefix, array $conn)
{
    try {
        $host = $conn['host'];
        $database = $conn['database'];
        //$username = $conn['username'];
        //$password = $conn['password'];

        $pdo = new PDO("mysql:host={$host};dbname={$database}", $conn['username'], $conn['password']);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $files = scandir("../final/drmagno");
        $filesCount = count($files) - 2;

        for ($i = $start; $i <= $filesCount; $i++) {
            $filename = "$filesPath/$filePrefix" . "_$i.sql";

            if (file_exists(realpath($filename))) {
                $sql = file_get_contents($filename);

                if ($sql !== false) {
                    try {
                        $pdo->exec($sql);
                        echo "Imported $filename\n";
                    } catch (PDOException $e) {
                        echo "Error importing: file - $filename" . $e->getMessage() . "\n";
                        echo "Index stopped at $i." . PHP_EOL;
                        break;
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
importBatch($startFileNumber, $sqlFilesPath, $filePrefix, $conn);
