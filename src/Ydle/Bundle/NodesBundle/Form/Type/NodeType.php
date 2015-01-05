<?php
/*
  This file is part of Ydle.

    Ydle is free software: you can redistribute it and/or modify
    it under the terms of the GNU  Lesser General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    Ydle is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU  Lesser General Public License for more details.

    You should have received a copy of the GNU Lesser General Public License
    along with Ydle.  If not, see <http://www.gnu.org/licenses/>.
 */
namespace Ydle\Bundle\NodesBundle\Form\Type;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Doctrine\ORM\EntityRepository;

class NodeType extends AbstractType
{    
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder                                                   
                ->add('name', 'text', array('required' => true))
                ->add('code', 'integer', array('required' => true))
                ->add('description', 'textarea', array('required' => false))
                ->add('room', 'entity', array(
                    'class' => 'YdleRoomBundle:Room',
                    'property' => 'name',
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('t')
                                ->where('t.isActive = 1')
                                ->orderBy('t.name', 'ASC');
                    },
                ))
                ->add('types', 'entity', array(
                    'class' => 'YdleNodesBundle:NodeType',
                    'property' => 'name',
                    'multiple' => true,
                    'query_builder' => function(EntityRepository $er) {
                        return $er->createQueryBuilder('t')
                                ->where('t.isActive = 1')
                                ->orderBy('t.name', 'ASC');
                    },
                ))
                ->add('is_active', 'checkbox', array('label' => 'Actif ?', 'required' => false))
        ;
    }

    public function getName()
    {
        return 'node_form';
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Ydle\Bundle\NodesBundle\Entity\Node',
        ));
    }
}
?>
