<div class="row justify-content-center align-items-center" style="min-height: 70vh;">
    <div class="col-12 col-md-8 col-lg-5">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-4">
                    <h2 class="fw-bold">Welcome Back</h2>
                    <p class="text-muted">Please sign in to your account</p>
                </div>
                <form method="POST">
                    <div class="mb-3">
                        <label for="username" class="form-label fw-medium">Username</label>
                        <input type="text" class="form-control form-control-lg bg-light border-0" id="username" name="username" placeholder="Enter your username" required autofocus>
                    </div>
                    <div class="mb-4">
                        <label for="password" class="form-label fw-medium">Password</label>
                        <input type="password" class="form-control form-control-lg bg-light border-0" id="password" name="password" placeholder="Enter your password" required>
                    </div>
                    <div class="d-grid gap-2 mb-4">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-medium">Sign In</button>
                    </div>
                    <?php if (isset($_SESSION['error_msg'])): ?>
                    <div class="alert alert-danger border-0 rounded-3" role="alert">
                        <strong>Oops!</strong> <?= htmlspecialchars($_SESSION['error_msg']); ?>
                    </div>
                    <?php unset($_SESSION['error_msg']); ?>
                    <?php endif; ?>
                </form>
                <div class="text-center">
                    <p class="mb-0 text-muted">Don't have an account? <a href="/register" class="text-decoration-none fw-semibold">Create one</a></p>
                </div>
            </div>
        </div>
    </div>
</div>