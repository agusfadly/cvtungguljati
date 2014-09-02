<?php
$pg = (isset($_GET['pg']) && $_GET['pg'] !== '') ? $_GET['pg'] : 'home';

if (file_exists('controller/controller.'.$pg.'.php'))
{
	include 'controller/controller.'.$pg.'.php';
}
else
{
	show_404();
}