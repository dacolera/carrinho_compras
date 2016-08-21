<?

namespace Categorias\Model\Factory;

use Categorias\Model\Categorias as CategoriasModel;
use Interop\Container\ContainerInterface;
use Zend\ServiceManager\FactoryInterface;
use Zend\ServiceManager\ServiceLocatorInterface;

class Categorias implements FactoryInterface
{
     /**
     * Create service
     *
     * @param ServiceLocatorInterface $serviceLocator
     * @return mixed
     */
    public function createService(ServiceLocatorInterface $serviceLocator)
    {
        return new CategoriasModel(
            $serviceLocator->get('Zend\Db\Adapter\Adapter')
        );
    }

    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        // TODO: Implement __invoke() method.
    }
}