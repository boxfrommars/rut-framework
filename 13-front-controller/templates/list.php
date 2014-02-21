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
    <?php foreach ($posts as $post): ?>
        <li>
            <a href="/read?id=<?php echo $post['id'] ?>">
                <?php echo $post['title'] ?>
            </a>
        </li>
    <?php endforeach; ?>
</ul>

<div id="sidebar">
<!--    Something-->
</div>

</body>
</html>