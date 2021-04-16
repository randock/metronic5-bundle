<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\HeaderBuilder\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Randock\Metronic5Bundle\HeaderBuilder\HeaderBuilder;

class Metronic5HeaderBuilderExtension extends AbstractExtension
{
    /**
     * @var HeaderBuilder
     */
    private $headerBuilder;

    /**
     * Metronic5HeaderBuilderExtension constructor.
     *
     * @param HeaderBuilder $headerBuilder
     */
    public function __construct(HeaderBuilder $headerBuilder)
    {
        $this->headerBuilder = $headerBuilder;
    }

    /**
     * @return TwigFunction[]
     */
    public function getFunctions(): array
    {
        return [
            new TwigFunction('getHeaderLists', [$this->headerBuilder, 'getServices']),
        ];
    }
}
