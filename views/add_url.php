<div class="row justify-content-center">
    <div class="col-md-8 col-lg-6">
        <div class="card shadow-sm border-0 rounded-4">
            <div class="card-body p-4 p-md-5">
                <h2 class="h4 mb-4 fw-bold text-center">Add New Link</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="original" class="form-label fw-medium">Original URL</label>
                        <input type="url" id="original" name="original" class="form-control form-control-lg bg-light border-0" placeholder="https://example.com" required>
                    </div>
                    <div class="mb-4">
                        <label for="short" class="form-label fw-medium">Short URL Slug</label>
                        <input type="text" id="short" name="short" class="form-control form-control-lg bg-light border-0" placeholder="custom-slug" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary btn-lg rounded-pill fw-medium">Shorten URL</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>