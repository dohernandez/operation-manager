# How to create a CRUD for entity.

#### 1. Create the entity:

```bash
$ sf3 doctrine:generate:entity
```

The command will generate the code ...
* Generating entity class
* Generating repository class
* Generating mapping file

inside your `Bundle`.


#### 2. Edit the entity file.

Delete all the code relate to the id field and extend from the abstract class `Entity`

```php
/**
 * Market
 */
class Market extends Entity
...
    /**
     * @var string
     */
    private $symbol;
    
```

**Note**: Its'n impressible to removed the code related to the id field, but as this functionality is extended from the parent class, it nos required.

#### 3. Edit the entity repository file.

Extend from `CRUDRepository` class instead of `\Doctrine\ORM\EntityRepository` class.

**Note**: The class `CRUDRepository` extends from `\Doctrine\ORM\EntityRepository`.

#### 3. Run migration.

```bash
$ sf3 doctrine:schema:update --force
```

#### 4. Created CRUD from entity.

Run the command with the option write.

```bash
$ sf3 doctrine:generate:crud

...
Do you want to generate the "write" actions [no]? yes
```

The command will generate the code
* Generating the CRUD code
* Generating the Form code
* Updating the routing. In case this fails, you will be asked to do it manualy.

#### 5. Edit the entity controller.

You can take as an example any of the other CRUD controllers, but basically you will need to extend the Controller from `CRUDController` class, use the the `EntityController` trait, and update the actions.

```php

use Symfony\Component\Form\Form;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class ActionTypeController extends CRUDController
{
    use EntityController;

    /**
     * @var string
     */
    protected $entityClass = 'ActionType';
    
    ...
    
    public function indexAction(): Response
    {
        return $this->index(['symbol'], [
            'new_url' => $this->generateUrl('actiontypes_new'),
            'edit_route' => 'actiontypes_edit',
            'delete_route' => 'actiontypes_delete',
        ]);
    }
    
    public function newAction(Request $request): Response
    {
        return $this->edit($request, new ActionType(), [
            'page_title' => 'Manager action type',
            'page_subtitle' => 'create',
            'box_type' => 'success',
            'submit_type' => 'Create',
            'cancel_url' => $this->generateUrl('actiontypes_index'),
        ]);
    }
    
    public function editAction(Request $request, ActionType $actionType): Response
    {
        return $this->edit($request, $actionType, [
            'page_title' => 'Manager action type',
            'page_subtitle' => 'edit',
            'box_type' => 'primary',
            'submit_type' => 'Edit',
            'cancel_url' => $this->generateUrl('actiontypes_index'),
        ]);
    }
    
    public function deleteAction(Request $request, ActionType $actionType)
    {
        return $this->delete($request, $actionType);
    }
    
    protected function createDeleteForm($actionType): Form
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('actiontypes_delete', array('id' => $actionType->getId())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
```

**Note**: We have to remove the param type from the function `createDeleteForm` due PHP don,t allow to type from different class.

#### 6. Double check the Form type.

In the Form type class there is not much to do, in fact it can be leaved at it is, but we always like to type the field we add to the FormBuilder, so ...

```php

use Symfony\Component\Form\Extension\Core\Type\TextType;


class MarketType extends AbstractType
{
...

    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('symbol', TextType::class);
    }
 ...

```

Now that we have Entity, Repository, Controller and Form ready, we need to make it visible in the menu. 

#### 7. Add entity CRUD to the menu.

Add to the class `SetupKnpMenuListener` located in `/AppBundle/EventListener/SetupKnpMenuListener.php` the new item.

```php

class SetupKnpMenuListener
{
    public function onSetupMenu(KnpMenuEvent $event)
    {
    ...
    // Manager
    $managerItem = $menu->getChild('ManagerMenuItem');
    $this->addChildToParent($managerItem, [
        'menu_item' => 'MarketMenuItem',
        'label' => 'Markets',
        'route' => 'markets_index',
        'child_options' => $event->getChildOptions(),
        'icon' => 'fa fa-industry',
    ]);
```

Update the routing.yml for the entity removing the route not needed such show and add the `avanzu_admin_route` to the route link in the menu.

```yml
markets_index:
    path:     /
    defaults: { _controller: "ManagerBundle:Market:index" }
    methods:  GET
    options:
        avanzu_admin_route: markets
```

#### 8. Clear cache.
    
 ```bash
$ sf3 cache:clear
```


#### 9.Refresh the browser

Enjoy the new entity CRUD view!!!



