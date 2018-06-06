<?php
/**
 * Created by PhpStorm.
 * User: dante
 * Date: 6/4/18
 * Time: 8:56 AM
 */

namespace ProcessMaker\Nayra\Bpmn\Model;

use ProcessMaker\Nayra\Bpmn\DataStoreTrait;
use ProcessMaker\Nayra\Contracts\Bpmn\DataStoreInterface;
use ProcessMaker\Nayra\Contracts\Bpmn\ItemDefinitionInterface;
use ProcessMaker\Nayra\Contracts\Bpmn\ProcessInterface;

/**
 * Application
 *
 * @package ProcessMaker\Models
 */
class DataStore implements DataStoreInterface
{
    use DataStoreTrait;

    private $data = [];

    /**
     *
     * @var \ProcessMaker\Nayra\Contracts\Bpmn\ProcessInterface
     */
    private $process;

    /**
     *
     * @var \ProcessMaker\Nayra\Contracts\Bpmn\StateInterface
     */
    private $state;

    /**
     *
     * @var \ProcessMaker\Nayra\Contracts\Bpmn\ItemDefinitionInterface
     */
    private $itemSubject;



    /**
     * Get owner process.
     *
     * @return ProcessInterface
     */
    public function getOwnerProcess()
    {
        return $this->process;
    }

    /**
     * Get Process of the application.
     *
     * @param \ProcessMaker\Nayra\Contracts\Bpmn\ProcessInterface $process
     *
     * @return ProcessInterface
     */
    public function setOwnerProcess(ProcessInterface $process)
    {
        $this->process = $process;
        return $this;
    }

    /**
     * Get data from store.
     *
     * @param mixed $name
     *
     * @return mixed
     */
    public function getData($name = null)
    {
        return $name === null ? $this->data : $this->data[$name];
    }

    /**
     * Set data of the store.
     *
     * @param array $data
     *
     * @return $this
     */
    public function setData($data)
    {
        $this->data = $data;
        return $this;
    }

    /**
     * Put data to store.
     *
     * @param string $name
     * @param mixed $data
     *
     * @return $this
     */
    public function putData($name, $data)
    {
        $this->data[$name] = $data;
        return $this;
    }

    /**
     * Get item state.
     *
     * @return \ProcessMaker\Nayra\Contracts\Bpmn\StateInterface
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set item state.
     *
     * @param \ProcessMaker\Nayra\Contracts\Bpmn\StateInterface $state
     *
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;
        return $this;
    }

    /**
     * Get the items that are stored or conveyed by the ItemAwareElement.
     *
     * @return ItemDefinitionInterface
     */
    public function getItemSubject()
    {
        return $this->itemSubject;
    }
}