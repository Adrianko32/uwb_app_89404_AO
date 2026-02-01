<?php
$host = getenv("DB_HOST");
$user = getenv("DB_USER");
$pass = getenv("DB_PASSWORD");
$db   = getenv("DB_NAME");

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("DB connection failed: " . $conn->connect_error);
}

$res = $conn->query("SELECT id, name FROM items");
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>89404</title></head>
<body>
<h1>Dane z bazy (stud89404)</h1>
<ul>
<?php while($row = $res->fetch_assoc()): ?>
  <li><?= htmlspecialchars($row["id"]) ?> - <?= htmlspecialchars($row["name"]) ?></li>
<?php endwhile; ?>
</ul>
</body>
</html>
