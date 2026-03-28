<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortSh - URL Shortener</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap-5.3.8-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/style.css">
</head>
<body class="bg-light">
    <div class="container-fluid p-0 d-flex min-vh-100">
        
        <main class="flex-grow-1 d-flex flex-column">
            <header class="bg-white border-bottom p-3 shadow-sm d-flex justify-content-between align-items-center">
                <h1 class="h3 mb-0">
                    <a href="/" class="text-decoration-none text-dark">URL Shortener</a>
                </h1>

                <div class="d-flex align-items-center gap-3">
                    
                    <div class="dropdown">
                        <button class="btn btn-light dropdown-toggle fw-bold text-secondary border" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                            <?= $_SESSION['username'] ?? 'Guest'; ?>
                        </button>
                        
                        <ul class="dropdown-menu dropdown-menu-end shadow-sm" aria-labelledby="userMenu">
                            <li><a class="dropdown-item" href="/">Home</a></li>
                            <li><a class="dropdown-item" href="/login">Login</a></li>
                            <li><a class="dropdown-item" href="/register">Register</a></li>
                            <?php if (isset($_SESSION['username'])): ?>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item text-danger" href="/logout">Log out</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
                    </div>
            </header>
            
            <div class="container my-4">
                <?php echo $content ?? ''; ?>
            </div>
            
            <footer class="mt-auto py-3 bg-white border-top text-center">
                <p class="mb-0 text-muted">&copy; 2024 ShortSh URL Shortener</p>
            </footer>
        </main>
    </div>

    <script src="/css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
