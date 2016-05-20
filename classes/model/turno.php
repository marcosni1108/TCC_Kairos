<?php

class turno {
    public function verificTurno($horaInicial) {
        $horaFormat = str_replace(":", "", $horaInicial);
        $horaFormat1 = str_replace(":", "", $horaFormat);
        $Hora = substr($horaFormat1, 0, 2);
        switch ($Hora) {
            
            case 09:
                echo "1";
                break;
            case 10:
                echo "2";
                break;
            case 11:
                echo "3";
                break;
            case 12:
                echo "4";
                break;
            case 14:
                echo "5";
                break;
            case 16:
                echo "6";
                break;
            case 17:
                echo "7";
                break;
            case 18:
                echo "8";
                break;
        }
    }

}
