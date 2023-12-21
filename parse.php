<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OSKY - Parse Test</title>
</head>
<body>

<?php
$json_data = json_decode(file_get_contents("https://test.osky.dev/101/data.json"), true);

usort($json_data, function($a, $b) {
    return strcmp($a['title'], $b['title']);
});

foreach ($json_data as $item) {
    echo '<div class="item">';
    echo '<h2>' . $item['title'] . '</h2>';
    
    $date1 = date_create($item['pubDate']);
    $date2 = date_format($date1, 'l, jS F Y h:ia');
    echo '<p><i>' . $date2 . '</i></p>';

    echo '<p>' . $item['description'] . '</p>';

    echo '</div>';
}
?>

</body>
</html>
