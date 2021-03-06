<?php
namespace AppBundle\Menu;

use Knp\Menu\ItemInterface;
use Knp\Menu\Matcher\Voter\VoterInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
class RequestVoter implements VoterInterface
{
    private $container;
    public function __construct(ContainerInterface $container)
    {
        $this->container = $container;
    }
    public function matchItem(ItemInterface $item)
    {
        $currentRequest = $this->container->get('request_stack')->getCurrentRequest();
    	if ($item->getUri() === $currentRequest->getRequestUri()) {
    		// URL's completely match
            return true;
        } else if($item->getUri() !== $currentRequest->getBaseUrl().'/' && (substr($currentRequest->getRequestUri(), 0, strlen($item->getUri())) === $item->getUri())) {
        	// URL isn't just "/" and the first part of the URL match
	    	return true;
    	}
        return null;
    }
}