<?php 
    session_start();

    function Message(){
        if(isset($_SESSION["ErrorMessage"])){
            $OutPut = "<div class=\"alert alert-danger\">";
            $OutPut.= htmlentities($_SESSION["ErrorMessage"]);
            $OutPut.= "</div>";
            $_SESSION["ErrorMessage"] = null;
            return $OutPut;
        }
    }

    function SuccessMessage(){
        if(isset($_SESSION["SuccessMessage"])){
            $OutPut = "<div class=\"alert alert-success\">";
            $OutPut.= htmlentities($_SESSION["SuccessMessage"]);
            $OutPut.= "</div>";
            $_SESSION["ErrorSuccess"] = null;
            return $OutPut;
        }
    }


?>