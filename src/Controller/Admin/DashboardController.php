<?php

namespace App\Controller\Admin;

use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Category;
use App\Entity\Product;
use App\Entity\User;

class DashboardController extends AbstractDashboardController
{
    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        // Option 1. You can make your dashboard redirect to some common page of your backend
        //
        $adminUrlGenerator = $this->container->get(AdminUrlGenerator::class);
        return $this->redirect($adminUrlGenerator->setController(ProductCrudController::class)->generateUrl());
        // Option 2. You can make your dashboard redirect to different pages depending on the user
        //
        // if ('jane' === $this->getUser()->getUsername()) {
        //     return $this->redirect('...');
        // }

        // Option 3. You can render some custom template to display a proper dashboard with widgets, etc.
        // (tip: it's easier if your template extends from @EasyAdmin/page/content.html.twig)
        //
        // return $this->render('admin/index.html.twig');
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            // the name visible to end users
            ->setTitle('Югрин')
            // you can include HTML contents too (e.g. to link to an image)
            ->setTitle('<img src="..."> Югрин <span class="text-small"></span>')

            // by default EasyAdmin displays a black square as its default favicon;
            // use this method to display a custom favicon: the given path is passed
            // "as is" to the Twig asset() function:
            // <link rel="shortcut icon" href="{{ asset('...') }}">
            ->setFaviconPath('favicon.svg')

            // the domain used by default is 'messages'
            ->setTranslationDomain('my-custom-domain')

            // there's no need to define the "text direction" explicitly because
            // its default value is inferred dynamically from the user locale
            ->setTextDirection('ltr')

            // set this option if you prefer the page content to span the entire
            // browser width, instead of the default design which sets a max width
            ->renderContentMaximized()

            // set this option if you prefer the sidebar (which contains the main menu)
            // to be displayed as a narrow column instead of the default expanded design
            ->renderSidebarMinimized()

            // by default, users can select between a "light" and "dark" mode for the
            // backend interface. Call this method if you prefer to disable the "dark"
            // mode for any reason (e.g. if your interface customizations are not ready for it)

            // by default, all backend URLs are generated as absolute URLs. If you
            // need to generate relative URLs instead, call this method
            ->generateRelativeUrls()

            // set this option if you want to enable locale switching in dashboard.
            // IMPORTANT: this feature won't work unless you add the {_locale}
            // parameter in the admin dashboard URL (e.g. '/admin/{_locale}').
            // the name of each locale will be rendered in that locale
            // (in the following example you'll see: "English", "Polski")
            ->setLocales(['en', 'ru'])
            // to customize the labels of locales, pass a key => value array
            // (e.g. to display flags; although it's not a recommended practice,
            // because many languages/locales are not associated to a single country)
            ->setLocales([
                'en' => '🇬🇧 English',
                'ru' => 'ru Russian'
            ]);
  
    }

    public function configureMenuItems(): iterable
    {     
        return
        [
         MenuItem::subMenu('Категории', 'fa fa-tags')->setSubItems([
            MenuItem::linkToCrud('Все категории', 'fa fa-tags', Category::class),
            MenuItem::linkToCrud('Добавить категорию', 'fa fa-plus', Category::class)
            ->setAction('new'),
            MenuItem::linkToCrud('Удалить категорию', 'fa fa-minus', Category::class)
            ->setAction('delete'),
            MenuItem::linkToCrud('Изменить категорию', 'fa fa-pencil', Category::class)
            ->setAction('edit'),
         ]),
         MenuItem::subMenu('Товары', 'fa fa-shopping-cart')->setSubItems([
            MenuItem::linkToCrud('Все товары', 'fa fa-shopping-cart', Product::class),
            MenuItem::linkToCrud('Добавить товар', 'fa fa-plus', Product::class)
            ->setAction('new'),
            MenuItem::linkToCrud('Удалить товар', 'fa fa-minus', Product::class)
            ->setAction('delete'),
            MenuItem::linkToCrud('Изменить товар', 'fa fa-pencil', Product::class)
            ->setAction('edit'),
         ]),
         MenuItem::subMenu('Пользователи', 'fa fa-user')->setSubItems([
            MenuItem::linkToCrud('Все пользователи', 'fa fa-user', User::class),
            MenuItem::linkToCrud('Добавить пользователя', 'fa fa-plus', User::class)
            ->setAction('new'),
            MenuItem::linkToCrud('Удалить пользователя', 'fa fa-minus', User::class)
            ->setAction('delete'),
            MenuItem::linkToCrud('Изменить пользователя', 'fa fa-pencil', User::class)
            ->setAction('edit'),
         ]),
        ];
    }
}
