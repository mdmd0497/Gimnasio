<?php
class rhDAO
{
    
    private $id_r;
    private $rh;
    
    function __construct($id_rh = "", $rh = "")
    {
        
        $this->id_rh = $id_rh;
        $this->rh = $rh;
        
    }
    
    function consultarTodos(){
        return "SELECT id,rh
                FROM rh";
    }
}
?>