<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/stylesheet.css">
    <h1 class="title">
    <title>
    <?php if (empty($keyword)) :?>
            index
    <?php elseif (!empty($keyword))  :?>
            searchPage
    <?php elseif (!empty($id))  :?>
            searchPage
    <?php endif ?> 
    </title>
</head>