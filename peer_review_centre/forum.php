<?php
    /**
    */
    class Forum {

        var $groupID;
        // Variable forumID will be handled by sql (automatically generated)

        function __construct($groupID) {
            this->groupID = groupID;
        }

        function createInsertQuery(){
            // Create a string that is a MYSQL INSERT query
            $query = "INSERT INTO forums (forumID, groupID) VALUES (NULL, '$groupID');";
            return $query;
        }
    }
?>