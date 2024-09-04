<doctype html>

    <head>
    <link href="<?=  'resources/css/main.css' ?>" media="all" rel="stylesheet">
        <link href="<?=   'resources/css/print.css' ?>" media="print" rel="stylesheet" />
        <title>To-do app</title>
    </head>

    <body>
        <h1>To-dos</h1>
        <!-- new item form -->
        <form method='post'>
            <input type='text' name='item' />
            <button>Add</button>
        </form>
        <!-- current items -->
        <h3>Current items</h3>
        <?php if (!count($todos)) { ?>
            <p><em>none found...</em></p>
        <?php } else { ?>
            <ul>
                <?php foreach ($todos as $todo) { ?>
                    <li><?= $todo->task ?></li>
            <?php }
            } ?>

            </ul>
            <footer>footer</footer>
    </body>