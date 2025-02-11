<div class="modal fade" id="movieModal<?= $movie['id'] ?>" tabindex="-1" aria-labelledby="modalLabel<?= $movie['id'] ?>" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel<?= $movie['id'] ?>"><?= $movie['title'] ?> (<?= $movie['year'] ?>)</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Cerrar"></button>
            </div>
            <div class="modal-body film">
                <img src="<?= $movie['poster'] ?>" class="img-fluid mb-3" alt="<?= $movie['title'] ?>">
                <div class="details">
                    <p><strong>Género:</strong> <?= $movie['genre'] ?></p>
    
                    <?php
                        if (!empty($movie['director'])) {
                            echo "<p><strong>Director:</strong> " . $movie['director'] . "</p>";
                        }

                        if (!empty($movie['actors'])) {
                            echo "<p><strong>Actores principales:</strong> " . $movie['actors'] . "</p>";
                        }

                        if (!empty($movie['country'])) {
                            echo "<p><strong>País:</strong> " . $movie['country'] . "</p>";
                        }
                        
                    ?>
                    <p><strong>Descripción:</strong> <?= $movie['description'] ?></p>
                    <p><strong>Rating:</strong>  <?= generateStars($movie['rating']) ?></p>
                    <p><strong>Añadida por:</strong> <span class="text-capitalize"><?php echo htmlspecialchars($movie['username']); ?></span></p>
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
            </div>
        </div>
    </div>
</div>