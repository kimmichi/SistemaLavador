<?php
    require_once 'vendor/autoload.php';
    $loader = new \Twig\Loader\FilesystemLoader('../twig/views');
    $twig = new \Twig\Environment($loader, [
        'cache' => '../twig/cache',
        'cache' => false
    ]);
    $template = $twig->load("pagina.html");

    $clientes = array(
        Array('ficha'=>'1', 'veiculo'=>'moto', 'lavada'=>'completa sem cera'),
        Array('ficha'=>'2', 'veiculo'=>'carro', 'lavada'=>'completa com cera'),
        Array('ficha'=>'3', 'veiculo'=>'caminhonete', 'lavada'=>'interna'),
        Array('ficha'=>'4', 'veiculo'=>'carro', 'lavada'=>'externo')
    );
    
    //$template->display();//faz a mesma coisa que reader porem nao precisa do echo
    $valores = array('VARIAVELTWIG' => 'esse dados veio do twig na pagina teste.php', 
    'VARIAVELTWIG1'=>'esse dados TAMBEM veio do twig na pagina teste.php',
    'CLIENTES' => $clientes);
    echo $template->render($valores);
    
    echo "<pre>";
    echo var_dump($clientes)."</pre>";

    
    
    
    ?>
