<?php

namespace Imanee\Filter\GD;

use Imanee\Imanee;
use Imanee\Model\FilterInterface;

/**
 * Modulate Filter - changes image brightness and contrast
 */
class ModulateFilter implements FilterInterface
{
    /**
     * {@inheritdoc}
     */
    public function apply(Imanee $imanee, array $options = [])
    {
        /** @var resource $resource */
        $resource = $imanee->getResource()->getResource();

        $options = array_merge([
            'brightness' => 50,
            'contrast' => -10
        ], $options);

        imagefilter($resource, IMG_FILTER_BRIGHTNESS, $options['brightness']);
        imagefilter($resource, IMG_FILTER_CONTRAST, $options['saturation']);
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'filter_modulate';
    }
}
