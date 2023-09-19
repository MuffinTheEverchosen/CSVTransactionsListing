<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="utf-8">
    <title>CSVTransactions</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/views/templates/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body class="body">
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand" href="/"><span class='text-primary'>CSV</span>Transactions</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/upload">Upload</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/list">List</a>
                </li>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <?php include $viewPath ?> <!--zmienna viewPath powinna być zadeklarowana na górze pliku w sekcji php. Prawdopodobnie powinna być informacja o typie string w phpdoc tj. @var string $viewPath-->
</main>
<footer class="bg-body-tertiary w-100 p-1 d-flex gap-4 fs-5 fixed-bottom">
    <p class="m-0"><span class="text-primary-emphasis">Made By:</span> Marcin Piechowski</p>
    <a href="www.linkedin.com/in/marcin-piechowski-50b993276" class="text-decoration-none text-white"><i class="bi bi-linkedin text-primary-emphasis"></i> Linkedin</a>
    <a href="https://github.com/MuffinTheEverchosen" class="text-decoration-none text-white"><i class="bi bi-github text-primary-emphasis"></i> Github</a>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>