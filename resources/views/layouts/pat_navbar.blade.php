<!DOCTYPE html>
<html>
<head>

<style>
ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  overflow: hidden;
  background-color: #333;
}

li {
  float: left;
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
  background-color: #606060;
}

</style>
</head>
<body>

<div id="pat_navbar">

    <ul>
    <li><a class="active" href="#home">Home</a></li>
    <li><a href="/show_pat_appointments">Appointment</a></li>
    <li><a href="/show_pat_notifications">Notification</a></li>
    <li><a href="#contact">Contact</a></li>
    <li><a href="#about">About</a></li>
    </ul>

    <main class="py-4">
        @yield('content')
    </main>

<div>

</body>
</html>
