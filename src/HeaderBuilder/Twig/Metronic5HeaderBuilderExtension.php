<?php

declare(strict_types=1);

namespace Randock\Metronic5Bundle\HeaderBuilder\Twig;

use Randock\Metronic5Bundle\HeaderBuilder\HeaderBuilder;

class Metronic5HeaderBuilderExtension extends \Twig_Extension
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
            new \Twig_SimpleFunction('getHeaderLists', [$this->headerBuilder, 'getServices']),
        ];
    }
}
