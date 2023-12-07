<?php
include 'Card.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $newTitle = $_POST["title"];
    $newText = $_POST["text"];
    $newPhone = $_POST["phone"];
    $newColor = $_POST["color"];
    $newNoteType = $_POST["note_type"];

    $jsonData = file_get_contents('test.json');
    $existingNotes = json_decode($jsonData);


    if ($newNoteType == "standard")
         $newNote = new Card($newTitle,  $newNoteType, date("Y-m-d H:i:s"));
    if ($newNoteType == "phone")
        $newNote = new CardNumber($newTitle,$newNoteType,date("Y-m-d H:i:s"),$newText, $newPhone  );
   else if ($newNoteType == "colored")
       $newNote = new CardColor($newTitle,$newNoteType ,date("Y-m-d H:i:s"),$newText, $newColor );


    $existingNotes[] = $newNote;


    $jsonData = json_encode($existingNotes, JSON_PRETTY_PRINT);
    file_put_contents('test.json', $jsonData);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Добавить заметку</title>
</head>
<body>
<div class="form-container">
    <form method="post" action="">
        <label for="title">Header:</label>
        <input type="text" name="title" id="title" required>
        <br>
        <label for="text">Text:</label>
        <textarea name="text" id="text" d></textarea>
        <br>
        <label for="note_type">Type of note:</label>
        <select name="note_type" id="note_type" required>
            <option value="standard">Standart</option>
            <option value="phone">Phone Number</option>
            <option value="colored">Colored</option>
        </select>

        <br>
        <label for="phone">Phone Number:</label>
        <input type="tel" name="phone" id="phone">
        <br>
        <label for="color">Background color:</label>
        <input type="color" name="color" id="color">
        <br>
        <button class="button-wrapper" type="submit">Add Note</button>
    </form>
    <a href="index.php">All Note</a>
</div>

</body>
</html>
