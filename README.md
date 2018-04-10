# Symfony entity filter bundle

#### Step 1: add repository in the your composer file
```json

{
"repositories": [
        {
            "type": "vcs",
            "url":  "git@github.com:armd-pro/symfony-entity-filter-bundle.git"
        }
    ]
}

```

#### Step 2: install package
```bash
composer require armd-pro/symfony-entity-filter-bundle:dev-master
```

#### Step 3: register bundle
```php
class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = [
            // ...
            new pro\armd\EntityBundle\UserFilterBundle(),
        ];

        return $bundles;
    }

    // ...
}
```

#### Step 4: Create MySQL view
```sql
CREATE VIEW view_users AS (

    SELECT u.*,
        (SELECT value FROM users_about WHERE user = u.id AND item = 1) AS country,
        (SELECT value FROM users_about WHERE user = u.id AND item = 2) AS first_name,
        (SELECT value FROM users_about WHERE user = u.id AND item = 3) AS state
      FROM users AS u

);
```

#### Step 5: Example
```php
namespace AppBundle\ExampleController;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\JsonResponse;

use pro\armd\EntityBundle\Entity\ViewUser;


class ExampleController extends Controller
{
    /**
     * @Route("/user-filter", name="user-filter")
     * @return JsonResponse
     */
    public function userFilterAction()
    {
        $em = $this->get('doctrine')->getManager();
        $userRepo = $em->getRepository('UserFilterBundle:ViewUser');


        /** @var QueryBuilder $qb */
        $qb = $userRepo->createQueryBuilder('u');
        $expr = $qb->expr();


        /**
         *
         * (
         *    (
         *       ( (Страна != Россия) ИЛИ (Состояние пользователя = active) ) 
         *       И (E-Mail = user@domain.com)
         *    ) 
         *    ИЛИ (Имя != "")
         * )
         *
         */

        $qb->where(

            $expr->andX(

                $expr->orX(
                    $expr->neq('u.country', ':country'),
                    $expr->eq('u.state', ':state')
                ),

                $expr->andX(
                    $expr->eq('u.email', ':email')
                )

            ),

            $expr->orX(
                $expr->neq('u.firstName', ':name')
            )
        );

        $qb->setParameters([
            'country' => 'Россия',
            'state'   => 'active',
            'email'   => 'user1@gmail.com',
            'name'    => ''
        ]);

        $users = $qb->getQuery()->getResult();

        return JsonResponse::create(array_map(function(ViewUser $user){
            return $user->getEmail();
        }, $users));
    }
}
```
