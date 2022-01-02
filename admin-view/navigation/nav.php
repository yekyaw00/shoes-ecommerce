<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-Fo3rlrZj/k7ujTnHg4CGR2D7kSs0v4LLanw2qksYuRlEzO+tcaEPQogQ0KaoGN26/zrn20ImR1DfuLWnOo7aBA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<nav class="navbar navbar-expand-lg navbar-light style=" style="background: linear-gradient(to right, #554fad, #c326c4, #47b4cb);">
    <div class=" container-fluid">
        <a class="navbar-brand" href="#">
            <div>
                <img class="rounded-circle" src="../../images/nav-logo.jfif" alt="" width="70" height="60">
            </div>
        </a>
        <a class="navbar-brand text-white fs-4 fw-bold fst-italic" href="#">Your Shoes Your Choice</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse p-3" id="navbarSupportedContent">
            <ul class="nav nav-tabs me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link text-white" aria-current="page" href="../home/index.php">Home</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Items
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-secondary" href="../item/createform.php">Create Item</a></li>
                        <li><a class="dropdown-item text-secondary" href="../item/index.php">Item List</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Miscellaneous
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li><a class="dropdown-item text-secondary" href="../type/index.php">Type</a></li>
                        <li><a class="dropdown-item text-secondary" href="../color/index.php">Color</a></li>
                        <li><a class="dropdown-item text-secondary" href="../category/index.php">Categories</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                </li>
            </ul>
            <form class="d-flex">
                <input class="form-control-sm me-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light btn-sm" type="submit">Search</button>
            </form>
        </div>
    </div>
</nav>