<?php

namespace ProcessMaker\Nayra\Contracts\Bpmn;

/**
 * MessageEventDefinition interface.
 *
 * @package ProcessMaker\Nayra\Contracts\Bpmn
 */
interface SignalEventDefinitionInterface extends EventDefinitionInterface
{

    /**
     * Returns the event definition payload (message, signal, etc.)
     *
     * @return mixed
     */
    public function getPayload();

    /**
     * Sets the payload (message, signal, etc.)
     *
     * @param mixed $value
     *
     * @return $this
     */
    public function setPayload($value);
}