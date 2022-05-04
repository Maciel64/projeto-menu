<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>

    <link rel="stylesheet" href="/static/css/styles.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body>

    <?php if (!isset($removeHeader)) : ?>
        <?php require "partials/header.php"; ?>
    <?php endif; ?>


    <?php if (!isset($removeMain)) : ?>

        <main class="w-full flex flex-col h-fit items-center">
            <?= getFlash("success"); ?>
            <?= getFlash("error"); ?>

            <section class="my-5 rounded drop-shadow-md w-9/12 h-fit bg-slate-50 p-6">
                <?php require $view; ?>
            </section>
        </main>

    <?php else : ?>

        <?php if ($removeMain === "container") : ?>
            <main class="w-full flex flex-col h-fit items-center mt-5">
                <?= getFlash("success"); ?>
                <?= getFlash("error"); ?>
                <?php require $view; ?>
            </main>
        <?php else : ?>
            <?php require $view; ?>
        <?php endif; ?>
        
        
    <?php endif; ?>
    <script src="/static/js/flash.js"></script>
</body>

</html>