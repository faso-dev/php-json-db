<?php

use App\Database\DB;

$title = "Liste des activités";
?>
<div id="home-page">
    <div class="home-header">
        <video autoplay loop muted>
            <source src="./assets/videos/e-sport.mp4" type="video/mp4">
        </video>
    </div>
    <div class="container mt-5">
        <h2>
            Liste des activités
        </h2>
        <div class="cards">
            <?php foreach (DB::findAll() as $activity) :
                $activityName = $activity['activityName'];
                ?>
                <div class="card">
                    <div class="card-header">
                        <div class="card-image">
                            <img src="<?= $activity['activityImage'] ?>"
                                 alt="Natation">
                        </div>
                    </div>
                    <div class="card-title">
                        <h2><?= $activity['activityName'] ?></h2>
                    </div>
                    <div class="card-body">
                        <div class="content">
                            <?= $activity['activityDescription'] ?>
                        </div>
                        <div class="card-actions">
                            <img src="./assets/img/<?php echo $activity['activityStatus'] ? 'progress.png' : 'waiting.png' ?>"
                                 alt="Activity status image">
                            <form onsubmit="return confirm('Êtes-vous sûr de bien vouloir supprimer l\'activité <?= $activityName ?>')"
                                  method="post" action="<?= route('delete_sport') ?>">
                                <input value="<?= $activity['activityId'] ?>" type="hidden" name="activityId">
                                <button type="submit" name="remove">
                                    <img src="./assets/img/trash.png" alt="Trash">
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>