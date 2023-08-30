<?php
namespace App\Interfaces;

interface ChartItemInterface
{
    public function getLabel(): string;

    public function getValue(): int;
}