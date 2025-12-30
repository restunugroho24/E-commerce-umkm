<?php
// Inisialisasi aplikasi: autoload + database
require_once __DIR__ . '/autoload.php';
require_once __DIR__ . '/Database.php';
// set timezone
if (!ini_get('date.timezone')) date_default_timezone_set('Asia/Jakarta');
