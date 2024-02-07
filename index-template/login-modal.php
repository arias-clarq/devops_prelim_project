<!-- Modal -->
<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 bg-gradient-custom">
            <div class="modal-body px-5 text-center">
                <div class="mb-3">
                    <i class="fas fa-user-circle fa-10x text-white"
                        style="background-color: #015783!important; border-radius:50%;"></i>
                </div>
                <form action="config/user_login.php" method="post">
                    <div class="modal-body">
                        <label for="">Username:</label>
                        <div class="input-group mb-2">
                            <input type="text" class="form-control" name="username" placeholder="Enter your username"
                                id="" required>
                        </div>
                        <label for="">Password:</label>
                        <div class="input-group mb-2">
                            <input type="password" class="form-control" name="password"
                                placeholder="Enter your password" id="" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>