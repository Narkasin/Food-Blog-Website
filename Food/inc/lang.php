<?php

$en_login = array(
    'Login' => 'Login', 
    'Access' => 'Access the Food Blog panel using your username and password.', 
    'Username' => 'Username', 
    'Password' => 'Password', 
    'Incorrect password' => 'Incorrect password', 
    'Invalid username' => 'Invalid username', 
    'Please' => 'Please fill in the form correctly'
);

$es_login = array(
    'Login' => 'Acceso', 
    'Access' => 'Access the Food Blog panel using your username and password.', 
    'Username' => 'Nombre de usuario', 
    'Password' => 'Contraseña', 
    'Incorrect password' => 'Contraseña incorrecta', 
    'Invalid username' => 'Nombre de usuario no válido', 
    'Please' => 'Por favor complete el formulario correctamente'
);

$en_sidebar = array(
    'Applications' => 'Applications', 
    'File Manager' => 'Home', 
    'Settings' => 'Settings', 
    'File extensions' => 'Messages', 
    'Categories' => 'Categories', 
    'Labels' => 'Foods', 
    'Users' => 'Users', 
    'Roles' => 'Roles', 
    'Profile' => 'Profile'
);

$es_sidebar = array(
    'Applications' => 'Aplicaciones', 
    'File Manager' => 'Home', 
    'Settings' => 'Ajustes', 
    'File extensions' => 'Messages', 
    'Categories' => 'Categorías', 
    'Labels' => 'Foods', 
    'Users' => 'Usuarios', 
    'Roles' => 'Roles', 
    'Profile' => 'Perfil'
);

$en = array('sidebar' => $en_sidebar, 'login' => $en_login);
$es = array('sidebar' => $es_sidebar, 'login' => $es_login);
$lang = array('en' => $en, 'es' => $es);

$current_lang = 'en';

if (isset($_SESSION['current_lang'])) {

    $current_lang = $_SESSION['current_lang'];

} else {

    $current_lang = 'en';

}

?>