<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
$host = getenv("DB_HOST") ?: "34.58.246.93";
$user = getenv("DB_USER") ?: "stud";
$pass = getenv("DB_PASSWORD") ?: "Uwb123!!";
$db   = getenv("DB_NAME") ?: "stud89404";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    http_response_code(500);
    die("DB connection failed: " . $conn->connect_error);
}

$res = $conn->query("SELECT id, name FROM items");
if (!$res) {
    http_response_code(500);
    die("Query error: " . $conn->error);
}
?>
<!doctype html>
<html>
<head><meta charset="utf-8"><title>UWB 89404</title></head>
<body>
<h1>Dane z bazy: <?php echo htmlspecialchars($db); ?></h1>
<ul>
<?php while($row = $res->fetch_assoc()): ?>
  <li><?php echo (int)$row["id"]; ?> - <?php echo htmlspecialchars($row["name"]); ?></li>
<?php endwhile; ?>
</ul>
</body>
</html>
