<?php
namespace Rawebone\ViewModel;

interface ViewEngineInterface
{
    /**
     * Returns a string with the contents of the rendered ViewModel.
     * 
     * @return string
     */
    function render(ViewModelInterface $vm);
}
