<!--<div name="logout">
    <section>
        <article>
            <h2>Aquí te deslogeas</h2>
        </article>
</div>-->
<?php

Session::delete("user");
header("Location: ?menu=login");

?>