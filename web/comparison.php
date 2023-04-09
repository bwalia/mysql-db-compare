<?php
if (in_array("", $_POST)) {
    echo "<p>Please fill the details</p>";
    exit;
}
// Define the database credentials
$sourceDbHost = $_POST['sourceHost'];
$sourceDbUser = $_POST['sourceUsername'];
$sourceDbPass = $_POST['sourcePassword'];
$sourceDbName = $_POST['sourceDatabase'];

$targetDbHost = $_POST['targetHost'];
$targetDbUser = $_POST['targetUsername'];
$targetDbPass = $_POST['targetPassword'];
$targetDbName = $_POST['targetDatabase'];

// Connect to the source database
$sourceDb = mysqli_connect($sourceDbHost, $sourceDbUser, $sourceDbPass, $sourceDbName);

if (!$sourceDb) {
    die("Connection failed: " . mysqli_connect_error());
}

// Connect to the target database
$targetDb = mysqli_connect($targetDbHost, $targetDbUser, $targetDbPass, $targetDbName);

if (!$targetDb) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the list of tables from the source database
$sourceTables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($sourceDb, $sql);

while ($row = mysqli_fetch_row($result)) {
    $sourceTables[] = $row[0];
}

// Get the list of tables from the target database
$targetTables = array();
$sql = "SHOW TABLES";
$result = mysqli_query($targetDb, $sql);

while ($row = mysqli_fetch_row($result)) {
    $targetTables[] = $row[0];
}

// Compare the tables in the source and target databases
foreach ($sourceTables as $table) {
    if (!in_array($table, $targetTables)) {
        echo "<p>Table '$table' is missing in the target database.\n</p>";
    } else {
        // Get the columns in the source table
        $sourceColumns = array();
        $sql = "SHOW COLUMNS FROM $table";
        $result = mysqli_query($sourceDb, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $sourceColumns[] = $row["Field"];
        }

        // Get the columns in the target table
        $targetColumns = array();
        $sql = "SHOW COLUMNS FROM $table";
        $result = mysqli_query($targetDb, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            $targetColumns[] = $row["Field"];
        }

        // Compare the columns in the source and target tables
        foreach ($sourceColumns as $column) {
            if (!in_array($column, $targetColumns)) {
                echo "<p>Column '$column' is missing in table '$table' in the target database.\n</p>";
            }
        }

        foreach ($targetColumns as $column) {
            if (!in_array($column, $sourceColumns)) {
                echo "<p>Column '$column' is missing in table '$table' in the source database.\n</p>";
            }
        }
    }
}

// Close the database connections
mysqli_close($sourceDb);
mysqli_close($targetDb);
?>