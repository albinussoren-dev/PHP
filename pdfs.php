<?php
require_once "config.php";
$result = $conn->query("SELECT * FROM pdfs ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>PDFs - My Website</title><link rel="stylesheet" href="css/style.css">
</head><body>
<header><div class="container nav"><h2>My Website</h2><nav>
<a href="index.php">Home</a><a href="videos.php">Videos</a><a href="pdfs.php">PDFs</a><a href="admin.php">Admin</a>
</nav></div></header>
<main class="container"><h1>All PDFs</h1><div class="grid">
<?php while ($pdf = $result->fetch_assoc()): ?>
<div class="card pdf-card"><div class="pdf-icon">PDF</div><div class="card-body">
<h3><?php echo htmlspecialchars($pdf['title']); ?></h3><p><?php echo htmlspecialchars($pdf['description']); ?></p>
<a class="button" href="uploads/pdfs/<?php echo rawurlencode($pdf['filename']); ?>" target="_blank">View PDF</a>
<a class="button secondary" href="uploads/pdfs/<?php echo rawurlencode($pdf['filename']); ?>" download>Download</a>
</div></div>
<?php endwhile; ?>
</div></main></body></html>