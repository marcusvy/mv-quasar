#API

The Core API generate a complete REST with the simple steps:

* Repository: Behavior of Database
* Entity: Structure of Data
* Service: Behavior of App
* Form: Validation and Filter data
* Action: Send data commands from route
* Route: The path

## Repository

Create a Repository to define the behavior layer to database. Extends the 
*Core\Doctrine\ORM\AbstractEntityRepository*

**Location**: <Namespace>/Model/Repository

```php
namespace Log\Model\Repository;

use Core\Doctrine\ORM\AbstractEntityRepository;

/**
 * LoggerRepository
 */
class LoggerRepository extends AbstractEntityRepository
{

}
```

## Entity

Create a Entity to define the database. Extends the *Core\Doctrine\AbstractEntity*

**Location**: <Namespace>/Model/Entity

```php
namespace Log\Model\Entity;

use Core\Doctrine\AbstractEntity;
use Doctrine\ORM\Mapping as ORM;

/**
 * Logger
 *
 * @ORM\Table(name="mv_logger")
 * @ORM\Entity(repositoryClass="Log\Model\Repository\LoggerRepository")
 */
class Logger extends AbstractEntity
{

    # Properties ... 

    public function __construct($options = [])
    {
        parent::__construct($options);
    }

    # Getters and Setters  ... 

    # Overwrite Methods
 
}
```

## Service

Create a Interface, for tests, and extend the *Core\Service\ServiceInterface*. Create a Service and extends the "Core\Service\AbstractService" and implements the Interface.

**Location**: <Namespace>/Service

ServiceInterface
```php
namespace Log\Service;

use Core\Service\ServiceInterface;

interface LoggerServiceInterface extends ServiceInterface
{

}
```

Service
```php
namespace Log\Service;

use Core\Service\AbstractService;
use Log\Model\Entity\Logger;

class LoggerService extends AbstractService implements LoggerServiceInterface
{
    protected $entity = Logger::class;
}
```

Service Factory
```php
namespace Log\Service;

use Doctrine\ORM\EntityManagerInterface;
use Interop\Container\ContainerInterface;

class LoggerServiceFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $entityManager = $container->has(EntityManagerInterface::class)
            ? $container->get(EntityManagerInterface::class)
            : null;
        return new LoggerService($entityManager);
    }
}
```

Register the dependencies in ConfigProvider the factories 

```php
public function getDependencies()
{
return [
    'factories' => [
        # ...
        Service\LoggerServiceInterface::class => Service\LoggerServiceFactory::class,
        # ...
    ],
];
}
```

## Form

Form provide validation and filter of information before send to database. All of data sended to services are objects preconfigured to protect the services of malicious information. (Action -> Form -> Service)

All fields are created in **init()** method. Filters and validation and configured in **getInputFilterSpecification()** method and the class should implements "Zend\InputFilter\InputFilterProviderInterface". They are retrieved by **Dependency Injection** with **FormElementManager** Decorator installed in **Core** Module.

**Location**: <Namespace>/Form

```php
namespace Log\Form;

use Zend\Filter\StringTrim;
use Zend\Form\Element\Text;
use Zend\Form\Form;
use Zend\InputFilter\InputFilterProviderInterface;
use Zend\Validator;

class LoggerForm extends Form implements InputFilterProviderInterface
{
    public function init()
    {

        $this->add([
            'name' => 'channel',
            'type' => Text::class
        ]);

       # ... other properties
    }

    public function getInputFilterSpecification()
    {
        return [
            'channel'=> [
                'required' => true,
                'filters' => [
                    (new StringTrim()),
                ],
                'validators' => [
                    (new Validator\NotEmpty())
                ]
            ],

            # ... other properties
        ];
    }
}
```

## Action

Actions are middlewares like orders to serve. Create the Action, the factory and register in ConfigProvider. Extend "Core\Action\AbstractRestAction" to create actions.


**Location**: <Namespace>/Action

Action
```php
namespace Log\Action;

use Core\Action\AbstractRestAction;
use Interop\Http\ServerMiddleware\MiddlewareInterface;
use Log\Entity\Logger;

class LoggerRestAction extends AbstractRestAction implements MiddlewareInterface
{
    protected $entity = Logger::class;
}
```

Action Factory
```php
namespace Log\Action;

use Interop\Container\ContainerInterface;
use Log\Service\LoggerServiceInterface;
use Zend\Expressive\Router\RouterInterface;
use Zend\Form\FormInterface;

class LoggerRestFactory
{
    public function __invoke(ContainerInterface $container)
    {
        $router   = $container->get(RouterInterface::class);
        $service = $container->get(LoggerServiceInterface::class);
        $formElementManager = $container->get('FormElementManager'); #retrieve the form 
        $form = $formElementManager->get(LoggerForm::class);

        return new LoggerRestAction($router, $service, $form);
    }
}
```

Register in ConfigProvider
```php
public function getDependencies()
{
return [
    'factories' => [
        Action\LoggerRestAction::class => Action\LoggerRestFactory::class,
        #...
    ],
];
}
```


## Routes

Routes are registered in the **getRoutes()** in the **ConfigProvider** of the module. And register in the global config.

Register in ConfigProvider
```php
public function getRoutes(): array
{
    return [
        [
            'path' => '/api/logger/list[/{page:\d+}]',
            'middleware' => Action\LoggerRestAction::class,
            'name' => 'logger.pagination',
            'allowed_methods' => ['GET']
        ], [
            'path' => '/api/logger[/[{id:\d+}]]',
            'middleware' => Action\LoggerRestAction::class,
            'name' => 'logger.role',
            'allowed_methods' => ['GET', 'POST', 'PUT', 'DELETE']
        ],
    ];
}
```

Register in **config/routes.php**
```php
# Another routes
$app->injectRoutesFromConfig((new Log\ConfigProvider())());
```