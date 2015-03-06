<?php

        $conn = mysql_connect("45.56.127.65:3306", "iseekreg", "iseekgame") or die ("could not connect to mysql");
        mysql_select_db("registrationdb") or die ("no database");
        $query = "shg_id, shg_name FROM shgregistration";
        $result = mysql_query ($query);
        echo "<select name=dropdown value=''>Dropdown</option>";
        while($r = mysql_fetch_array($result)){
            echo "<option value=$r[shg_id]>$r[shg_name]</option>";
        }
        echo "</select>";
    
?>