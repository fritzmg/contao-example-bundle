<?php

namespace College\ExampleBundle\EventListener;

use College\ExampleBundle\Action\NewsDetailAction;
use Contao\CoreBundle\ServiceAnnotation\Hook;
use Contao\FrontendTemplate;
use Contao\Module;
use Contao\UserModel;
use Symfony\Component\Routing\RouterInterface;
use Terminal42\ServiceAnnotationBundle\ServiceAnnotationInterface;

class ParseArticlesListener implements ServiceAnnotationInterface
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    /**
     * @Hook("parseArticles")
     */
    public function onFooParseArticles(
        FrontendTemplate $template, 
        array $newsEntry, 
        Module $module): void
    {
        if (null !== ($author = UserModel::findByPk($newsEntry['author']))) {
            $template->author = $author->name;
        }

        $contentUrl = $this->router->generate(NewsDetailAction::class, [
            'id' => $newsEntry['id'],
        ]);

        $template->contentUrl = $contentUrl;
    }
}
