<?php



require_once("UserServiceInterface.php");



class UserService implements UserServiceInterface{
    private $db = new Database();

    public function getAllUsers()
    {
        $fetchUsersDataQuery = "select * from users";
        $stmt = $this->db->getStmt();
        $stmt= $this->db->connectDB()->prepare($fetchUsersDataQuery);
        
        try{
            $stmt->execute();
        }
        catch(PDOException $e){
            die($e->getMessage());
        }   
               
    }
    public function getUserByUsername($username)
    {
        
    }

    public function addUser($data)
    {
        
    }

    public function updateUser($data)
    {
        
    }

    public function deleteUser($id)
    {
        
    }
}


?>