<?php
include 'connect.php';
session_start();

// Check if the user is logged in
if (!isset($_SESSION['username'])) {
    header('location:../admin/login.php');
    exit();
}

// Assuming you have tables named 'winners_sport1', 'results_sport1', 'winners_sport2', 'results_sport2'
// Replace these table names with your actual table names
$winnersQuerySport1 = "SELECT * FROM winners_sport1";
$resultsQuerySport1 = "SELECT * FROM results_sport1";

$winnersQuerySport2 = "SELECT * FROM winners_sport2";
$resultsQuerySport2 = "SELECT * FROM results_sport2";

$winnersStmtSport1 = $pdo->query($winnersQuerySport1);
$resultsStmtSport1 = $pdo->query($resultsQuerySport1);

$winnersStmtSport2 = $pdo->query($winnersQuerySport2);
$resultsStmtSport2 = $pdo->query($resultsQuerySport2);

// Fetch the winners and results data for each sport
$winnersDataSport1 = $winnersStmtSport1->fetchAll(PDO::FETCH_ASSOC);
$resultsDataSport1 = $resultsStmtSport1->fetchAll(PDO::FETCH_ASSOC);

$winnersDataSport2 = $winnersStmtSport2->fetchAll(PDO::FETCH_ASSOC);
$resultsDataSport2 = $resultsStmtSport2->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Match Schedule | Sports Club</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <!-- Navigation code here -->
    </nav>

    <div class="container mt-4">
        <h4>Hello, <?php echo $_SESSION['username']; ?></h4>
        
        <h2>Match Schedule</h2>

        <h3>Sport 1 Events</h3>
        <table class="table">
            <thead>
                <tr>
                    <th>Event Name</th>
                    <th>Winner</th>
                    <th>Result</th>
                    <th>Date</th>
                    <th>Time</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($winnersDataSport1 as $winner) : ?>
                    <tr>
                        <td><?php echo $winner['event_name']; ?></td>
                        <td><?php echo $winner['winner_name']; ?></td>
                        <td><?php echo $winner['result']; ?></td>
                        <td><?php echo $winner['event_date']; ?></td>
                        <td><?php echo $winner['event_time']; ?></td>
                    </tr>
                <?php endforeach; ?>

                <?php foreach ($resultsDataSport1 as $result) : ?>
                    <tr>
                        <td><?php echo $result['event_name']; ?></td>
                        <td><?php echo $result['winner_name']; ?></td>
                        <td><?php echo $result['result']; ?></td>
                        <td><?php echo $result['event_date']; ?></td>
                        <td><?php echo $result['event_time']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <h3>Sport 2 Events</h3>
        <table class="table">
            <!-- Similar structure for Sport 2 events -->
        </table>
    </div>

    <!-- Bootstrap JS and other scripts can be included here if needed -->
</body>
</html>