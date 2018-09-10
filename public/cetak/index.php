<?php
include('header.php');
?>
<div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ..." aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

                        <div class="dropdown for-notification">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="notification" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fa fa-bell"></i>
                            <span class="count bg-danger">5</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="notification">
                            <p class="red">You have 3 Notification</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <i class="fa fa-check"></i>
                                <p>Server #1 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <i class="fa fa-info"></i>
                                <p>Server #2 overloaded.</p>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <i class="fa fa-warning"></i>
                                <p>Server #3 overloaded.</p>
                            </a>
                          </div>
                        </div>

                        <div class="dropdown for-message">
                          <button class="btn btn-secondary dropdown-toggle" type="button" id="message" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="ti-email"></i>
                            <span class="count bg-primary">9</span>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="message">
                            <p class="red">You have 4 Mails</p>
                            <a class="dropdown-item media bg-flat-color-1" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/1.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jonathan Smith</span>
                                    <span class="time float-right">Just now</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-4" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/2.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Jack Sanders</span>
                                    <span class="time float-right">5 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-5" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/3.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Cheryl Wheeler</span>
                                    <span class="time float-right">10 minutes ago</span>
                                        <p>Hello, this is an example msg</p>
                                </span>
                            </a>
                            <a class="dropdown-item media bg-flat-color-3" href="#">
                                <span class="photo media-left"><img alt="avatar" src="images/avatar/4.jpg"></span>
                                <span class="message media-body">
                                    <span class="name float-left">Rachel Santos</span>
                                    <span class="time float-right">15 minutes ago</span>
                                        <p>Lorem ipsum dolor sit amet, consectetur</p>
                                </span>
                            </a>
                          </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-5">
                    <div class="user-area dropdown float-right">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <img class="user-avatar rounded-circle" src="images/admin.jpg" alt="User Avatar">
                        </a>

                        <div class="user-menu dropdown-menu">
                                <a class="nav-link" href="#"><i class="fa fa- user"></i>My Profile</a>

                                <a class="nav-link" href="#"><i class="fa fa- user"></i>Notifications <span class="count">13</span></a>

                                <a class="nav-link" href="#"><i class="fa fa -cog"></i>Settings</a>

                                <a class="nav-link" href="#"><i class="fa fa-power -off"></i>Logout</a>
                        </div>
                    </div>

                    <div class="language-select dropdown" id="language-select">
                        <a class="dropdown-toggle" href="#" data-toggle="dropdown" id="language" aria-haspopup="true" aria-expanded="true">
                            <i class="flag-icon flag-icon-us"></i>
                        </a>
                        <div class="dropdown-menu" aria-labelledby="language">
                            <div class="dropdown-item">
                                <span class="flag-icon flag-icon-fr"></span>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-es"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-us"></i>
                            </div>
                            <div class="dropdown-item">
                                <i class="flag-icon flag-icon-it"></i>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Dashboard</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                  <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header">
                            <strong class="card-title">Pilih / Ceklis</strong>
                        </div>
                        <div class="card-body">
                          <!-- Credit Card -->
                          <div id="pay-invoice">
                              <div class="card-body">
                                  <!-- <div class="card-title">
                                      <h3 class="text-center">Pay Invoice</h3>
                                  </div> -->
                                  <!-- <hr> -->
                                  <form action="select_pdf.php" target='_blank' id='input_data_pro_palsu' method="post" novalidate="novalidate">
                                      <!-- <div class="form-group text-center">
                                          <ul class="list-inline">
                                              <li class="list-inline-item"><i class="text-muted fa fa-cc-visa fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-mastercard fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-amex fa-2x"></i></li>
                                              <li class="list-inline-item"><i class="fa fa-cc-discover fa-2x"></i></li>
                                          </ul>
                                      </div> -->
                                      <!-- <div class="row form-group">
                            <div class="col col-md-3"><label class=" form-control-label">Checkboxes</label></div>
                            <div class="col col-md-9">
                              <div class="form-check">
                                <div class="checkbox">
                                  <label for="checkbox1" class="form-check-label ">
                                    <input type="checkbox" id="checkbox1" name="checkbox1" value="option1" class="form-check-input">Option 1
                                  </label>
                                </div>
                                <div class="checkbox">
                                  <label for="checkbox2" class="form-check-label ">
                                    <input type="checkbox" id="checkbox2" name="checkbox2" value="option2" class="form-check-input"> Option 2
                                  </label>
                                </div>
                                <div class="checkbox">
                                  <label for="checkbox3" class="form-check-label ">
                                    <input type="checkbox" id="checkbox3" name="checkbox3" value="option3" class="form-check-input"> Option 3
                                  </label>
                                </div>
                              </div>
                            </div>
                          </div> -->
                                      <table class="table">
                                        <tbody><tr>
                                        <!-- <td colspan="2"></td> -->
                                            <div id="loading-message"></div>
                                        </tr>
                                        <tr><td>
                                        <div class="checker" id="uniform-undefined"><span><input type="checkbox" name="nameCat"> Cetak Penting</span></div></td><td><input type="text" name="penting" class="text"> <br>* Huruf X,Y atau Z</td> </tr>
                                        <tr><td><div class="checker" id="uniform-undefined"><span><input type="checkbox" name="pengCat"> Region</span></div></td><td>
                                            <div class="selector" id="uniform-region"><span></span><select name="region" id="region">
                                            <option selected="selected">[PILIH REGION]</option>
                                            <option>REGIONAL I, JABODETABEK</option>
                                            <option>REGIONAL II, JAWA BALI</option>
                                            <option>REGIONAL III, SUMATERA</option>
                                            <option>REGIONAL IV, KALIMANTAN</option>
                                            <option>REGIONAL V, SULAWESI</option>
                                            <option>REGIONAL VI, NTB &amp; NTT</option>
                                            <option>REGIONAL VII, MALUKU &amp; PAPUA</option>
                                            </select></div>
                                        </td></tr>
                                        <tr><td><div class="checker" id="uniform-undefined"><span><input type="checkbox" name="proCat"> Propinsi</span></div></td><td><input type="text" name="propinsi" class="text"></td></tr>
                                        <tr><td><div class="checker" id="uniform-undefined"><span><input type="checkbox" name="proKla"> Klasifikasi</span></div></td><td><input type="text" name="klasifikasi" class="text"></td></tr>
                                        <tr><td><div class="checker" id="uniform-undefined"><span><input type="checkbox" name="desCat"> Name (Bengkel)</span></div></td><td><input type="text" name="toko" class="text"></td></tr>



                                        </tbody>
                                        </table>
                                        <div class="card-footer">
                                            <button type="submit" name="upload" id="btn_tampilkan" class="btn btn-primary btn-sm">
                                            <i class="fa fa-dot-circle-o"></i> Submit
                                            </button>
                                            <button type="reset" class="btn btn-danger btn-sm">
                                            <i class="fa fa-ban"></i> Reset
                                            </button>
                                        </div>
                                  </form>
                              </div>
                          </div>

                        </div>
                    </div> <!-- .card -->

                  </div><!--/.col-->

                  </div>

                </div>


            </div><!-- .animated -->
        </div><!-- .content -->


    </div>
    <?php
include('footer.php');