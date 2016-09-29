
<h2>User list</h2>
<table border="1">
    <tr>
        <td>First name</td>
        <td>Last name</td>
        <td>Email</td>
        <td>Password</td>
    </tr>
    <?php
    $req = "select * from user";

    $conn = getConnection("test");
    $result = execSql($conn, "select * from user");
    $result = execSql($conn, $req);
    ?>
    <?php while ($user = $result->fetch_assoc()): ?>
        <tr>
            <td><?php echo $user['first_name'];?></td>
            <td><?php echo $user['last_name'];?></td>
            <td><?php echo $user['email'];?></td>
            <td><?php echo $user['password'];?></td>
        </tr>
    <?php endwhile; ?>
</table>