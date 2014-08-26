<?php
unset($_SESSION['member_id']);
unset($_SESSION['member_nama']);
unset($_SESSION['member_email']);
header('Location: '.BASE_URL.'index.php'); 