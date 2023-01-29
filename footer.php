<!-- footer -->
<footer class="footer">
    <div class="container">
        <div class="d-flex justify-content-center text-center py-5">
            <small>
                <p class="mb-0">
                    <a href="<?= get_home_url() ?>" title="Página Inicial"><?=
                          get_site_name() ?></a> ©
                    <?= date("Y") ?> - Todos os direitos reservados
                </p>
                <p class="mb-0">
                    <span>
                        <a href="<?= get_home_url() ?>/termos-de-privacidade"
                            title="Termos de privacidade">
                            Termos de privacidade
                        </a>
                    </span>
                </p>
            </small>
        </div>
    </div>
</footer>
<!-- /footer -->

<!-- cookie alert -->
<section class="cookie-alert">
    <div class="container cookie-alert-inner">
        <div class="cookie-alert-alert">
            <h3 class="fs-5 fw-semibold">
                Utilizamos cookie!
            </h3>
            <p>
                Fazemos o uso de cookies neste site, ao navegar você concorda com o uso de
                cookies de acordo com o
                nosso <a href="<?= get_home_url() ?>/termos-de-privacidade"
                    title="Termos de privacidade">termos de privacidade</a>.
            </p>
            <button class="btn btn-sm btn-outline-primary allow-cookie">Eu aceito os termos</button>
        </div>
    </div>
</section>
<!-- /cookie alert -->

<script src="<?= get_stylesheet_directory_uri() ?>/assets/js/scripts.js"></script>
<script>
    AOS.init();
</script>
</body>

</html>