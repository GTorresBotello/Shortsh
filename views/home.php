<section>
    <h2>Your URLs</h2>
    <table>
        <thead>
            <tr>
                <th>Original URL</th>
                <th>Short URL</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($urls)): ?>
                <?php foreach ($urls as $url): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($url['original_url']); ?></td>
                        <td><?php echo htmlspecialchars($url['short_url']); ?></td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="2">No URLs found.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
    <a href="/url">add url</a>
</section>
