<?php
if ($meeting_status['status'] == false)
{?>

    <main role="main" class="container" style="text-align: center;">

        <div class="starter-template">
            <h1>Sorry!</h1>
            <p class="lead"><?=$meeting_status['message']?></p>
        </div>

    </main>

<?php
}
?>
