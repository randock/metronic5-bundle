<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\HeaderBuilder\HeaderList\Definition;

interface HeaderListInterface
{
    public const NOTIFICATION = 'notification';

    /**
     * @return array
     */
    public function getOptions(): array;

    /**
     * @return array
     */
    public function getItems(): array;

    /**
     * @return string
     */
    public function getType(): string;
}
