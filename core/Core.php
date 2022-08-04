<?php

/**
 * Classe de ponto de partida da aplicação. 
 */
class Core
{
    /**
     * Inicia nossa aplicação.
     * Recebe a URL, quebra ela em partes e encaminha para o controller responsável e sua action.
     */
    public function run()
    {
        $url = '/' . (isset($_GET['url']) ? $_GET['url'] : '');
        $params = [];
        if (!empty($url) && $url != '/') {
            $url = explode('/', $url);
            array_shift($url);

            $currentController = $url[0] . 'Controller';
            array_shift($url);

            if (isset($url[0]) && !empty($url[0])) {
                $currentAction = $url[0];
                array_shift($url);
            } else {
                $currentAction = 'index';
            }
            if(count($url) > 0){
                $params = $url;
            }
        } else {
            $currentController = 'homeController';
            $currentAction = 'index';
        }
        
        // Instanciamos o controller
        $controller = new $currentController();
        
        // Chamamos a action do controller, com o método abaixo, para poder enviar parâmetros.
        call_user_func_array(array($controller, $currentAction), $params);
                
    }
}
