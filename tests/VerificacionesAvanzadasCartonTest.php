<?php

namespace Bingo;

use PHPUnit\Framework\TestCase;

class VerificacionesAvanzadasCartonTest extends TestCase {

  /**
   * Verifica que los números del carton se encuentren en el rango 1 a 90.
   */
  public function testUnoANoventa() {
    
    $bool = TRUE;
    $carton=new CartonEjemplo;
    foreach ($carton->filas() as $fila) {
      foreach ($fila as $celda) {
        if($celda == 0){
          continue;
        }
        if ($celda < 1 || $celda > 90) {
          $bool = FALSE;
        }
      }
    }
    $this->assertTrue($bool);
  }

  /**
   * Verifica que cada fila de un carton tenga exactamente 5 celdas ocupadas.
   */
  public function testCincoNumerosPorFila() {
    
    $carton=new CartonEjemplo;
    foreach($carton->filas() as $fila) {
      $this->assertCount(5,array_filter($fila));
    }
  }

  /**
   * Verifica que para cada columna, haya al menos una celda ocupada.
   */
  public function testColumnaNoVacia() {

    $carton=new CartonEjemplo;
    $co = 0;
    foreach($carton->columnas() as $columna){
      foreach($columna as $celda){
        if ($celda != 0){
        $co=$co+1;
        }
      }
      if($co == 0){
        $this->assertTrue(FALSE);
      }
      else{
        $co = 0;
      }
    }
    $this->assertTrue(TRUE);
  }

  /**
   * Verifica que no haya columnas de un carton con tres celdas ocupadas.
   */
  public function testColumnaCompleta() {

    $carton = new CartonEjemplo;
    $co=0;
    foreach($carton->columnas() as $columna) {
      foreach($columna as $celda){
        if($celda != 0){
          $co++;
        }
      }
      $this->assertNotEquals(3, $co);
      $co = 0; 
    }

  }

  /**
   * Verifica que solo hay exactamente tres columnas que tienen solo una celda
   * ocupada.
   */
  public function testTresCeldasIndividuales(CartonInterface $carton) {
    
    $co2 = 0;
    foreach($carton->columnas() as $columna) {
      $c0 = 0;
      foreach($columna as $celda){
        if($celda != 0){
          $co++;
        }
      }
      if($co == 1){
        $co2++;
      }
    }
    $this->assertEquals(3, $co);

  }

  /**
   * Verifica que los números de las columnas izquierdas son menores que los de
   * las columnas a la derecha.
   */
  public function testNumerosIncrementales() {

    $max = 0;
    $cel = 0;
    $carton = new CartonEjemplo;
    foreach($carton->columnas() as $columna){
      $min = 100;
      foreach($columna as $celda){
        if($celda < $min && $celda != 0){
          $min = $celda;
        }
        if ($celda > $cel){
          $cel = $celda;
        }
      }
      if($min>$max){
        $this->assertTrue(TRUE);
      }
      else{
        $this->assertTrue(FALSE);
      }
      $max = $cel;
    }
  }

  /**
   * Verifica que en una fila no existan más de dos celdas vacias consecutivas.
   */
  public function testFilasConVaciosUniformes() 
  {

    $carton = new CartonEjemplo;
    foreach($carton->filas() as $fila)
    {	
      $co = 0;
        foreach($fila as $celda)
        {
      	      if($celda == 0)
              {
                $co++; 
              }
              else
              {
                $comax=$co;
                $co = 0;
              }
        }//llave foreach2
        if($comax < 3)
        {
          $this->assertTrue(TRUE);
        }
        else
        {
          $this->assertTrue(FALSE);
        } //else
     } //llave foreach1
  } //lave funcion

} //llave de la clase
