<?php
$host = "localhost";
$dbname = "my_website";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Database connection failed: " . $conn->connect_error);
}

$conn->set_charset("utf8mb4");

define("VIDEO_DIR", __DIR__ . "/uploads/videos/");
define("PDF_DIR", __DIR__ . "/uploads/pdfs/");

if (!is_dir(VIDEO_DIR)) mkdir(VIDEO_DIR, 0755, true);
if (!is_dir(PDF_DIR)) mkdir(PDF_DIR, 0755, true);
?>