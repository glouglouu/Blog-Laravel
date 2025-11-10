<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\View\View;

class Dropdown extends Component
{
    /**
     * The dropdown alignment.
     *
     * @var string
     */
    public $align;

    /**
     * The dropdown width.
     *
     * @var string
     */
    public $width;

    /**
     * The dropdown content classes.
     *
     * @var string
     */
    public $contentClasses;

    /**
     * Create a new component instance.
     */
    public function __construct($align = 'right', $width = '48', $contentClasses = '')
    {
        $this->align = $align;
        $this->width = $width;
        $this->contentClasses = $contentClasses;
    }

    /**
     * Get the alignment classes for the dropdown.
     *
     * @return string
     */
    public function alignmentClasses()
    {
        return match($this->align) {
            'left' => 'origin-top-left left-0',
            'top' => 'origin-top',
            default => 'origin-top-right right-0',
        };
    }

    /**
     * Get the width classes for the dropdown.
     *
     * @return string
     */
    public function widthClasses()
    {
        return match($this->width) {
            '48' => 'w-48',
            '56' => 'w-56',
            '64' => 'w-64',
            default => 'w-48',
        };
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View
    {
        return view('components.dropdown');
    }
}

