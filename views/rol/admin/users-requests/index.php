<?php
$thisdir = "views/rol/admin/users-requests/";
echo '
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ADMIN - users requests</title>
    <!-- CSS -->
    <link rel="stylesheet" href="'.$thisdir.'css/resetStyles.css">
    <link rel="stylesheet" href="'.$thisdir.'css/mainStructure.css">
    <link rel="stylesheet" href="'.$thisdir.'css/position.css">

    <link rel="stylesheet" href="'.$thisdir.'css/cosmetic.css">
    <link rel="stylesheet" href="'.$thisdir.'css/cosmetic-table.css">

    <link rel="stylesheet" href="'.$thisdir.'css/dropdown.css">
    <link rel="stylesheet" href="'.$thisdir.'css/iconStyle.css">

    <!-- JAVASCRIPT -->
    <script src="'.$thisdir.'js/admin_ajax.js"></script>
    <script src="'.$thisdir.'js/uploadTable.js"></script>
</head>

<body>
    <header>
        <div>
            <h4>este es el header</h4>
        </div>
    </header>

    <nav>
        <span><a href="?menu=landingpage" class="btn">Main</a></span>
        <span class="dropdown">
            <a href="?myAccount" class="dropbtn"><img src="src/icons/accountBox64x64.svg" alt="account-box"></a>
            <div class="dropdown-content">
                <p class="name">'.Session::read("user")->getName().'</p>
                <a href="?menu=logout" class="dropbtn">Logout</a>
                <a href="?menu=myAccount" class="dropbtn">My account</a>
            </div>
        </span>
    </nav>

    <main>
        <div>
            <table id="tRequestUsers">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Allow</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Pedro</td>
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
            <button name="rellenar" id="temp">Rellenar</button>
        </div>

        <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Role</th>
                        <th>Allow</th>
                    </tr>
                </thead>

                <tbody>
                    <tr>
                        <td>Pedro</td>
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