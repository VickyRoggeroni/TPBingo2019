<?php

namespace Bingo;

Class carton implements CartonInterface
{
    protected $carton;

    public function __construct (array $aleatorio)
    {
	$this->carton = $aleatorio;
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
  
    public function tieneNumero(int $numero) {
    return in_array($numero, $this->numeros_carton);
  }
}
