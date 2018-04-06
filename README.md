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

#### Step 3: kernel register bundles
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

#### Step 4: Create mysql view
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
use pro\armd\EntityBundle\EntityFilterAnd;
use pro\armd\EntityBundle\EntityFilterOr;


class ExampleController extends Controller
{
    /**
     * @Route("/user-filter", name="user-filter")
     * @return JsonResponse
     */
    public function userFilterAction()
    {
        $em = $this->get('doctrine')->getManager();
        $userAboutRepo = $em->getRepository('UserFilterBundle:ViewUser');

        // IF country = 'Россия' OR state != 'active'
        $users = $userAboutRepo->search(
            new EntityFilterAnd('country', 'Россия'),
            new EntityFilterOr('state', 'active', false)
        );

        return JsonResponse::create(array_map(function(ViewUser $user){
            return $user->getEmail();
        }, $users));
    }
}
```
