<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Profile</title>
</head>
<body>

<table border="2px solid ">
    <?php
//        echo "<pre>";
//        print_r(unserialize(base64_decode($_GET["info"])));
//        echo "</pre>";
    ?>
    <tr>
        <th colspan="7">Assign Material to Session</th>
    </tr>
    <tr>
        <td>Material ID</td>
        <td>Title</td>
        <td>Author</td>
        <td>Type</td>
        <td>URL</td>
        <td>Assign Date</td>
        <td>Note</td>
        <td>Assignment</td>
    </tr>
    <?php

    foreach(unserialize(base64_decode($_GET["info"])) as $value){
        echo "<tr>";
        echo "<td>" . $value["materialId"] . "</td>";
        echo "<td>" . $value["title"] . "</td>";
        echo "<td>" . $value["author"] . "</td>";
        echo "<td>" . $value["type"] . "</td>";
        echo "<td>" . $value["url"] . "</td>";
        echo "<td>" . $value["assignDate"] . "</td>";
        echo "<td>" . $value["notes"] . "</td>";
        //echo "<td><a href='../controller/session.php?moid=" . $_GET["moid"] . "&&maid=" . $value["materialId"] . ">" . "Assign</a></td>"  ;
        echo "<td>" . "<a href='../controller/session.php?moid=" . $_GET["moid"] . "&&maid=" . $value["materialId"] ."'>Assign</a></td>";
        echo "</tr>";
    }
    ?>

</table>
</body>
</html>