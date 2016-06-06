<?php

class turno extends Crud {
    protected $table = 'turno';
    public function verificaTurno($horaInicial) {
        $horaFormat = str_replace(":", "", $horaInicial);
        $Hora = substr($horaFormat, 0, 2);
        switch ($Hora) {
            case 09: return "1";
            case 10: return "2";
            case 11: return "3";
            case 12: return "4";
            case 13: return "5";    
            case 14: return "6";
            case 15: return "7";    
            case 16: return "8";
            case 17: return "9";
            case 18: return "10";
            case 19: return "11";
            case 20: return "12";
            case 21: return "13";
            case 22: return "14";
            case 23: return "15";
            case 24: return "16";    
        }
        
    }

    public function insert() {
        
    }

    public function update($id) {
        
    }

}
