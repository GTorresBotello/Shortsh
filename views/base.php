<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ShortSh - URL Shortener</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap-5.3.8-dist/css/bootstrap.min.css">
</head>
<body class="bg-light">
    <div class="container-fluid p-0 d-flex min-vh-100">
        
        <main class="flex-grow-1 d-flex flex-column">
            <header>
                <nav class="navbar navbar-expand-lg bg-white border-bottom shadow-sm">
                    <div class="container-fluid px-4">
                        <a class="navbar-brand d-flex align-items-center gap-2" href="/">
                            <span class="fw-bold">¯\_(ツ)_/¯</span>
                            <span class="fw-semibold">ShortSh</span>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarContent">
                            <ul class="navbar-nav ms-auto mb-2 mb-lg-0 text-end">
                                <li class="nav-item">
                                    <a class="nav-link text-dark" href="/">Home</a>
                                </li>
                            </ul>
                            
                            <div class="d-flex align-items-center justify-content-end gap-3 mt-2 mt-lg-0 ms-lg-3">
                                <?php if (!isset($_SESSION['username'])): ?>
                                    <a href="/login" class="btn btn-outline-primary btn-sm rounded-pill px-3">Login</a>
                                    <a href="/register" class="btn btn-primary btn-sm rounded-pill px-3">Register</a>
                                <?php else: ?>
                                    <div class="dropdown">
                                        <button class="btn btn-outline-secondary btn-sm dropdown-toggle rounded-pill px-3" type="button" id="userMenu" data-bs-toggle="dropdown" aria-expanded="false">
                                            <?= htmlspecialchars($_SESSION['username']); ?>
                                        </button>
                                        <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0" aria-labelledby="userMenu">
                                            <li><a class="dropdown-item text-danger" href="/logout">Log out</a></li>
                                        </ul>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </nav>
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
