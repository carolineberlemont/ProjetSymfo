<?php
namespace App\Form;

use App\Entity\Ticket;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\BirthdayType;
use Symfony\Component\Form\Extension\Core\Type\CountryType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;


class TicketType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('name')
        ->add('firstname')
        ->add('birthdate', BirthdayType::class)
        ->add('country', CountryType::class)
        ->add('ticketprice', ChoiceType::class, array(
            'choices'  => array(
                'Journée' => true,
                'Demie-Journée (à partir de 14h)' => false,)
            ))
        ->add('reducedprice');
    }

    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => Ticket::class,
    ));
}
}