<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ShortSh is a fast, simple, and abstract URL shortener built with PHP. Create and manage your shortened links efficiently.">
    <meta name="keywords" content="url shortener, short links, shortsh, php url shortener, link management">
    <meta name="author" content="ShortSh">
    <meta name="robots" content="index, follow">
    
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://shortsh.test/">
    <meta property="og:title" content="ShortSh - URL Shortener">
    <meta property="og:description" content="ShortSh is a fast, simple, and abstract URL shortener built with PHP. Create and manage your shortened links efficiently.">
    
    <!-- Twitter -->
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://shortsh.test/">
    <meta property="twitter:title" content="ShortSh - URL Shortener">
    <meta property="twitter:description" content="ShortSh is a fast, simple, and abstract URL shortener built with PHP. Create and manage your shortened links efficiently.">
    
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
                          <h1 class="fw-semibold mb-0">ShortSh</h1>
                        </a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent" aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        
                        <div class="collapse navbar-collapse" id="navbarContent">
                            <div class="d-flex align-items-center justify-content-end gap-3 ms-auto mt-2 mt-lg-0 ms-lg-3">
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
            
            <footer class="mt-auto py-3 bg-white border-top text-center d-flex flex-column align-items-center justify-content-center gap-2">
                <p class="mb-0 text-muted">&copy; 2026 ShortSh URL Shortener</p>
                <a href="https://github.com/gtorresbotello/shortsh" target="_blank" class="btn btn-outline-dark btn-sm rounded-pill d-inline-flex align-items-center gap-2 px-3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-github" viewBox="0 0 16 16">
                      <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.012 8.012 0 0 0 16 8c0-4.42-3.58-8-8-8z"/>
                    </svg>
                    GitHub
                </a>
            </footer>
        </main>
    </div>

    <script src="/css/bootstrap-5.3.8-dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl, {
                    html: true
                })
            });
            
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
              return new bootstrap.Tooltip(tooltipTriggerEl)
            });
        });

        function copyToClipboard(text, btnElement) {
            navigator.clipboard.writeText(text).then(function() {
                var tooltip = bootstrap.Tooltip.getInstance(btnElement);
                btnElement.setAttribute('data-bs-original-title', 'Copied!');
                if (tooltip) {
                    tooltip.show();
                }
                
                // Change icon to check temporarily
                var originalHTML = btnElement.innerHTML;
                btnElement.innerHTML = '<svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-check-lg text-success" viewBox="0 0 16 16"><path d="M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z"/></svg>';
                
                setTimeout(function() {
                    btnElement.setAttribute('data-bs-original-title', 'Copy');
                    btnElement.innerHTML = originalHTML;
                    if (tooltip) {
                        tooltip.hide();
                    }
                }, 2000);
            }).catch(function(err) {
                console.error('Could not copy text: ', err);
            });
        }
    </script>
</body>

</html>
