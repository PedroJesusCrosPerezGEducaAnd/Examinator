<?php
$thisdir = "views/rol/admin/users-requests/";
echo '
<head>
    <!-- CSS - users_request -->
    <link rel="stylesheet" href="'.$thisdir.'css/structure.css">
    <link rel="stylesheet" href="'.$thisdir.'css/cosmetic-table.css">

    <!-- JAVASCRIPT - users_request -->
    <script src="'.$thisdir.'js/admin_ajax.js"></script>
    <script src="'.$thisdir.'js/tdBtnf.js"></script>
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

            <tbody></tbody>
        </table>
        <button name="rellenar" id="temp">Rellenar</button>
    </div>

    <div>
        <table id="tUsersRoleNotnull">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Allow</th>
                </tr>
            </thead>

            <tbody></tbody>
        </table>
    </div>
';

?>