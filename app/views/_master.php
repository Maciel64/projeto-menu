<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="static/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>
    <?= require "partials/header.php"; ?>

    <main class="w-full flex h-fit justify-center">
        <div class="rounded drop-shadow-md w-1/2 bg-slate-50 p-6">
            <?php require $view; ?>
        </div>
    </main>
</body>

</html>