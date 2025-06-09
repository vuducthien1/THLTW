<?php
session_start();

// Xóa toàn bộ session
$_SESSION = [];
session_destroy();

// Chuyển hướng về trang chính
header("Location: /DucThien/Product/");
exit();
