<section class="team-detail">
    <article class="team-detail-card">
        <h1>
            <?= htmlspecialchars($teamMember['firstname'] . ' ' . $teamMember['lastname']) ?>
        </h1>

        <h2>
            <?= htmlspecialchars($teamMember['job_title']) ?>
        </h2>

        <div class="team-medias">
            <?php if (!empty($teamMember['video_url'])): ?>
                <video controls>
                    <source
                        src="public/assets/videos/<?= htmlspecialchars($teamMember['video_url']) ?>"
                        type="video/mp4"
                    >
                </video>
            <?php endif; ?>
            
            <img
                src="public/assets/img/team/<?= htmlspecialchars($teamMember['photo_url']) ?>"
                alt="<?= htmlspecialchars($teamMember['firstname'] . ' ' . $teamMember['lastname']) ?>"
            >
        </div>
        
        <p>
            <?= nl2br(htmlspecialchars($teamMember['description'])) ?>
        </p>

    </article>

</section>