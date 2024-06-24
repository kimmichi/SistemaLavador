<?php
    require_once 'vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('../twig/views');
    $twig = new \Twig\Environment($loader, [
        'cache' => '../twig/cache',
        'cache' => false
    ]);
    $template = $twig->load("pagina2.html");
    
    //$template->display();//faz a mesma coisa que reader porem nao precisa do echo

    //echo $template->render();
    $template->display();
    


    
    
    
    ?>