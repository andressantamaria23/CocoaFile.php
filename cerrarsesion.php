<?php

session_start();
session_destroy();

echo '<script>alert("Sesion cerrada");
location.assign("login.html");
</script>';

?>