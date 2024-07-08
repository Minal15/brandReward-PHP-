<?php
// Function to sanitize input data
function sanitize_input($data) {
    return htmlspecialchars(trim($data));
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve inputs and sanitize them
    $url = urlencode(sanitize_input($_POST['url']));
    $key = sanitize_input($_POST['key']);
    $id = sanitize_input($_POST['id']);
    $cpc = sanitize_input($_POST['cpc']);

    // Construct the redirect URL
    $redirect_url = "https://r.brandreward.com/?key={$key}&id={$id}&url={$url}";

    // Perform redirection
    header("Location: {$redirect_url}");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Redirect API Form</title>
</head>
<body>
    <h2>Redirect API Form</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    <label for="url">URL:</label><br>
        <input type="text" id="url" name="url" required><br><br>

        <label for="key">Key:</label><br>
        <input type="text" id="key" name="key" required><br><br>

        <label for="id">ID:</label><br>
        <input type="text" id="id" name="id"><br><br>

        <label for="cpc">CPC:</label><br>
        <input type="text" id="cpc" name="cpc"><br><br>

        <input type="submit" value="Redirect">
    </form>
</body>
</html>
