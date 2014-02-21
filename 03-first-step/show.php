<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'myuser', 'mypassword');
mysql_select_db('blog_db', $link);

// Performing SQL query
$result = mysql_query('SELECT date, title, content FROM post WHERE id=' . $_GET['post'], $link);
$row = mysql_fetch_array($result, MYSQL_ASSOC);
?>
<html>
<head>
    <title>List of Posts</title>
</head>
<body>

<div id="header">
    Rutorika Blog
    <ul id="navigation">
<!--        Navigation-->
    </ul>
</div>


<h1><?php echo $row['title'] ?></h1>
<?php echo $row['content'] ?>

<div id="sidebar">
<!--    Something-->
</div>

</body>
</html>

<?php
 
// Closing connection
mysql_close($link);

?>