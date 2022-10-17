<?php 
    class crud{
        // private database object\
        private $db;

        //constructor to initialize private variable to the database connection
        function __construct($conn){
            $this->db = $conn;
        }

        // function to insert a new record into the attendee database
        public function insertmessage($name, $email, $titre,$text){
            try {
                // define sql statement to be executed
                $sql = "INSERT INTO message ( name,email,titre,text) VALUES (:name,:email,:titre,:text)";
                //prepare the sql statement for execution
                $stmt = $this->db->prepare($sql);
                // bind all placeholders to the actual values
                $stmt->bindparam(':name',$name);
                $stmt->bindparam(':email',$email);
                $stmt->bindparam(':titre',$titre);
                $stmt->bindparam(':text',$text);
    
                // execute statement
                $stmt->execute();
                return true;

            } catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        
       public function getmessages(){
            try{
                $sql = "SELECT * FROM `message` ";
                $result = $this->db->query($sql);
                return $result;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
           }

        }

        public function getmessageDetails($name){
           try{
                $sql = "select * from message where name = :name";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':name', $name);
                $stmt->execute();
                $result = $stmt->fetch();
                return $result;
           }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        public function deleteMessage($name){
           try{
                $sql = "delete from message where name = :name";
                $stmt = $this->db->prepare($sql);
                $stmt->bindparam(':name', $name);
                $stmt->execute();
                return true;
            }catch (PDOException $e) {
                echo $e->getMessage();
                return false;
            }
        }

        



    }
?> 