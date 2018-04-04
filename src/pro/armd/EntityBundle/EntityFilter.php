<?php

namespace pro\armd\EntityBundle;

/**
 * Class UserPropFilter
 * @package pro\armd\EntityBundle
 */
abstract class EntityFilter
{
    /**
     * @var string
     */
    private $fileldName;

    /**
     * @var string
     */
    private $value;

    /**
     * @var bool
     */
    private $positive;


    public function __construct(string $fileldName, string $value, bool $positive = true)
    {
        $this->fileldName = $fileldName;
        $this->value = $value;
        $this->positive = $positive;
    }

    /**
     * @return string
     */
    public function getFileldName(): string
    {
        return $this->fileldName;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->value;
    }

    /**
     * @return bool
     */
    public function isPositive(): bool
    {
        return $this->positive;
    }
}