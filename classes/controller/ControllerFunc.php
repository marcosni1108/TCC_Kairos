<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of ControllerFunc
 *
 * @author Ricardo
 */
class ControllerFunc {
    
    
    public function insertFunc($matricula,$nome,$cpf,$email,$login,$nivel,$senha){
        
            $funcionario = new funcionario();
            $funcionario->setMatricula($matricula);
            $funcionario->setNome($nome);
            $funcionario->setCpf($cpf);
            $funcionario->setEmail($email);
            $funcionario->setLogin($login);
            $funcionario->setSenha($senha);
            $funcionario->setNivel($nivel);

            # Insert
            if ($funcionario->insert()) {
                return  true;
                
            }else{
                return  false;
                
            }
        
        
        
    }
}
