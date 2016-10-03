<h2>User list</h2>
<table border="1">
    <tr>
        <td>First name</td>
        <td>Last name</td>
        <td>Email</td>
        <td>Password</td>
    </tr>
    <?php while ($row = $user->getRow()): ?>
        <tr>
            <td><?php echo $row->getFirstName();?></td>
            <td><?php echo $row->getLastName();?></td>
            <td><?php echo $row->getEmail();?></td>
            <td><?php echo $row->getPassword();?></td>
        </tr>
    <?php endwhile; ?>
</table>