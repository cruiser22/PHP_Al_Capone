<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/book.css">
    <title>Checkpoint PHP 1</title>
</head>

<body>

    <?php include 'header.php'; ?>
    <?php require 'model.php' ?>

    <main class="container">

        <section class="desktop">
            <img src="image/whisky.png" alt="a whisky glass" class="whisky" />
            <img src="image/empty_whisky.png" alt="an empty whisky glass" class="empty-whisky" />

            <div class="pages">
                <div class="page leftpage">
                    Add a bribe
                    <!-- TODO : Form -->
                    <?php foreach ($errors as $error) : ?>
                        <p style="color: red;"><?= $error ?></p>
                    <?php endforeach; ?>
                    <form action="/book.php" method="post" id="leftBookPage">
                        <label for="firstname">Name</label>
                        <input type="text" name="firstname" id="firstname">
                        <label for="payment">Payment</label>
                        <input type="number" name="payment" id="payment" min=0>
                        <button type="submit" id="leftPageButton">Pay !</button>
                    </form>
                </div>

                <div class="page rightpage">
                    <!-- TODO : Display bribes and total paiement -->
                    <?php
                    $total=0;
                    ?>

                    <div id="list">
                        <div id="firstname">
                            <?php foreach ($payments as $firstname) : ?>
                                <p><?= $firstname['firstname']; ?></p>
                            <?php endforeach; ?>
                            <p id="total">
                                Total
                            </p>
                        </div>
                        <div id="amounts">

                            <?php foreach ($payments as $payment) : ?>
                                <p><?= $payment['payment'] . '€'; ?></p>
                                <?php $total += $payment['payment']; ?>
                            <?php endforeach; ?>
                            <hr>
                            <p>
                                <?= $total . '€'; ?>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <img src="image/inkpen.png" alt="an ink pen" class="inkpen" />
        </section>
    </main>
</body>

</html>