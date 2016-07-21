<?php

  class TrataJson {

      public function lerJsonUnico($json, $nomeJson, $nomePropriedade) {
          foreach($json -> $nomeJson as $campo) {
              $valor = $campo -> $nomePropriedade;
          }
          return $valor;
      }

  }
  