<?php
echo '
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista estudiante</title>
    <link rel="stylesheet" href="resetStyles.css">
    <link rel="stylesheet" href="mainStructure.css">
    <link rel="stylesheet" href="iconStyle.css">
    <link rel="stylesheet" href="cosmetic.css">
</head>

<body>
    <header>
        <div>
            <h4>este es el header</h4>
        </div>
    </header>

    <nav>
        <span><img src="../src/accountBox.svg" alt="accountBox.vg" name="accountBox"></span>
        <span><img src="../src/accountBox.svg" alt="accountBox.vg" name="accountBox"></span>
        <span><img src="../src/accountBox.svg" alt="accountBox.vg" name="accountBox"></span>
        <h2>NAV</h2>
    </nav>

    <main>
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Allow</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Pedro</td>
                        <td>1234</td>
                        <td>
                            <select name="selectRol" class="styled-select">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="admin">Admin</option>
                            </select>
                        </td>
                        <td><button class="btnAccept">accept</button><button class="btnDeny">deny</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Allow</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Pedro</td>
                        <td>1234</td>
                        <td>
                            <select name="selectRol" class="styled-select">
                                <option value="student">Student</option>
                                <option value="teacher">Teacher</option>
                                <option value="admin">Admin</option>
                            </select>
                        </td>
                        <td><button class="btnAccept">accept</button><button class="btnDeny">deny</button></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    <footer>
        <h1>FOOTER</h1>
    </footer>
</body>

</html>
';

?>