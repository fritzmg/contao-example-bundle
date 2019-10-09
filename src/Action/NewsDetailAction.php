<?php

namespace College\ExampleBundle\Action;

use Contao\ContentModel;
use Contao\Controller;
use Contao\CoreBundle\Exception\PageNotFoundException;
use Contao\NewsModel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
 * @Route("/_newsdetail/{id}",
 *   name = NewsDetailAction::class,
 *   defaults = {"_scope": "frontend"},
 *   requirements = {"id": "\d+"}
 * )
 */
class NewsDetailAction
{
    public function __invoke(Request $request, int $id): Response
    {
        $elements = ContentModel::findPublishedByPidAndTable($id, NewsModel::getTable());

        if (null !== $elements) {
            $content = '';

            foreach ($elements as $element) {
                $content .= Controller::getContentElement($element);
            }

            return new Response($content);
        }

        throw new PageNotFoundException();
    }
}
