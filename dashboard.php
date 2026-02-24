<?php
session_start();
$conn = new mysqli("localhost", "root", "", "raj_dental_db");

if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit();
}

// Handle Actions
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM bookings WHERE id=$id");
}

if (isset($_GET['seen'])) {
    $id = $_GET['seen'];
    $conn->query("UPDATE bookings SET status='Seen' WHERE id=$id");
}

if (isset($_GET['missed'])) {
    $id = $_GET['missed'];
    $conn->query("UPDATE bookings SET status='Missed' WHERE id=$id");
}

$result = $conn->query("SELECT * FROM bookings ORDER BY created_at DESC");
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="admin.css">
</head>
<body>

<h1>Raj Dental Admin Dashboard</h1>

<h2>All Appointments</h2>

<table>
<tr>
<th>Name</th>
<th>Email</th>
<th>Phone</th>
<th>Date</th>
<th>Service</th>
<th>Status</th>
<th>Actions</th>
</tr>

<?php while($row = $result->fetch_assoc()) { ?>
<tr>
<td><?php echo $row['name']; ?></td>
<td><?php echo $row['email']; ?></td>
<td><?php echo $row['phone']; ?></td>
<td><?php echo $row['date']; ?></td>
<td><?php echo $row['service']; ?></td>
<td><?php echo $row['status']; ?></td>
<td>
<a href="?seen=<?php echo $row['id']; ?>">Seen</a> |
<a href="?missed=<?php echo $row['id']; ?>">Missed</a> |
<a href="?delete=<?php echo $row['id']; ?>" onclick="return confirm('Delete booking?')">Delete</a>
</td>
</tr>
<?php } ?>
</table>

<hr>

<h2>Seen Patients</h2>
<?php
$seen = $conn->query("SELECT * FROM bookings WHERE status='Seen'");
while($row = $seen->fetch_assoc()) {
    echo $row['name'] . " - " . $row['date'] . "<br>";
}
?>

<h2>Missed Patients</h2>
<?php
$missed = $conn->query("SELECT * FROM bookings WHERE status='Missed'");
while($row = $missed->fetch_assoc()) {
    echo $row['name'] . " - " . $row['date'] . "<br>";
}
?>

</body>
</html>