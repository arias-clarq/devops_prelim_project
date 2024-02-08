<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 bg-gradient-custom">
            <div class="modal-body px-5 text-center">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-10x text-white" style="background-color: #015783!important; border-radius:50%;"></i>
                </div>
                <form action="config/user_login.php" method="post">
                    <div class="px-3 pb-2 text-white" style="margin-top: -50px!important; padding-top:50px!important; border: 2px solid white !important; border-radius:10px!important;">
                        <label for="">Username:</label>
                        <div class="input-group mb-4">
                            <input type="text" class="form-control  text-white bg-transparent custom-placeholder-color" name="username" placeholder="Enter your username" id="" required>
                        </div>
                        <label for="">Password:</label>
                        <div class="input-group mb-4">
                            <input type="password" class="form-control  text-white bg-transparent custom-placeholder-color" name="password" placeholder="Enter your password" id="" required>
                        </div>

                        <div class="d-flex flex-column mb-4">
                            <button type="submit" class="btn btn-light">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>