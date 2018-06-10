<?php 

namespace Core\Service;

class ServiceResult implements ServiceResultInterface 
{
    
    /** @return array */
    private $result = [];

    /** @return \Exception|null */
    private $error = null;

    
	public function __construct($result=null, $error=null)
	{
        $this->result = $result;
        $this->error = $error;
    }
    
    /**
     * Return the first result
     * @return mixed
     */
    public function getFirstResult()
    {
        return is_array($this->result) ? array_shift($this->result) : $this->result;
    }
        
    /**
     * Retorna a entidade     
     * @return array
     */
    public function getResult() : array
    {
        return $this->result;
    }

    /**
     * @return ServiceResultInterface
     */
    public function setResult($result) : ServiceResultInterface
    {
        $this->result = $result;
    }

    /**
     * Retorna lista de registros
     * @return \Exception|null
     */
    public function getError()
    {
        return $this->error;
    }

    /**
     * Altera erro
     * @param \Exception $error
     */
    public function setError($error) : ServiceResultInterface
    {
        $this->error = $error;
        return $this;
    }

    /**
     * Verifica se possui erro no resultado
     */
    public function hasError() : bool
    {
        return !is_null($this->error);
    }
    
}
