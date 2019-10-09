<?php

namespace College\ExampleBundle\Controller\ContentElement;

use Contao\ContentModel;
use Contao\CoreBundle\Controller\ContentElement\AbstractContentElementController;
use Contao\CoreBundle\ServiceAnnotation\ContentElement;
use Contao\Template;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * @ContentElement(category="texts")
 */
class MyContentElementController extends AbstractContentElementController
{
    protected function getResponse(
        Template $template, 
        ContentModel $model, 
        Request $request): ?Response
    {
        $template->text = $model->text;
        
        return $template->getResponse();
    }
}
