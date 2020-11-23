<?php
require_once '../layouts/header.php';

?>

<?php startblock('body') ?>

<div class="row">
    <div class="col-5 m-auto ">
        <div class="w-100 h-auto">
            <div class="w-100 h-auto ">
                <p style="font-size: 100px; text-shadow: 10px -1px #dc3545;" class="text-danger mb-n3">4<span class="text-secondary" style="text-shadow: 10px -1px darkgray;">0</span>4</p>
                <h4>That page doesn't exist!</h4>
                <p class="text-secondary">Sorry, The page you were looking for could not found</p>
                <div class="alert alert-dark" role="alert">
                    <p>Or, you can return to our <a href="#">Home</a> or <a href="#">Contact Us</a> page if you can't find what you are
                        looking for.</p>
                </div>

            </div>
        </div>

    </div>
</div>
<?php endblock() ?>
