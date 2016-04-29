<?php
namespace AppBundle\Admin;

use AppBundle\Entity\BlogPost;
use Sonata\AdminBundle\Admin\Admin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;

class BlogPostAdmin extends Admin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Post')
                ->with('Content', ['class' => 'col-md-9'])
                    ->add('title', 'text')
                    ->add('body', 'textarea')
                ->end()
                ->with('Meta data', ['class' => 'col-md-3'])
                    ->add('category', 'sonata_type_model', [
                        'class' => 'AppBundle\Entity\Category',
                        'property' => 'name',
                    ])
                ->end()
            ->end()
            ->tab('Publish Options')
                // +
            ->end();
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper->addIdentifier('title');
    }

    public function toString($object)
    {
        return $object instanceof BlogPost
            ? $object->getTitle()
            : 'Blog Post'; // shown in the breadcrumb on the create view
    }
}