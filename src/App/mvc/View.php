<?php
namespace App\mvc;
class View{

    private $template = 'default';

    public function __construct($file,$data = array())
    {
        try {
            $fileTemplate = __DIR__ . '/template/' . strtolower($this->template) . '.php';

            $fileView = __DIR__ . '/views/' . strtolower($file) . '.php';

            if (file_exists($fileTemplate) && file_exists($fileView)) {
                $this->render($fileView,$fileTemplate,$data);
            } else {
                throw new \Exception('Template ' . $this->template . ' não encontrado!');
            }
        }
        catch (\Exception $e) {
            echo $e->getMessage();
        }
    }

    public function render($file,$template,$data){
        ob_start();
        $content = $this->putFileLayout($file,$data);
        require $template;
        $renderedView = ob_get_clean();
        echo $renderedView;
    }

    private function putFileLayout($file,$data){
        extract($data);
        include $file;
        $r = ob_get_clean();
        return $r;
    }

}
