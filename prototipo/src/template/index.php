<?php
    require_once '../testes/twig/vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('../views');
    $twig = new \Twig\Environment($loader, [
        'cache' => '../template/cache',
        'cache' => false
    ]);
    $template = $twig->load("layout.html");
    $template1 = $twig->load("venda.php");

    /*$clientes = array(
        Array('ficha'=>'1', 'veiculo'=>'moto', 'lavada'=>'completa sem cera'),
        Array('ficha'=>'2', 'veiculo'=>'carro', 'lavada'=>'completa com cera'),
        Array('ficha'=>'3', 'veiculo'=>'caminhonete', 'lavada'=>'interna'),
        Array('ficha'=>'4', 'veiculo'=>'carro', 'lavada'=>'externo')
    );*/
    
    //$template->display();//faz a mesma coisa que reader porem nao precisa do echo
    /*$valores = array('LAYOUT' => 'esse dados veio do twig na pagina teste.php', 
    'VARIAVELTWIG1'=>'esse dados TAMBEM veio do twig na pagina teste.php',
    'CLIENTES' => $clientes);*/
    //echo $template->render($valores);
    echo $template->render(array('LAYOUT'=>'oi'));

    
    
    
    ?>