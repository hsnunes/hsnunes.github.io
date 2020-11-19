<!doctype html>
<html lang="pt-br">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <!-- <link rel="stylesheet" href="/resources/trix/trix.css">
    <link rel="stylesheet" href="/css/dashboardModel.css">
    <link rel="stylesheet" href="/resources/pnotify/pnotify.custom.min.css"> -->

    <title>Painel Administrativo</title>
  </head>
  <body>

<?php include $content; ?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="/js/jquery-3.5.1.slim.min.js"></script>
    <script src="/js/popper.js@1.16.1_dist_umd_popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <!-- Js Extras -->
    <!-- <script src="/resources/trix/trix.js"></script>
    <script src="/js/feather-icons_4.9.0.min.js"></script>
    <script src="/js/dashboard.js"></script>
    <script src="/resources/pnotify/pnotify.custom.min.js"></script> -->
    <script>
      <?php flash(); ?>
      const confirmeEl = document.querySelector('.confirm');
      if (confirmeEl) {
        confirmeEl.addEventListener('click', function (e) {
          e.preventDefault();
          if (confirm('Tem certeza?')) {
              window.location = e.target.getAttribute('href');
          }
        });  
      }

    </script>

  </body>
</html>