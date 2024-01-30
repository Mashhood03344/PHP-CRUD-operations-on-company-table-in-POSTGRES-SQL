<?php

class DbOperations
{
    private $dbconn;

    public function __construct($dbconn)
    {
        $this->dbconn = $dbconn;
    }

    public function createCompany($companyName, $companyDescription)
    {
        $query = "INSERT INTO company (company_name, company_description) VALUES ('$companyName', '$companyDescription')";
        $result = pg_query($this->dbconn, $query);

        return $result;
    }

    public function readCompanies()
    {
        $query = "SELECT * FROM company";
        $result = pg_query($this->dbconn, $query);

        $companies = array();
        while ($row = pg_fetch_assoc($result)) {
            $companies[] = $row;
        }

        return $companies;
    }

    public function readSingleCompany($companyName)
    {
        // $escapedCompanyName = pg_escape_string($this->dbconn, $companyName);
        $query = "SELECT * FROM company WHERE company_name = '$companyName'";
        $result = pg_query($this->dbconn, $query);

        if ($result !== false) {
            // Fetch and echo the data
            while ($row = pg_fetch_assoc($result)) {
                echo "\n\nID: {$row['id']}, Name: {$row['company_name']}, Description: {$row['company_description']}\n";
            }

        } else {
            // Query execution failed
            echo "Error: " . pg_last_error($this->dbconn);
        }

        return $result;
    }


    public function updateCompany($companyId, $companyName, $companyDescription)
    {
        $query = "UPDATE company SET company_name = '$companyName', company_description = '$companyDescription' WHERE id = $companyId";
        $result = pg_query($this->dbconn, $query);

        return $result;
    }

    public function updateCompanyName($companyId, $companyName)
    {
        $query = "UPDATE company SET company_name = '$companyName' WHERE id = $companyId";
        $result = pg_query($this->dbconn, $query);

        return $result;
    }

    public function updateCompanyDescription($companyId, $companyDesc)
    {
        $query = "UPDATE company SET company_description = '$companyDesc' WHERE id = $companyId";
        $result = pg_query($this->dbconn, $query);

        return $result;
    }

    public function deleteCompany($companyId)
    {
        $query = "DELETE FROM company WHERE id = $companyId";
        $result = pg_query($this->dbconn, $query);

        return $result;
    }
}
?>
