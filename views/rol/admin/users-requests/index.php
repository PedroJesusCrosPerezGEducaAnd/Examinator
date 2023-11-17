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
    <script src="'.$thisdir.'js/Tabla_silverio.js"></script>
</head>

    <div>
        <p class="table_title">Peticiones de usuarios</p>
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
    </div>

    <div>
        <p class="table_title">CRUD usuarios</p>
        <table id="crud_users" class="Tabla">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Role</th>
                    <th>Allow</th>
                </tr>
            </thead>

            <tbody></tbody>

            <tfoot>
                <tr>
                    <form>
                        <td><input type="text" autofocus></td>
                        <td><input type="text"></td>
                        <td><input type="text"></td>
                        <td><span class="boton">G</span></td>
                        <!--<input type="button" value="Guardar"> -->
                    </form>
                </tr>
            </tfoot>
        </table>
    </div>
';

?>