<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>
        <?php echo $global['appName']; ?>
    </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/font-awesome/css/all.min.css" />
    <style>
        /* Add styles for the footer */
        .footer {
            position: absolute;
            bottom: 0;
            width: 100%;
        }
        /* Add styles for the main content */
        .content {
            min-height: calc(100vh - 56px);
            display: flex;
            flex-direction: column;
        }
    </style>
</head>
<body>
    <header>
        <?php if(isset($data[0])) echo "UPS!... mal ingresados los datos"; ?>
        <nav class="navbar navbar-expand-md <?php echo $navBarColor; ?>">
            <div class="container-lg">
                <a class="navbar-brand" href="./"><?php echo $global['appName']; ?></a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </nav>
    </header>
    <main class="container pt-3 content">
        <!-- Content goes here -->
        <?php include $routeContent; ?>
    </main>
    <footer class="<?php echo $footerColor; ?> footer">
        <p class="text-end px-3">Copyright © <?php echo date("Y"); ?> <?php echo $global['appName']; ?></p>
    </footer>    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>

