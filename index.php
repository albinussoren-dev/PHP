<?php
require_once "config.php";
$videos = $conn->query("SELECT * FROM videos ORDER BY id DESC LIMIT 6");
$pdfs = $conn->query("SELECT * FROM pdfs ORDER BY id DESC LIMIT 6");
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>My Website</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<header><div class="container nav"><h2>My Website</h2><nav>
<a href="index.php">Home</a><a href="videos.php">Videos</a><a href="pdfs.php">PDFs</a><a href="admin.php">Admin</a>
</nav></div></header>
<main class="container">
<section class="hero"><h1>Welcome to My Website</h1><p>Videos aur PDF documents ek hi jagah.</p></section>
<section>
<div class="section-title"><h2>Latest Videos</h2><a href="videos.php">View All</a></div>
<div class="grid">
<?php if ($videos && $videos->num_rows): while ($video = $videos->fetch_assoc()): ?>
<div class="card"><video controls preload="metadata"><source src="uploads/videos/<?php echo htmlspecialchars($video['filename']); ?>" type="video/mp4"></video>
<div class="card-body"><h3><?php echo htmlspecialchars($video['title']); ?></h3><p><?php echo htmlspecialchars($video['description']); ?></p></div></div>
<?php endwhile; else: ?><p>No videos available.</p><?php endif; ?>
</div></section>
<section>
<div class="section-title"><h2>Latest PDFs</h2><a href="pdfs.php">View All</a></div>
<div class="grid">
<?php if ($pdfs && $pdfs->num_rows): while ($pdf = $pdfs->fetch_assoc()): ?>
<div class="card pdf-card"><div class="pdf-icon">PDF</div><div class="card-body">
<h3><?php echo htmlspecialchars($pdf['title']); ?></h3><p><?php echo htmlspecialchars($pdf['description']); ?></p>
<a class="button" href="uploads/pdfs/<?php echo rawurlencode($pdf['filename']); ?>" target="_blank">Open PDF</a>
</div></div>
<?php endwhile; else: ?><p>No PDFs available.</p><?php endif; ?>
</div></section>
</main>
<footer><p>© <?php echo date("Y"); ?> My Website</p></footer>
<script src="js/script.js"></script>
</body></html>