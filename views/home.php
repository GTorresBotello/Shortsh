<section class="card shadow-sm border-0 rounded-4 p-4 p-md-5">
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
        <div class="d-flex align-items-center gap-2">
            <h2 class="h4 mb-0 fw-bold">
                <?php if (isset($_SESSION['username'])): ?>
                    Your Links
                <?php else: ?>
                    Public Links
                <?php endif; ?>
            </h2>
            <?php if (!isset($_SESSION['username'])): ?>
                <button type="button" class="btn btn-sm btn-outline-secondary rounded-circle ms-2" style="width: 28px; height: 28px; padding: 0;" data-bs-toggle="popover" data-bs-placement="right" data-bs-title="How it works" data-bs-content="1. Click '+ New Link' to open the modal.<br>2. Paste your long URL into the 'Original URL' field.<br>3. Type a custom word in the 'Short Slug' field.<br>4. Click 'Save URL'. Your new link is ready to share!">
                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-question-lg" viewBox="0 0 16 16">
                        <path fill-rule="evenodd" d="M4.475 5.458c-.284 0-.514-.237-.47-.517C4.28 3.24 5.576 2 7.825 2c2.25 0 3.767 1.36 3.767 3.215 0 1.344-.665 2.288-1.79 2.973-1.1.659-1.414 1.118-1.414 2.01v.03a.5.5 0 0 1-.5.5h-.77a.5.5 0 0 1-.5-.495l-.003-.2c-.043-1.221.477-2.001 1.645-2.712 1.03-.632 1.397-1.135 1.397-2.028 0-.979-.758-1.698-1.926-1.698-1.009 0-1.71.529-1.938 1.402-.066.254-.278.461-.54.461h-.777ZM7.496 14c.622 0 1.095-.474 1.095-1.09 0-.618-.473-1.092-1.095-1.092-.606 0-1.087.474-1.087 1.091S6.89 14 7.496 14Z"/>
                    </svg>
                </button>
            <?php endif; ?>
        </div>
        <!-- Button to trigger modal -->
        <button type="button" class="btn btn-primary rounded-pill px-4 fw-medium w-100 w-md-auto" data-bs-toggle="modal" data-bs-target="#addUrlModal">
            + New Link
        </button>
    </div>

    <div class="table-responsive">
        <table class="table table-hover align-middle mb-0">
            <thead class="table-light">
                <tr>
                    <th scope="col" class="border-0 rounded-start px-4 py-3">Original URL</th>
                    <th scope="col" class="border-0 rounded-end px-4 py-3 text-end d-none d-md-table-cell">Short URL</th>
                </tr>
            </thead>
            <tbody class="border-top-0">
                <?php if (!empty($urls)): ?>
                    <?php foreach ($urls as $url): ?>
                        <tr>
                            <td class="px-4 py-3">
                                <div class="d-flex align-items-center">
                                    <div class="bg-light rounded p-2 me-3 d-none d-sm-flex align-items-center justify-content-center text-muted" style="width: 40px; height: 40px;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                          <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1 1 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4 4 0 0 1-.128-1.287z"/>
                                          <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243z"/>
                                        </svg>
                                    </div>
                                    <div class="w-100">
                                        <a href="<?php echo htmlspecialchars($url['original_url']); ?>" target="_blank" class="text-decoration-none text-dark text-truncate d-block fw-medium mb-1" style="max-width: 250px;">
                                            <?php echo htmlspecialchars($url['original_url']); ?>
                                        </a>
                                        <div class="d-md-none mt-2 d-flex align-items-center gap-2">
                                            <a href="/<?php echo htmlspecialchars($url['short_url']); ?>" target="_blank" class="badge bg-primary text-decoration-none p-2 rounded-pill fw-normal text-truncate" style="max-width: 200px;">
                                                <?php echo htmlspecialchars('https://shortsh.lat/' . $url['short_url']); ?>
                                            </a>
                                            <button type="button" class="btn btn-sm btn-light rounded-circle text-muted p-1" style="width: 28px; height: 28px;" onclick="copyToClipboard('<?php echo htmlspecialchars('https://shortsh.lat/' . $url['short_url']); ?>', this)" data-bs-toggle="tooltip" data-bs-title="Copy">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                                  <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6ZM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1H2Z"/>
                                                </svg>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td class="px-4 py-3 text-end d-none d-md-table-cell">
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <a href="/<?php echo htmlspecialchars($url['short_url']); ?>" target="_blank" class="badge bg-primary text-decoration-none p-2 rounded-pill fw-normal text-truncate" style="max-width: 250px;">
                                        <?php echo htmlspecialchars('https://shortsh.lat/' . $url['short_url']); ?>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-light rounded-circle text-muted p-1" style="width: 28px; height: 28px;" onclick="copyToClipboard('<?php echo htmlspecialchars('https://shortsh.lat/' . $url['short_url']); ?>', this)" data-bs-toggle="tooltip" data-bs-title="Copy">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" fill="currentColor" class="bi bi-copy" viewBox="0 0 16 16">
                                          <path fill-rule="evenodd" d="M4 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v8a2 2 0 0 1-2 2H6a2 2 0 0 1-2-2V2Zm2-1a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H6ZM2 5a1 1 0 0 0-1 1v8a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1v-1h1v1a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V6a2 2 0 0 1 2-2h1v1H2Z"/>
                                        </svg>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="2" class="text-center text-muted py-5">
                            <div class="mb-3">
                                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-inbox text-secondary opacity-50" viewBox="0 0 16 16">
                                  <path d="M4.98 4a.5.5 0 0 0-.39.188L1.54 8H6a.5.5 0 0 1 .5.5 1.5 1.5 0 1 0 3 0A.5.5 0 0 1 10 8h4.46l-3.05-3.812A.5.5 0 0 0 11.02 4zM3.81.563A1.5 1.5 0 0 1 4.98 0h6.04a1.5 1.5 0 0 1 1.17.563l3.7 4.625a.5.5 0 0 1 .106.311l-.106.311-3.7 4.625A1.5 1.5 0 0 1 11.02 11H4.98a1.5 1.5 0 0 1-1.17-.563l-3.7-4.625a.5.5 0 0 1-.106-.311l.106-.311z"/>
                                </svg>
                            </div>
                            <p class="mb-0 fw-medium">No links found. Start by adding one!</p>
                        </td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        
        <?php if (isset($_SESSION['error_msg'])): ?>
        <div class="alert alert-danger alert-dismissible fade show border-0 rounded-3 mt-4 mb-0" role="alert">
            <strong>Oops!</strong> <?= htmlspecialchars($_SESSION['error_msg']); ?>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
        <?php unset($_SESSION['error_msg']); ?>
        <?php endif; ?>
    </div>
</section>

<!-- Modal -->
<div class="modal fade" id="addUrlModal" tabindex="-1" aria-labelledby="addUrlModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered border-0">
    <div class="modal-content border-0 rounded-4 shadow">
      <div class="modal-header border-bottom-0 pb-0">
        <h5 class="modal-title fw-bold" id="addUrlModalLabel">Add a New Short Link</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="/url" method="POST">
        <div class="modal-body">
            <div class="mb-4">
                <label for="original_url" class="form-label fw-medium text-muted small text-uppercase" style="letter-spacing: 0.5px;">Original URL</label>
                <input type="url" name="original" id="original_url" class="form-control form-control-lg bg-light border-0" placeholder="https://example.com" required>
            </div>
            <div class="mb-2">
                <label for="short_url" class="form-label fw-medium text-muted small text-uppercase" style="letter-spacing: 0.5px;">Custom Short Slug</label>
                <div class="input-group input-group-lg">
                    <span class="input-group-text bg-light border-0 text-muted" id="basic-addon3">/</span>
                    <input type="text" name="short" id="short_url" class="form-control bg-light border-0 ps-0" placeholder="my-custom-link" required aria-describedby="basic-addon3">
                </div>
            </div>
        </div>
        <div class="modal-footer border-top-0 pt-0">
          <button type="button" class="btn btn-light rounded-pill px-4 fw-medium" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" class="btn btn-primary rounded-pill px-4 fw-medium">Save URL</button>
        </div>
      </form>
    </div>
  </div>
</div>
