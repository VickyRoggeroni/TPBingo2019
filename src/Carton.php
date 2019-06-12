<?php

namespace Bingo;

Class Carton implements CartonInterface
{
    protected $numeros_carton = [];

    public function __construct (array $aleatorio)
    {
	$this->numeros_carton = $aleatorio;
    }
      /**
   * {@inheritdoc}
   */
	
    public function filas() {
    $fila = [];
    $fila[] = [];
    for($i=0;$i<3;$i++)
    {
        foreach ($this->columnas() as $columna)
        {
          $fila[$i][]=$columna[$i];
        }
    }
  
     return $fila;
  
  }
	
  /**
   * {@inheritdoc}
   */
  public function columnas() {
	return $this->numeros_carton;
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

    /**
   * {@inheritdoc}
   */	
    public function tieneNumero(int $numero) {
    return in_array($numero, $this->numeros_carton);
  }
}
