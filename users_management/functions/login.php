<?php
    /**
     * Libraries
     */
    require 'session.php';
?>

<?php
    
    function login() {
        
    }

    
    function logout() {
        endSession();
    }

    
    function isLoged() {
        if ( existSession('user') && readSession('user') != '' )
        { return true; }
        return false;
    }

?>