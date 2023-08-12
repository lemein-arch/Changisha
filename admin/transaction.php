<!Doctype html>
<html>

<head>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <title>Transactions</title>
    <link href='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/css/bootstrap.min.css' rel='stylesheet'>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">

</head>
<body>
<nav class="navbar navbar-expand-lg">
    
    <a class="navbar-brand" href="./index.php">Home</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

</nav>

<br>
<h4 align="center">Transaction table</h4>
<br><br>
<div class="card-body">
    <div class="table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Transaction NO</th>
                    <th scope="col">Phone Number</th>
                    <th scope="col">Transaction ID</th>
                    <th scope="col">Amount</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Database connection information
                $dbhost = "localhost";
                $dbuser = "root";
                $dbpass = "";
                $dbname = "crowdfunding";

                
                // Connect to DB
                $con = mysqli_connect($db_host, $db_user, $db_password, $db_name);
                
                $query1 = mysqli_query($con, "SELECT * FROM donations");
                while ($row = mysqli_fetch_array($query1)) {
                ?>
                <tr>
                    <td style="color: black;"><?php echo $row['mpesa_id']; ?></td>
                    <td style="color: blue;"><?php echo $row['Donater_name']; ?></td>
                    <td style="color: blue;"><?php echo $row['Donater_email']; ?></td>
                    <td style="color: green;"><?php echo $row['MSISDN']; ?></td>
                    <td style="color: crimson;"><?php echo $row['MpesaReceiptNumber']; ?></td>
                    <td style="color: crimson;"><?php echo $row['Amount']; ?></td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type='text/javascript'
        src='https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-alpha1/dist/js/bootstrap.bundle.min.js'></script>
</body>

</html>


