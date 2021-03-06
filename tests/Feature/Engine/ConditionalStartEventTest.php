<?php

namespace Tests\Feature\Engine;
use ProcessMaker\Nayra\Contracts\Bpmn\DataStoreInterface;
use ProcessMaker\Nayra\Storage\BpmnDocument;


/**
 * Test a condition start event.
 *
 */
class ConditionalStartEventTest extends EngineTestCase
{

    /**
     * Test conditional start event
     *
     */
    public function testConditionalStartEvent()
    {
        // Load a BpmnFile Repository
        $bpmnRepository = new BpmnDocument();
        $bpmnRepository->setEngine($this->engine);
        $bpmnRepository->setFactory($this->repository);

        $bpmnRepository->load(__DIR__ . '/files/Conditional_StartEvent.bpmn');

        // Load a process from a bpmn repository by Id
        $process = $bpmnRepository->getProcess('Conditional_StartEvent');
        // When the process is loaded into the engine, the conditional start event is evaluated
        $this->engine->loadProcess($process);
        $this->engine->runToNextState();

        // Assertion: No process was started
        $this->assertEquals(0, $process->getInstances()->count());

        // Add the environmental data required by the condition
        $this->engine->getDataStore()->putData('a', '1');
        $this->engine->runToNextState();

        // Assertion: One process was started
        $this->assertEquals(1, $process->getInstances()->count());
    }
}
