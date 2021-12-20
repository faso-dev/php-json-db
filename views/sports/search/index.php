<?php

use App\Database\DB;

$activity = null;
if (query('q')) {
    $activity = DB::findByName(query('q'));
}
?>
<div id="home-page">
    <div class="home-header">
        <video autoplay loop muted>
            <source src="../../../assets/videos/e-sport.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container mt-5">
        <?php if (null !== $activity):
            $activityName = $activity['activityName'] ?>
            <div class="card-single">
                <div class="card">
                    <div class="card-header">
                        <div class="card-image">
                            <img src="<?= $activity['activityImage'] ?>"
                                 alt="Natation">
                        </div>
                    </div>
                    <div class="card-title text-orange">
                        <h2><?= $activity['activityName'] ?></h2>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            <?= $activity['activityDescription'] ?>
                        </div>
                        <div class="card-actions">
                            <img src="../../../assets/img/<?php echo $activity['activityStatus'] ? 'progress.png' : 'waiting.png' ?>"
                                 alt="Activity status image">
                            <form onsubmit="return confirm('Êtes-vous sûr de bien vouloir supprimer l\'activité <?= $activityName ?>')"
                                  method="post" action="<?= route('delete_sport') ?>">
                                <input value="<?= $activity['activityId'] ?>" type="hidden" name="activityId">
                                <button type="submit" name="remove">
                                    <img src="../../../assets/img/trash.png" alt="Trash">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <h2>Aucune activité ne correspond à votre recherche</h2>
        <?php endif; ?>
    </div>
</div>
