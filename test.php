<?php
// Including the connection file
include 'connection.php';

// Including the DbOperations file
include 'DbOperations.php';

// Creating an instance of the DbOperations class with the database connection as the parameter for the constructor
$dbOperations = new DbOperations($dbconn);

// Testing the createCompany function
$resultCreate = $dbOperations->createCompany('Test Company', 'Test Description');
if ($resultCreate !== false) {
    echo "Company record added successfully!"."<br>";
} else {
    echo "Error: " . pg_last_error($dbconn) . "<br>";
}

// Testing the readCompanies function
$companies = $dbOperations->readCompanies();
if (!empty($companies)) {
    echo "\nList of Companies:\n";
    foreach ($companies as $company) {
        echo "<br>"."ID: {$company['id']}, Name: {$company['company_name']}, Description: {$company['company_description']}"."<br>";
    }
} else {
    echo "\nNo companies found.\n";
}

// Testing the updateCompany function
$resultUpdate = $dbOperations->updateCompany(1, 'Updated Company', 'Updated Description');
if ($resultUpdate !== false) {
    echo "<br>" . "Company record updated successfully!" . "<br>";
} else {
    echo "Error: " . pg_last_error($dbconn) . "\n";
}

// Testing the deleteCompany function
$resultDelete = $dbOperations->deleteCompany(2);
if ($resultDelete !== false) {
    echo  "<br>" . "Company record deleted successfully!" . "<br>";
} else {
    echo "Error: " . pg_last_error($dbconn) . "\n";
}

// Testing the readSingleCompany function

$resultSingleCompany = $dbOperations->readSingleCompany('Facebook');
if ($resultSingleCompany !== false) {
    echo  "<br>" . "Company record found successfully!" . "<br>";
} else {
    echo "Error: " . pg_last_error($dbconn) . "\n";
}


// Testing the readupdateCompanyName function

$resultUpdateCompanyName = $dbOperations->updateCompanyName(1,'UpdatedCompany2ndTime');
if ($resultUpdateCompanyName !== false) {
    echo  "<br>" . "Company record Name Updated successfully!" . "<br>";
} else {
    echo "Error: " . pg_last_error($dbconn) . "\n";
}

// Testing the updateCompanyName function

$resultUpdateCompanyDescription = $dbOperations->updateCompanyDescription(1,'UpdatedDescription2ndTime');
if ($resultUpdateCompanyDescritption !== false) {
    echo  "<br>" . "Company record Description Updated successfully!\n" .  "<br>";
} else {
    echo "Error: " . pg_last_error($dbconn) . "<br>";
}


// Closing the database connection
pg_close($dbconn);
?>
