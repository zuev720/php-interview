<?php

class SomeObject
{
    private string $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getObjectName(): string
    {
        return $this->name;
    }
}

class SomeObjectsHandler
{
    private $handlers;

    public function __construct()
    {
        $this->handlers = [];
    }

    public function handleObjects(array $objects): array
    {
        foreach ($objects as $object) {
            if ($object->getObjectName() == 'object_1')
                $this->handlers[] = 'handle_object_1';
            if ($object->getObjectName() == 'object_2')
                $this->handlers[] = 'handle_object_2';
        }

        return $this->handlers;
    }
}

$objects = [
    new SomeObject('object_1'),
    new SomeObject('object_2')
];

$soh = new SomeObjectsHandler();
print_r($soh->handleObjects($objects));