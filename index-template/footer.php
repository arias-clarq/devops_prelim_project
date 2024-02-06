<?php
// Check if the current page is not 'contactUs.php'
$current_page = basename($_SERVER['PHP_SELF']);
if ($current_page != 'contactUs.php') {
?>

    <footer class="bg-dark text-light p-2 sticky-bottom">
        <div class="container-fluid pt-3">
            <div class="row">
                <div class="col-1"></div>
                <div class="col-5 d-flex">
                <img src="https://webstockreview.net/images/win-clipart-closed-window-13.png" alt="" width="40" height="40" style="margin-right: 10px;">
                    <h6 class="text-uppercase fw-bold pt-2"> sample university</h6>
                </div>
                <!-- contact column -->
                <div class="col-1"></div>
                <div class="col-5">
                    <h6 class="text-uppercase fw-bold">Contact</h6>
                    <div class="d-flex text-white flex-column bd-highlight mb-3">
                        <div class="p-2 bd-highlight text-capitalize row">
                            <div class="col-1 text-center">
                                <i class="fa-solid fa-school"></i>
                            </div>
                            <div class="col-11">
                                sample university
                            </div>
                        </div>

                        <div class="p-2 bd-highlight text-capitalize row">
                            <div class="col-1 text-center">
                                <i class="fa-solid fa-location-dot"></i>
                            </div>
                            <div class="col-11">
                                Arayat, Pampanga
                            </div>
                        </div>

                        <div class="p-2 bd-highlight row">
                            <div class="col-1 text-center">
                                <i class="fa-solid fa-envelope"></i>
                            </div>
                            <div class="col-11">
                                email@gmail.com
                            </div>
                        </div>

                        <div class="p-2 bd-highlight row">
                            <div class="col-1 text-center">
                                <i class="fa-solid fa-mobile"></i>
                            </div>
                            <div class="col-11">
                                +639471026008
                            </div>
                        </div>

                        <div class="p-2 bd-highlight row">
                            <div class="col-1 text-center">
                                <i class="fa-solid fa-tty"></i>
                            </div>
                            <div class="col-11">
                                (821)-297 4729
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <hr>
            <div class="row text-center">
                <p>
                    © 2024 Copyright: Sample University
                </p>
            </div>
        </div>
    </footer>

<?php
}
?>

</body>

</html>