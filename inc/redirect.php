<?php

if (isset($_GET['search']) && $_GET['search']=='true')
{
	header('Location: cari-'.$_GET['cat'].'?'.$_GET['q']);
}