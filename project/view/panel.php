<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php $_GET["info"] ?></title>
</head>
<body>
    <h2>Welcome <?php
                    echo unserialize(base64_decode($_GET["info"]))["name"]; echo " ";
                    echo strtoupper(unserialize(base64_decode($_GET["info"]))["role"]);
                ?> Panel
    </h2>
    <ul>
    <?php
        if (unserialize(base64_decode($_GET["info"]))["role"] == "parent"){
               //echo  '<li><a href="#" target="_self">Enrollment</a></li>';
               echo '<li><a href="parent.php?info=' . $_GET["info"] . '" target="_self">Edit Profile</a></li>';
                if (unserialize(base64_decode($_GET["info"]))["moderator"] == 1){
                    echo '<li><a href="../controller/schedule.php?moid=' . unserialize(base64_decode($_GET["info"]))["id"] . '" target="_self">My Schedule</a></li>';
                    echo '<li><a href="postMaterial.php?moid=' . unserialize(base64_decode($_GET["info"]))["id"] . '" target="_self">Post Material</a></li>';
                    echo '<li><a href="../controller/posted.php?moid=' . unserialize(base64_decode($_GET["info"]))["id"] . '" target="_self">View Posted Material</a></li>';
                    echo '<li><a href="../controller/moderate.php?moid=' . unserialize(base64_decode($_GET["info"]))["id"] . '" target="_self">Moderating</a></li>';
                    echo '<li><a href="../controller/assignment.php?moid=' . unserialize(base64_decode($_GET["info"]))["id"] . '" target="_self">Assign material to Session</a></li>';
                    echo '<li><a href="../controller/assignSession.php?moid=' . unserialize(base64_decode($_GET["info"]))["id"] . '" target="_self">View Assigned Session</a></li>';
                }

        }else{
            echo '<li><a href="student.php?info=' . $_GET["info"] . '" target="_self">Edit Profile</a></li>';
            echo '<li><a href="../controller/courses.php" target="_self">View all course</a></li>';
            echo '<li><a href="../controller/courses.php?mentee=' . unserialize(base64_decode($_GET["info"]))["id"] . '"  target="_self">Mentee Enrollment</a></li>';
            echo '<li><a href="../controller/courses.php?mentor=' . unserialize(base64_decode($_GET["info"]))["id"] . '"  target="_self">Mentor Enrollment</a></li>';
            echo '<li><a href="../controller/role.php?mentee=' . unserialize(base64_decode($_GET["info"]))["id"] . '"  target="_self">View Mentee course</a></li>';
            echo '<li><a href="../controller/role.php?mentor=' . unserialize(base64_decode($_GET["info"]))["id"] . '"  target="_self">View Mentor course</a></li>';
            echo '<li><a href="../controller/role.php?enrollment=' . unserialize(base64_decode($_GET["info"]))["id"] . '"  target="_self">View My Enrollment</a></li>';
        }
    ?>



    </ul>
</body>
</html>