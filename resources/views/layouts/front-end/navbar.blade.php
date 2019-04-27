<style>

.openbtn {
  font-size: 20px;
  cursor: pointer;
  background-color: #111;
  color: white;
  padding: 10px 15px;
  border: none;
}

.openbtn:hover {
  background-color: #444;
}

#main {
  transition: margin-right .5s;
  padding: 16px;
}
    .coner-nav {
        text-align: center;
        width: 160px;
        -webkit-clip-path: polygon(85% 0, 100% 50%, 85% 100%, 0% 100%, 14% 50%, 0% 0%);
        clip-path: polygon(85% 0, 100% 50%, 85% 100%, 0% 100%, 14% 50%, 0% 0%);
        background-color: rgba(0, 152, 255, 0.9) !important;



    }

    .img-round {
        border-radius: 55%;
    }


    ul>li:hover {
        background-color: coral;
    }

    ul>li>a:hover {
        background-color: coral;

    }

    .navbar-dark .navbar-nav .nav-link:hover {
        background-color: coral;
    }

    .nav-link.active,
    .navbar-dark .navbar-nav .nav-link.show,
    .navbar-dark .navbar-nav .show>.nav-link {
        font-size: 16px;
    }



    .dropdown-content {
        display: none;
        position: absolute;
        z-index: 1;
        right: -34%;
        width: 250px;
        background-color: #343a40;

    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
        float: left;
    }

    .dropdown:hover .dropdown-content {
        display: block;
    }

    .nav-cotent {
        z-index: 1;
        background-color: #343a40 !important;
        margin-bottom: 10%;
        padding-bottom: 3%;
    }

    .nav-height {
        height: 60px;
    }


    @media screen and (max-width: 992px) {
        .nav-height {
            height: 81px;
        }

    }
</style>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark mr-2 ml-2 nav-height">
    <div class="mr-3">
        <h4 class="text-white "> POS</h4>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse  " id="navbarColor01">
        <ul class="nav navbar-nav ml-5 ">

            <!-- <li class="nav-item coner-nav ">
                <div class=" ">
                    <a class="nav-link active" href="#">Room </a>
                </div>
            </li>

            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Sale Product</a>
                </div>
            </li>
            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Register Details</a>
                </div>
            </li>
            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Today's Sale</a>
                </div>
            </li>
            <li class="nav-item coner-nav ">
                <div>
                    <a class="nav-link active" href="#">Close Register</a>
                </div>

            </li> -->


        </ul>

    </div>

    <div class="dropdown">
        <ul class="nav navbar-nav ml-auto position-relative dropdown">
            <li class="nav-item img-round dropbtn ">
                <a class="ml-auto " data-toggle="collapse" href="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQAbcsfOhKzLDJSzWUqF6BTrfiYNLUurPxa2bsB8rv6WpPu9EEU" class="img-round" alt="" width="30px;" height="30px;">
                </a>

            </li>

        </ul>

        <div class=" dropdown-content">
            <ul class="list-group ">
                <li class="list-group-item active text-center">Setting</li>
                <li class="list-group-item"> <a class="nav-link" href="#"><i class="fas fa-edit mr-2"></i> View Profile</a></li>
                <li class="list-group-item"><a class="nav-link" href="#"><i class="fas fa-power-off mr-2"></i> Log out</a></li>
            </ul>
        </div>
    </div>

</nav>
