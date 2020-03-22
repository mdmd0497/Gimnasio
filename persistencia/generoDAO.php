<?php
class GeneroDAO 
{
    
    private $id_gen;
    
    private $genero;
    
    
    function __construct($id_gen = "", $genero = "")
    {
       
        $this->id_gen = $id_gen;
        $this->genero = $genero;
        
    }
    
    function consultarTodos()
    {
        return "SELECT id,genero
                FROM genero";
    }
}
?>