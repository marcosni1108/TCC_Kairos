<?php

class turno {
    public function verificaTurno($horaInicial) {
        $horaFormat = str_replace(":", "", $horaInicial);
        $Hora = substr($horaFormat, 0, 2);
        switch ($Hora) {
            case 09: return "1";
            case 10: return "2";
            case 11: return "3";
            case 12: return "4";
            case 14: return "5";
            case 16: return "6";
            case 17: return "7";
            case 18: return "8";
        }
        
    }

}
