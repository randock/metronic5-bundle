<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\HeaderBuilder\Twig;

use Twig\TwigFunction;
use Twig\Extension\AbstractExtension;
use Randock\Metronic5Bundle\HeaderBuilder\HeaderBuilder;

class MetronicHeaderBuilderExtension extends AbstractExtension
{
    /**
     * @var HeaderBuilder
     */
    private $headerBuilder;

    public function __construct(HeaderBuilder $headerBuilder)
    {
        $this->headerBuilder = $headerBuilder;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('getHeaderLists', [$this->headerBuilder, 'getServices']),
        ];
    }
}
