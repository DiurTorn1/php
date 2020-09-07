<?php
session_start();
session_destroy();
echo "<a href='../index.php'>Main</a>";
exit;