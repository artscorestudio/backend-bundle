# Add new items in ASFBackendBundle menus

Menus in default layout are based on KnpMenuBundle. So, for all explanations about it, [read its documentation](http://symfony.com/doc/master/bundles/KnpMenuBundle/index.html).

## Navbar Menu and Sidebar Menu

For add an item in Navbar Menu or Sidebar Menu, simply create an event [listener or an event subscriber](http://symfony.com/doc/current/cookbook/event_dispatcher/event_listener.html) catch the event *asf_backend.menu.navbar.init*.

The default backend layout is based on Twitter Bootstrap layout example : [Dashboard](http://getbootstrap.com/examples/dashboard/).

Here is an exemple of event subscriber :

```php
namespace ASF\BackendBundle\Event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Knp\Menu\Matcher\Matcher;
use Knp\Menu\Matcher\Voter\RouteVoter;
use Symfony\Component\HttpFoundation\RequestStack;

class MenuSubscriber implements EventSubscriberInterface
{
	/**
	 * @var RequestStack
	 */
	protected $request;
	
	/**
	 * @param RequestStack $request
	 */
	public function __construct(RequestStack $request)
	{
		$this->request = $request;
	}
	
	/**
	 * Subscribed Events
	 */
	public static function getSubscribedEvents()
	{
		return array(
			 BackendEvents::NAVBAR_MENU_INIT => array('onNavbarMenuInit', 0)
		);
	}

	/**
	 * @param NavbarMenuEvent $event
	 */
	public function onNavbarMenuInit(NavbarMenuEvent $event)
	{
		$menu = $event->getMenu();
		$factory = $event->getFactory();
		
		// Home link
		$item = $factory->createItem('Home', array('route' => 'asf_backend_homepage'));
		$menu->addChild($item);
		
		$matcher = new Matcher();
		$matcher->addVoter(new RouteVoter($this->request->getCurrentRequest()));
		$item->setCurrent($matcher->isCurrent($item));
	}
}
```