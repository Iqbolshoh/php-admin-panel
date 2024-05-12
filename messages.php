<?php include 'config.php' ?>

<?php $query = new Query() ?>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message_id'])) {
    $message_id = $_POST['message_id'];
    $query->deleteMessage($message_id);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messages</title>
    <?php include 'includes/css.php' ?>

</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        <!-- Navbar -->
        <?php include 'includes/navbar.php'; ?>


        <!-- Main Sidebar Container -->
        <?php
        include 'includes/aside.php';
        active('dashboard', 'messages');
        ?>


        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">

            <!-- Content Header (Page header) -->
            <?php
            $arr = array(
                ["title" => "Home", "url" => "/"],
                ["title" => "Messages", "url" => "#"],
            );
            pagePath('Messages', $arr);
            ?>

            <!-- Main content -->
            <section class="content">

                <div class="card">
                    <div class="card-body">
                        <h4>Send</h4>
                        <form method="POST" action="/config.php">
                            <div class="form-group">
                                <label for="username">To whom:</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <label for="message_text">Message Text:</label>
                                <textarea class="form-control" id="message_text" name="message_text" rows="3" placeholder="write the message" required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Yuborish</button>
                        </form>
                    </div>
                </div>


                <div class="card mt-3">
                    <div class="card-body">
                        <h2>All Messages</h2>
                        <ul class="list-group">
                            <?php

                            $messages = $query->getAllMessages();
                            foreach ($messages as $message) {
                                echo '<li class="list-group-item">';
                                echo '<strong>Sender:</strong> ' . $message['sender_name'] . '<br>';
                                echo '<strong>To the user:</strong> ' . $message['username'] . '<br>';
                                echo '<strong>Message:</strong> ' . $message['message_text'] . '<br>';
                                echo '<form method="POST" action="">';
                                echo '<input type="hidden" name="message_id" value="' . $message['id'] . '">';
                                echo '<button type="submit" class="btn btn-danger">Delete</button>';
                                echo '</form>';
                                echo '</li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                
            </section>
        </div>


        <!-- Main Footer -->
        <?php include 'includes/footer.php'; ?>

    </div>

    <!-- SCRIPTS -->
    <script src="js/jquery.min.js"></script>
    <script src="js/adminlte.js"></script>

</body>

</html>