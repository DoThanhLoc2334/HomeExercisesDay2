<?php
session_start();
require_once 'customer.php';

if (!isset($_SESSION['customer'])) {
    $_SESSION['customer'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fullname = $_POST['fullname'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $gender = $_POST['gender'];
    $birthday = $_POST['birthday'];

    $customer = new Customer($id, $username, $password, $fullname, $address, $phone, $gender, $birthday);
    $_SESSION['customer'][] = $customer;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Info</title>
</head>
<body>
    <h2>Add New Customer</h2>
    <form method="post" action="">
        <label>ID: <input type="text" name="id" required></label><br>
        <label>Username: <input type="text" name="username" required></label><br>
        <label>Password: <input type="password" name="password" required></label><br>
        <label>Full Name: <input type="text" name="fullname" required></label><br>
        <label>Address: <input type="text" name="address" required></label><br>
        <label>Phone: <input type="text" name="phone" required></label><br>
        <label>Gender:
            <select name="gender" required>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select>
        </label><br>
        <label>Birthday: <input type="date" name="birthday" required></label><br>
        <input type="submit" value="Add Customer">
    </form>

    <h2>Customer List</h2>
    <table border="1" cellpadding="5">
        <tr>
            <th>ID</th>
            <th>Username</th>
            <th>Password</th>
            <th>Full Name</th>
            <th>Address</th>
            <th>Phone</th>
            <th>Gender</th>
            <th>Birthday</th>
        </tr>
        <?php
        foreach ($_SESSION['customer'] as $cust) {
            echo "<tr>
                <td>{$cust->id}</td>
                <td>{$cust->username}</td>
                <td>{$cust->password}</td>
                <td>{$cust->fullname}</td>
                <td>{$cust->address}</td>
                <td>{$cust->phone}</td>
                <td>{$cust->gender}</td>
                <td>{$cust->birthday}</td>
            </tr>";
        }
        ?>
    </table>
</body>
</html>
