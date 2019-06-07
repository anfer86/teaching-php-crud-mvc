<?php
class Autoload {
    
    public function __construct() {
        # Definição da extensão de nossos arquivos
        # a serem carregados pelo autoload
        spl_autoload_extensions('.class.php');
        # Informamos qual é o método que carrega a classe
        # neste caso 'load' que será definido como
        # método desta classe.
        spl_autoload_register(array($this, 'load'));
    
    }

    private function splitClassName($className){
        # Separamos o nome das classes pela letra 'Maiúscula'
        # Por ex. o nome da classe 'TabuadaModel', 
        # será separado        
    	return preg_split('/(?=[A-Z])/',$className);
    }
    
    private function getFolderName($className){        
    	$splitted = $this->splitClassName($className);
        # Com o nome da classe separado em partes,
        # obtemos o nome da pasta e transformamos ele em
        # caixa baixa. Além disso adicionamos um 's' para
        # retornar o diretório correto.
        # Por ex. 'TabuadaModel' é transformado em ['Tabuada','Model']
        # e 'Model' é transformado em 'model' e por fim em 'models'
        # que é o nome da pasta na nossa aplicação.    
    	$folder = strtolower(end($splitted)) . 's';
    	return $folder;
    }
    
    private function load($className) {
        # Esta é a nossa função que carrega as classes
        # Pegamos a extensão que definimos '.class.php'  
        $extension = spl_autoload_extensions();
        # Obtemos o nome da pasta onde está classe
        $folder = $this->getFolderName($className) ;
        # Criamos o endereço do arquivo onde está a classe
        $classPathFile = $_SERVER['DOCUMENT_ROOT'] . '/src/' . $folder . '/' . $className . $extension;
        # Carregamos esse arquivo para que possa ser criada
        # uma instância em qualquer momento.
        require_once $classPathFile;
    }
}

$autoload = new Autoload();

?>