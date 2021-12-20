<?php

use App\Database\DB;

$title = "Ajout d'une nouvelle activité sportive";
if (inRequest('save')) {
    DB::save([
        'activityId' => uniqid(time()),
        'activityName' => request('activityName'),
        'activityDescription' => request('activityDescription'),
        'activityImage' => request('activityImage'),
        'activityStatus' => (bool)request('activityStatus'),
    ]);

    redirectTo('create_sport');
}
?>
<div class="container mt-150">
    <div class="w-576">
        <form action="" method="post">
            <input
                    required
                    value="<?= request('activityName') ?? '' ?>"
                    type="text"
                    name="activityName"
                    placeholder="Saisir le nom de l'activité">
            <textarea
                    required
                    name="activityDescription"
                    rows="3"
                    placeholder="Saisir la description de l'activité"
            ><?= request('activityDescription') ?? '' ?></textarea>
            <input
                    required
                    value="<?= request('activityImage') ?? '' ?>"
                    type="text"
                    name="activityImage"
                    placeholder="Saisir l'adresse de l'image">
            <label for="activityStatus">
                Status de l'activité
            </label>
            <select name="activityStatus" id="activityStatus">
                <option value="0">En attente</option>
                <option value="1">En cours</option>
            </select>
            <div class="col-2">
                <button name="save" type="submit">Envoyer</button>
                <button type="reset">Annuler</button>
            </div>
        </form>
    </div>
</div>
