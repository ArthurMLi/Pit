<?php

interface ContaDAO {
    public function getAllUsers(); // This should return an array of User objects
    public function getUser($id); // This should return a User object
    public function updateUser($conta); // This should update a User object
    public function deleteUser($conta); // This should delete a User object
}

?>