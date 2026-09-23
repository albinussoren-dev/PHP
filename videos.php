<?php
require_once "config.php";
$result = $conn->query("SELECT * FROM videos ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Videos - My Website</title><link rel="stylesheet" href="css/style.css">
</head><body>
<header><div class="container nav"><h2>My Website</h2><nav>
<a href="index.php">Home</a><a href="videos.php">Videos</a><a href="pdfs.php">PDFs</a><a href="admin.php">Admin</a>
</nav></div></header>
<main class="container"><h1>All Videos</h1><div class="grid">
<?php while ($video = $result->fetch_assoc()): ?>
<div class="card"><video controls preload="metadata"><source src="uploads/videos/<?php echo htmlspecialchars($video['filename']); ?>" type="video/mp4">Your browser does not support video playback.</video>
<div class="card-body"><h3><?php echo htmlspecialchars($video['title']); ?></h3><p><?php echo htmlspecialchars($video['description']); ?></p></div></div>
<?php endwhile; ?>
</div></main></body></html>