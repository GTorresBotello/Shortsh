<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortSh - URL Shortener</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <aside>
        <h2>ShortSh</h2>
        <nav>
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="/login">Login</a></li>
                <li><a href="/register">Register</a></li>
            </ul>
        </nav>
    </aside>

    <main>
        <header>
            <h1>URL Shortener Dashboard</h1>
        </header>

        <div class="container">
            <?php echo $content ?? ''; ?>
        </div>

        <footer>
            <p>&copy; 2024 ShortSh URL Shortener</p>
        </footer>
    </main>
</body>
</html>
