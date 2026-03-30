<section class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="h4">Your URLs</h2>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addUrlModal">
            Add URL
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle">
            <thead class="table-primary">
                <tr>
                    <th scope="col">Original URL</th>
                    <th scope="col">Short URL</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($urls)): ?>
                    <?php foreach ($urls as $url): ?>
                        <tr>
                            <td><a href="<?php echo htmlspecialchars($url['original_url']); ?>" class="text-truncate d-inline-block" style="max-width: 400px;"><?php echo htmlspecialchars($url['original_url']); ?></a></td>
                            <td><span class="badge bg-secondary"><?php echo htmlspecialchars('https://shortsh.lat/' . $url['short_url']); ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center text-muted py-4">No URLs found. Start by adding one!</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <?php if (isset($_SESSION['error_msg'])): ?>
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>¡Error!</strong> <?= htmlspecialchars($_SESSION['error_msg']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error_msg']); ?>
        <?php endif; ?>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addUrlModal" tabindex="-1" aria-labelledby="addUrlModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addUrlModalLabel">Add a New Short Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/url" method="POST">
        <div class="modal-body">
            <div class="mb-3">
                <label for="original" class="form-label">Original URL</label>
                <input type="url" name="original" id="original_url" class="form-control" placeholder="https://example.com" required>
            </div>
            <div class="mb-3">
                <label for="short" class="form-label">Custom Short Slug</label>
                <input type="text" name="short" id="short_url" class="form-control" placeholder="my-custom-link" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary">Save URL</button>
        </div>
      </form>
    </div>
  </div>
</div>
