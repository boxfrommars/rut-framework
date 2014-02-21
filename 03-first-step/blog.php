<?php

// Connecting, selecting database
$link = mysql_connect('localhost', 'myuser', 'mypassword');
mysql_select_db('blog_db', $link);
 
// Performing SQL query
$result = mysql_query('SELECT date, title FROM post', $link);
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


<h1>List of Posts</h1>
<ul>
    <?php while ($row = mysql_fetch_assoc($result)): ?>
        <li>
            <a href="/show.php?id=<?php echo $row['id'] ?>">
                <?php echo $row['title'] ?>
            </a>
        </li>
    <?php endwhile; ?>
</ul>

<div id="sidebar">
<!--    Something-->
</div>

</body>
</html>

<?php
 
// Closing connection
mysql_close($link);

?>