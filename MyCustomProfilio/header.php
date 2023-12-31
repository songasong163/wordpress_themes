
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" >
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/main.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.min.css">
    <script src="https://cdn.staticfile.org/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/masonry/4.2.2/masonry.pkgd.min.js"></script>
</head>
<?php

    $current_page_id = get_queried_object_id();
    
    $homepage_id = get_option('page_on_front');
    
    $is_homepage = $current_page_id == $homepage_id;
       
?>
<body>
    <section class="header p-4 position-relative" style="height:<?php echo $is_homepage?'70vh':'' ?>";>
        <nav class="navbar navbar-expand-lg navbg rounded-3 p-2 mb-4">
            <div class="container-fluid">
                <a class="navbar-brand" href="/">PORTFOLIO</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <?php if($is_homepage){
                    echo '
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Page Navigation
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#aboutme">About Me</a></li>
                            <li><a class="dropdown-item" href="#myskills">My Skills</a></li>
                            <li><a class="dropdown-item" href="#experience">Experience</a></li>
                            <li><a class="dropdown-item" href="#projectlist">Project List</a></li>
                            <li><a class="dropdown-item" href="#procase">Project Cases</a></li>
                            <li><a class="dropdown-item" href="#certification">Some Qualifications</a></li>
                            <li><a class="dropdown-item" href="#companies">Companies Served</a></li>
                            <li><a class="dropdown-item" href="#connect">Contact Me</a></li>
                        </ul>
                    </li>';
                    }
                    ?>
                    <li class="nav-item">
                    
                    <a class="nav-link " href="./custom">Blog</a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="<?php echo esc_url(home_url('/custom/')); ?>" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search_val">
                    <input type="hidden" name="search_form" value="true">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
                </div>
            </div>
        </nav>
        <?php if($is_homepage){
        echo '
        <div class="w-100 h-50 d-flex align-items-center">
            <h1 class="synopsis fw-bolder text-white"></h1>
        </div>';

        }
        ?>
    </section>
    
