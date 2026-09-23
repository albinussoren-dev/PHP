<?php
require_once "config.php";
$videos = $conn->query("SELECT * FROM videos ORDER BY id DESC");
$pdfs = $conn->query("SELECT * FROM pdfs ORDER BY id DESC");
?>
<!DOCTYPE html><html lang="en"><head>
<meta charset="UTF-8"><meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin - My Website</title><link rel="stylesheet" href="css/style.css">
</head><body>
<header><div class="container nav"><h2>Admin Panel</h2><nav>
<a href="index.php">Website</a><a href="videos.php">Videos</a><a href="pdfs.php">PDFs</a>
</nav></div></header>
<main class="container"><h1>Upload Content</h1>
<?php if (isset($_GET["success"])): ?><div class="success">Upload successful.</div><?php endif; ?>

<div class="upload-box"><h2>Upload Video</h2>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="type" value="video">
<label>Video Title</label><input type="text" name="title" placeholder="Enter video title" required>
<label>Description</label><textarea name="description" placeholder="Video description"></textarea>
<label>Select Video</label><input type="file" name="file" accept="video/mp4,video/webm,video/ogg" required>
<button type="submit">Upload Video</button>
</form></div>

<div class="upload-box"><h2>Upload PDF</h2>
<form action="upload.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="type" value="pdf">
<label>PDF Title</label><input type="text" name="title" placeholder="Enter PDF title" required>
<label>Description</label><textarea name="description" placeholder="PDF description"></textarea>
<label>Select PDF</label><input type="file" name="file" accept="application/pdf" required>
<button type="submit">Upload PDF</button>
</form></div>

<h2>Uploaded Videos</h2><div class="admin-list">
<?php while ($video = $videos->fetch_assoc()): ?><div class="admin-item"><strong><?php echo htmlspecialchars($video["title"]); ?></strong><span><?php echo htmlspecialchars($video["filename"]); ?></span></div><?php endwhile; ?>
</div>

<h2>Uploaded PDFs</h2><div class="admin-list">
<?php while ($pdf = $pdfs->fetch_assoc()): ?><div class="admin-item"><strong><?php echo htmlspecialchars($pdf["title"]); ?></strong><span><?php echo htmlspecialchars($pdf["filename"]); ?></span></div><?php endwhile; ?>
</div>
</main></body></html>