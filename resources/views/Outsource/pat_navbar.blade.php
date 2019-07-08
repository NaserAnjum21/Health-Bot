<!DOCTYPE html>
<html>
<head>

<link rel="shortcut icon" href="img/logo.ico" />

<style>

body {margin:0;}

#sidebar {
  position: fixed;
  top: 40px; /* add height + padding of header */
  left: 0;
  width: 250px;
  height: 100%;
  padding: 10px;
  background-color: #333;
  color: white;
}
#content {
  margin: 45px 0 0 270px; /* add adjacent elements' size + padding */
  padding: 10px;
}
#content_left {
  margin: 45px 0 0 270px; /* add adjacent elements' size + padding */
  padding: 10px;
}
#content_right {
  margin: 45px 0 0 270px; /* add adjacent elements' size + padding */
  padding: 10px;
}
#content_middle {
  margin: 100px 250px 0 500px; /* add adjacent elements' size + padding */
  padding: 10px;
}

.full-height {
  height: 100%;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
  position: fixed;
  top: 0;
  width: 100%;
}

li {
  float: left;
  font-weight: lighter;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}

li a {
  display: block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li a:hover:not(.active) {
  background-color: #111;
}

.active {
  background-color: #505050;
  color: #DAA520;
}

.p-big{
    padding: 10px;
    line-height: 0.8;
    font-weight: lighter;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 16px;
}

.big-font{
    font-weight: bold;
    color: #808080;
}

.hel-font{
    padding-top: 25px;
    padding-right: 0px;
    padding-left: 80px;
    line-height: 0;
    font-weight: normal;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 22px;
    color: #DAA520;
}

.bot-font{
    padding-top: 15px;
    padding-right: 50px;
    padding-left: 0px;
    line-height: 0.8;
    font-weight: normal;
    font-family: Arial, Helvetica, sans-serif;
    font-size: 22px;
    color: #C0C0C0;
}

/* dropdown */

li .dropbtn {
  display: inline-block;
  color: white;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
}

li .dropdown:hover .dropbtn {
  background-color: #505050;
}

li.dropdown {
  display: inline-block;
}

.dropdown-content {
  display: none;
  position: absolute;
  background-color: #505050;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
  text-align: left;
}

.dropdown-content a:hover {background-color: #505050;}

.dropdown:hover .dropdown-content {
  display: block;
}

/* form */

input[type=text] {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-weight: lighter;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}

select {
  width: 35%;
  padding: 6px 20px;
  margin: 8px 0;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
  font-weight: lighter;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}

input[type=submit] {
  width: 33%;
  background-color: #505050;
  color: #DAA520;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  font-weight: lighter;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
  float: center;
}

input[type=text]:focus {
    background-color: #D3D3D3;
}

input[type=submit]:hover {
  background-color: #333;
}

.label{
  font-weight: lighter;
  font-family: Arial, Helvetica, sans-serif;
  font-size: 14px;
}

.option{
  background-color: #D3D3D3;
}

/* button */

.button {
    background-color: #505050;
    border: none;
    border-radius: 0px;
    color: white;
    padding: 12px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 16px 8px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button_sidebar{
    background-color: #505050;
    border: none;
    border-radius: 0px;
    color: white;
    padding: 12px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 14px;
    margin: 0px 0px;
    width: 250px;
    cursor: pointer;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
}

.button1 {
    background-color: #333; 
    color: white; 
    border: 2px solid #505050;
}
.button1:hover {
    background-color: #505050;
    color: white;
}

.button2 {
    box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2), 0 6px 20px 0 rgba(0,0,0,0.19);
}

</style>
</head>
<body>

<div id="pat_navbar">
  <main class="py-4">

    @yield('content')
  </main>

<div>

</body>
</html>
