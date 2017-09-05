<!DOCTYPE html>
<html>
  <head>
  <meta charset="utf-8">
    <title> Web Tracking </title>
    <link rel="stylesheet" href="./css/style.css">
    <link rel="icon" href="./images/syrus.ico">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flexboxgrid/6.3.1/flexboxgrid.min.css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  </head>
  <label for="timefilter"> Filtrar por tiempo : </label>
  <br />   <br /> 
  <form action="historicquery.php" method="POST">
  <select id="year" name="yrbeg" >
    <option value="0">Año inicio</option>
    <option value="21">2021</option>
    <option value="20">2020</option>
    <option value="19">2019</option>
    <option value="18">2018</option>
    <option value="17">2017</option>
    <option value="16">2016</option>
    <option value="15">2015</option>
    <option value="14">2014</option>
  </select>
  <select id="yeartil" name="yrend" >
    <option value="0">Año fin</option>
    <option value="21">2021</option>
    <option value="20">2020</option>
    <option value="19">2019</option>
    <option value="18">2018</option>
    <option value="17">2017</option>
    <option value="16">2016</option>
    <option value="15">2015</option>
    <option value="14">2014</option>
  </select>
  <br />   <br /> 
  <select id="month" name="monbeg" >
    <option value="0">Mes inicio</option>
    <option value="1">Enero</option>
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>
  <select id="monthtil" name="monend" >
    <option value="0">Mes fin</option>
    <option value="1">Enero</option>
    <option value="2">Febrero</option>
    <option value="3">Marzo</option>
    <option value="4">Abril</option>
    <option value="5">Mayo</option>
    <option value="6">Junio</option>
    <option value="7">Julio</option>
    <option value="8">Agosto</option>
    <option value="9">Septiembre</option>
    <option value="10">Octubre</option>
    <option value="11">Noviembre</option>
    <option value="12">Diciembre</option>
  </select>
  <br />   <br /> 
  <select id="day" name="daybeg" >
      <option value="0">Día inicio</option>
      <option value="1">01</option>
      <option value="2">02</option>
      <option value="3">03</option>
      <option value="4">04</option>
      <option value="5">05</option>
      <option value="6">06</option>
      <option value="7">07</option>
      <option value="8">08</option>
      <option value="9">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
      <option value="17">17</option>
      <option value="18">18</option>
      <option value="19">19</option>
      <option value="20">20</option>
      <option value="21">21</option>
      <option value="22">22</option>
      <option value="23">23</option>
      <option value="24">24</option>
      <option value="25">25</option>
      <option value="26">26</option>
      <option value="27">27</option>
      <option value="28">28</option>
      <option value="29">29</option>
      <option value="30">30</option>
      <option value="31">31</option>
  </select>
  </select>
    <select id="daytil" name="dayend" >
    <option value="0">Día fin</option>
    <option value="1">01</option>
    <option value="2">02</option>
    <option value="3">03</option>
    <option value="4">04</option>
    <option value="5">05</option>
    <option value="6">06</option>
    <option value="7">07</option>
    <option value="8">08</option>
    <option value="9">09</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
    <option value="14">14</option>
    <option value="15">15</option>
    <option value="16">16</option>
    <option value="17">17</option>
    <option value="18">18</option>
    <option value="19">19</option>
    <option value="20">20</option>
    <option value="21">21</option>
    <option value="22">22</option>
    <option value="23">23</option>
    <option value="24">24</option>
    <option value="25">25</option>
    <option value="26">26</option>
    <option value="27">27</option>
    <option value="28">28</option>
    <option value="29">29</option>
    <option value="30">30</option>
    <option value="31">31</option>
  </select>
  <br />   <br /> 
  <select id="hour" name="hourbeg" >
    <option value="-1">Hora inicio</option>
    <option value="0">00:00</option>
    <option value="1">01:00</option>
    <option value="2">02:00</option>
    <option value="3">03:00</option>
    <option value="4">04:00</option>
    <option value="5">05:00</option>
    <option value="6">06:00</option>
    <option value="7">07:00</option>
    <option value="8">08:00</option>
    <option value="9">09:00</option>
    <option value="10">10:00</option>
    <option value="11">11:00</option>
    <option value="12">12:00</option>
    <option value="13">13:00</option>
    <option value="14">14:00</option>
    <option value="15">15:00</option>
    <option value="16">16:00</option>
    <option value="17">17:00</option>
    <option value="18">18:00</option>
    <option value="19">19:00</option>
    <option value="20">20:00</option>
    <option value="21">21:00</option>
    <option value="22">22:00</option>
    <option value="23">23:00</option>
  </select>
  <select id="hourtil" name="hourend" >
    <option value="-1">Hora fin</option>
    <option value="0">00:00</option>
    <option value="1">01:00</option>
    <option value="2">02:00</option>
    <option value="3">03:00</option>
    <option value="4">04:00</option>
    <option value="5">05:00</option>
    <option value="6">06:00</option>
    <option value="7">07:00</option>
    <option value="8">08:00</option>
    <option value="9">09:00</option>
    <option value="10">10:00</option>
    <option value="11">11:00</option>
    <option value="12">12:00</option>
    <option value="13">13:00</option>
    <option value="14">14:00</option>
    <option value="15">15:00</option>
    <option value="16">16:00</option>
    <option value="17">17:00</option>
    <option value="18">18:00</option>
    <option value="19">19:00</option>
    <option value="20">20:00</option>
    <option value="21">21:00</option>
    <option value="22">22:00</option>
    <option value="23">23:00</option>
  </select>
  <br />   <br /> 
  <select id="howmany" name="numevents" >
    <option value="0">Eventos a desplegar</option>
    <option value="1">1</option>
    <option value="10">10</option>
    <option value="100">100</option>
    <option value="1000">1000</option>
  </select>
  <br />   <br /> 
  <button type="submit">Buscar</button><br>
  </form>
</html>
