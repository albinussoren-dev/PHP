<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") { header("Location: admin.php"); exit; }

$type = $_POST["type"] ?? "";
$title = trim($_POST["title"] ?? "");
$description = trim($_POST["description"] ?? "");

if ($title === "") die("Title is required.");
if (!isset($_FILES["file"]) || $_FILES["file"]["error"] !== UPLOAD_ERR_OK) die("File upload failed.");

$file = $_FILES["file"];
if ($file["size"] <= 0) die("Invalid file.");

if ($type === "video") {
    $allowed = ["mp4", "webm", "ogg"];
    $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    if (!in_array($extension, $allowed, true)) die("Invalid video format.");
    if ($file["size"] > 500 * 1024 * 1024) die("Video file is too large.");

    $newFilename = bin2hex(random_bytes(16)) . "." . $extension;
    if (!move_uploaded_file($file["tmp_name"], VIDEO_DIR . $newFilename)) die("Could not save video.");

    $stmt = $conn->prepare("INSERT INTO videos (title, description, filename) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $newFilename);
    $stmt->execute();
    header("Location: admin.php?success=video"); exit;
}

if ($type === "pdf") {
    $extension = strtolower(pathinfo($file["name"], PATHINFO_EXTENSION));
    if ($extension !== "pdf") die("Only PDF files are allowed.");
    if ($file["size"] > 50 * 1024 * 1024) die("PDF file is too large.");

    $newFilename = bin2hex(random_bytes(16)) . ".pdf";
    if (!move_uploaded_file($file["tmp_name"], PDF_DIR . $newFilename)) die("Could not save PDF.");

    $stmt = $conn->prepare("INSERT INTO pdfs (title, description, filename) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $title, $description, $newFilename);
    $stmt->execute();
    header("Location: admin.php?success=pdf"); exit;
}

die("Invalid upload type.");
?>