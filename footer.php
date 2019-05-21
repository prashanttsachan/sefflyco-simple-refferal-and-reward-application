            <div class="copyright-w3layouts py-xl-3 py-2 mt-xl-5 mt-4 text-center">
                <p>© <?php echo date("Y"); ?> Sefflyco . All Rights Reserved | Developed By
                    <a href="https://www.ciesta.in/"> Ciesta Technologies</a> Template by <a href="https://www.w3layouts.in/">w3layout</a>
                </p>
            </div>
        </div>
    </div>
    <script src='js/jquery-2.2.3.min.js'></script>
    <script>
        $(document).ready(function () {
            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').toggleClass('active');
            });
        });
    </script>
    <script>
        $(document).ready(function () {
            $(".dropdown").hover(
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideDown("fast");
                    $(this).toggleClass('open');
                },
                function () {
                    $('.dropdown-menu', this).stop(true, true).slideUp("fast");
                    $(this).toggleClass('open');
                }
            );
        });
    </script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>