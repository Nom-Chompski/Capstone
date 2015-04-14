<?php
class enzyme
{
	 /**
     * @param object $db A PDO database connection
     */
    function __construct($db)
    {
        try {
            $this->db = $db;
        } catch (PDOException $e) {
            exit('Database connection could not be established.');
        }
    }

    function addEnzymes($enzymearray){
        
        $sql = "INSERT INTO enzymeTable (EnzymeName, SamePatternEnzymes, RecognitionPattern, RecognitionforComputing, RecognitionPatternLength, CleavagePositionUpper, CleavagePositionLower, NonNbases) 
                VALUES (:EnzymeName, :SamePatternEnzymes, :RecognitionPattern, :RecognitionforComputing, :RecognitionPatternLength, :CleavagePositionUpper, :CleavagePositionLower, :NonNbases)";

        $query = $this->db->prepare($sql);
        $parameters = array(':EnzymeName' => $enzymearray[0],
                            ':SamePatternEnzymes' => $enzymearray[1],
                            ':RecognitionPattern' => $enzymearray[2],
                            ':RecognitionforComputing' => $enzymearray[3],
                            ':RecognitionPatternLength' => $enzymearray[4],
                            ':CleavagePositionUpper' => $enzymearray[5],
                            ':CleavagePositionLower'=> $enzymearray[6],
                            ':NonNbases'=> $enzymearray[7]);

        return $query->execute($parameters);

    }

    function getEnzymeNamesAndID(){
        $sql = "SELECT EnzymeID, EnzymeName from enzymeTable";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function getAllEnzymeID(){
        $sql = "SELECT EnzymeID from enzymeTable";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function getEnzymeNames(){
        $sql = "SELECT EnzymeName from enzymeTable";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function getEnzymesForCutting(){
        $sql = "select * from enzymeTable";
        $query = $this->db->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    function getEnzymeNamesByID($idArray){
        $sql = "Select EnzymeName, EnzymeID from enzymeTable where EnzymeID in (";
        $qpart = array_fill(0,count($idArray),"?");
        $sql .= implode(',', $qpart) . ')';
        $query = $this->db->prepare($sql);
        $i= 1;
        foreach ($idArray as $key => $value) {
            $query->bindValue($i++, $value);
        }
        $query->execute();
        return $query->fetchAll();
    }
}