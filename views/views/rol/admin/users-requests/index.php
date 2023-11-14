<?php
$thisdir = "views/rol/admin/users-requests/";
echo '
<head>
    <!-- CSS - users_request -->
    <!--<link rel="stylesheet" href="'.$thisdir.'css/resetStyles.css">
    <link rel="stylesheet" href="'.$thisdir.'css/mainStructure.css">
    <link rel="stylesheet" href="'.$thisdir.'css/position.css">

    <link rel="stylesheet" href="'.$thisdir.'css/cosmetic.css">
    <link rel="stylesheet" href="'.$thisdir.'css/cosmetic-table.css">

    <link rel="stylesheet" href="'.$thisdir.'css/dropdown.css">
    <link rel="stylesheet" href="'.$thisdir.'css/iconStyle.css">-->

    <link rel="stylesheet" href="'.$thisdir.'css/structure.css">
    <link rel="stylesheet" href="'.$thisdir.'css/cosmetic-table.css">

    <!-- JAVASCRIPT - users_request -->
    <script src="'.$thisdir.'js/admin_ajax.js"></script>
    <script src="'.$thisdir.'js/uploadTable.js"></script>
</head>

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
';

?>