<h1 class="team-title"><?= $translations['team_title'] ?></h1>

<section class="team-members">
    <?php foreach ($teamMembers as $teamMember): ?>
        <article class="team-card">
            <a href="index.php?page=team-detail&id=<?= $teamMember['id'] ?>">
                <h2>
                    <?= htmlspecialchars($teamMember['firstname'] . ' ' . $teamMember['lastname']) ?>
                </h2>
                
                <img
                src="public/assets/img/team/<?= htmlspecialchars($teamMember['photo_url']) ?>"
                alt="<?= htmlspecialchars($teamMember['firstname'] . ' ' . $teamMember['lastname']) ?>">
            </a>
        </article>
    <?php endforeach; ?>
</section>
