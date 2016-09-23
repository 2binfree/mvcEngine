<?php
/**
 * User: ubuntu
 * Date: 22/09/16
 * Time: 10:35
 */
    require "../src/bdd.php";
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
    </head>
    <body>
        <h2>User list</h2>
            <table border="1">
                <tr>
                    <td>First name</td>
                    <td>Last name</td>
                    <td>Email</td>
                    <td>Password</td>
                </tr>
                <?php
                    $conn = getConnection();
                    $result = execSql($conn, "select * from user");
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
        <hr>
        <h2>New user</h2>
        <hr>
        <form name="contact" action="/form/src/form.php" method="post">
            Firstname :
            <input type="text" value="" name="firstname"/>
            <br/>
            Lastname :
            <input type="text" value="" name="lastname"/>
            <br/>
            Email :
            <input type="text" value="" name="email"/>
            <br/>
            Password :
            <input type="text" value="" name="password"/>
            <br/>
            <input type="submit"/>
        </form>
    </body>
</html>
