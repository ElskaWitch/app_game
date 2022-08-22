<!-- The button to open modal -->
<label for="my-modal" class="btn modal-button btn-error text-white">Supprimer</label>

<!-- Put this part before </body> tag -->
<input type="checkbox" id="my-modal" class="modal-toggle" />
<div class="modal">
    <div class="modal-box">
        <h3 class="font-bold text-lg text-center">Voulez-vous vraiment supprimer ce jeux?</h3>
        <div class="flex justify-center space-x-5 pt-5">
            <div class="modal-action">
                <label for="my-modal" class="btn btn-success text-white">Non</label>
            </div>
            <div class="modal-action">
                <label for="my-modal" class="btn btn-error"> <a href="delete.php?id=<?= $game["id"] ?>&name=<?= $game["name"] ?>" class="text-white">Oui</a></label>
            </div>
        </div>
    </div>
</div>