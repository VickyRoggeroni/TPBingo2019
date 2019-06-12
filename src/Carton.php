<?php

namespace Bingo;

Class Carton implements CartonInterface
{
    protected $numeros_carton = [];

    public function __construct (array $aleatorio)
    {
	$this->$numeros_carton = $aleatorio;
    }
    
    public function filas() {
    return $this->numeros_carton;
  }
  /**
   * {@inheritdoc}
   */
  public function columnas() {
    $columnas = [];
    
    for($i=0; $i<3; $i++)
    {
        for($a=0; $a<9; $a++)
        {
        $columnas [$j][$i] = $this->numeros_carton;
        }
    }
  }
  
  public function numerosDelCarton() {
    $numeros = [];
    foreach ($this->filas() as $fila) {
      foreach ($fila as $celda) {
        if ($celda != 0) {
          $numeros[] = $celda;
        }
      }
    }
    return $numeros;
  }	
	
    public function tieneNumero(int $numero) {
    return in_array($numero, $this->numeros_carton);
  }
}
