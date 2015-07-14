<?php
    /*
    |--------------------------------------------------------------------------
    | Template Footer del Sitio
    |--------------------------------------------------------------------------
    |
    | Template que tiene el footer, scripts y demas archivos del sitio
    |
    */
    require __DIR__.'/../../config/env.php';
?>
		<hr>
        <footer>
            <p class="text-right">&copy; Mira en tu Interior - <?= date('Y') ?></p>
        </footer>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="<?= ROOT_URL ?>assets/bootstrap//js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('[data-toggle="offcanvas"]').click(function () {
                $('.row-offcanvas').toggleClass('active');
            });
        });
    </script>
</body>
</html>