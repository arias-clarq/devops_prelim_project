<?php include 'admin-includes/header.php'; ?>

<!-- Page content -->
<div class="main">

    <div class="container-fluid border text-center my-4 p-3">
        <span class="d-block">
            <h2>Update Logo</h2>
        </span>
        <span class="d-block"><img src="https://webstockreview.net/images/win-clipart-closed-window-13.png" height="200vh"></span>
        <button class="btn btn-primary mt-3" data-bs-toggle="modal" data-bs-target="#logoModal">Choose Logo</button>
        <?php include 'admin-includes/cms-logo-modal.php'; ?>
    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2 class="text-center mb-3">School Profile</h2>
        <div class="row d-flex">
            <div class="col-sm-2 text-center">
                <h6>Category</h6>
            </div>
            <div class="col-sm-10 text-center">
                <h6>Details</h6>
            </div>
        </div>

        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Name:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2" placeholder="Enter School Name" name="" id="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Location:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2" placeholder="Enter School's Location" name="" id="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Email Address:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control mb-2" placeholder="Enter School's Email Address" name="" id="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Mobile Number:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2" placeholder="Enter School's Mobile Number" name="" id="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Telephone Number:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2" placeholder="Enter School's Telephone Number" name="" id="">
            </div>
        </div>
        <div class="mb-3 row">
            <label for="" class="col-sm-2 col-form-label text-end text-end-to-left">Description:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control mb-2" placeholder="Enter Description" name="" id="">
            </div>
        </div>

        <button class="btn btn-primary">Save</button>

    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Cover Page</h2>
        <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#covepageModal">Insert</button>
        <?php include 'admin-includes/cms-coverpage-modal.php'; ?>

        <!-- on default, there's no card dispalyed -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="https://www.pixelstalk.net/wp-content/uploads/images4/7698x4330-Night-Mountains-Summer-Illustration-8K-Wallpaper_-HD-Artist-4K-Wallpaper_-Image_-Photo-and-scaled.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <input type="text" placeholder="Insert Title" class="form-control border-0 mb-3">
                        <textarea name="" placeholder="Insert Caption" id="" cols="30" rows="2" class="form-control border-0"></textarea>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Cards and Images</h2>
        <button class="btn btn-primary my-3" data-bs-toggle="modal" data-bs-target="#cardModal">Insert</button>
        <?php include 'admin-includes/cms-card-modal.php'; ?>

        <!-- on default, there's no card dispalyed -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow">
                    <img src="https://i.ytimg.com/vi/cHFLJV-a_ts/hqdefault.jpg" class="card-img-top" alt="...">
                    <div class="card-body">
                        <input type="text" placeholder="Insert Title" class="form-control border-0 mb-3">
                        <textarea name="" placeholder="Insert Caption" id="" cols="30" rows="2" class="form-control border-0"></textarea>
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>


    </div>

    <div class="container-fluid border text-center my-4 p-3">
        <h2>Grid Contents</h2>

        <!-- on default, there's no card dispalyed -->
        <div class="row row-cols-1 row-cols-md-3 g-4">
            <div class="col">
                <div class="card h-100 shadow">
                    <div class="card-body text-center">
                        <label for="">Title</label>
                        <input type="text" placeholder="Insert Title" class="form-control">
                        <label for="">Caption</label>
                        <textarea name="" placeholder="Insert Caption" id="" cols="30" rows="2" class="form-control"></textarea>
                        <label for="">Size</label>
                        <input type="text" placeholder="Insert Size" class="form-control">
                        <label for="exampleColorInput" class="form-label">Choose Background Color</label>
                        <input type="color" class="form-control form-control-color" id="exampleColorInput" value="#ffffff" title="Choose your color">
                    </div>
                    <div class="card-footer">
                        <button class="btn btn-primary">
                            <i class="fa-solid fa-floppy-disk"></i>
                        </button>
                        <button class="btn btn-danger">
                            <i class="fa-solid fa-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>


    </div>

</div>



<?php include 'admin-includes/footer.php'; ?>