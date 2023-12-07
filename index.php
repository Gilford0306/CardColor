<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Notes</title>
</head>
<body>
<?php
include 'Card.php';

$jsonData = file_get_contents('test.json');
$notes2 = json_decode($jsonData);
echo '<div class="base">';
    echo '<div class="container">';

        foreach ($notes2 as $note) {
            if ($note->typeNote === 'colored')
            {
                echo '<div class="card" style="background-color: ' . $note->color . ';">';
            }
            else
            {
                    echo '<div class="card"">';
            }


            echo '<h2>' . $note->header . '</h2>';

            if ($note->typeNote  !== 'standard')
            {
                echo '<p>' . $note->text . '</p>';
            }

            if ($note->typeNote  === 'phone') {
                echo '<p>Phone Number: ' . $note->number . '</p>';
            }
            echo '<br>';
            echo '<p>Creation Date: ' . $note->creationDate . '</p>';
            echo '</div>';
        }
echo '</div>';
echo '<a href="add_note.php">Add notes</a>';
echo '</div>';



?>

</body>
</html>
