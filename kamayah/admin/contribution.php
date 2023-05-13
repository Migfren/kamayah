<?php 
   include('include/header.php');
   include "include/navbar.php";

   $tab= '';
   if (isset($_GET['tab'])) {
       $tab = filter_var($_GET['tab']) ;
     }
   ?>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<body>
    <link rel='stylesheet' href='css/statistic-card.css'>
    <link rel='stylesheet' href='css/tab-contri.css'>


    <input type='hidden' id='selected-cart' value=''>
    <div class='main-content' style='position:relative; height:100%;'>
        <div class="container home-section h-100" style="max-width:95%;">
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <div class="container-fluid">

                    <div class="inventory-table">
                        <div class="container-fluid">
                            <div class="wrapper" id="myTab">
                                <input type="radio" name="slider" id="home" checked>
                                <input type="radio" name="slider" id="blog"
                                    <?php if ($tab == '2') { echo 'checked'; } else { echo ''; } ?>>
                                <input type="radio" name="slider" id="code"
                                    <?php if ($tab == '3') { echo 'checked'; } else { echo ''; } ?>>

                                <nav>
                                    <label for="home" class="home"><i class="fa fa-book"></i> Pending Submission</label>
                                    <label for="blog" class="blog"><i class="fas fa-list"></i>Confirmed </label>
                                    <label for="code" class="code"><i class="fa-solid fa-list"></i> Rejected </label>

                                    </label>
                                    <div class="slider"></div>
                                </nav>
                                <section>
                                    <div class="content content-1">
                                        <div class="title">Pending Submission </div>


                                        <hr>
                                        <?php include('contribution/pending.php') ?>
                                    </div>
                                    <div class="content content-2">

                                        <div class="title">Confirmed Data</div>

                                        <i class="fa fa-add" aria-hidden="true"></i> ADD PHRASE </button>
                                        <hr>
                                        <?php include('contribution/confirmed.php') ?>

                                    </div>
                                    <div class="content content-3">
                                        <div class="title">Rejected</div>
                                        <?php include('contribution/rejected.php') ?>

                                    </div>

                                </section>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

</body>

</html> <?php
include('modal/new_word.php');
include('modal/new_phrase.php');
include('modal/m_contribution.php');
?>
<script type="text/javascript" src="js/copra-ca.js"></script>