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
        ->add('name', null, array('label' => 'Votre nom de famille'))
        ->add('firstname', null, array('label' => 'Votre prénom'))
        ->add('birthdate', BirthdayType::class, array('label' => 'Votre date de naissance', 'widget' => 'single_text', 'attr' => ['class' => 'js-datepicker']))
        ->add('country', CountryType::class, array('label' => 'Votre pays'))
        ->add('ticketprice', ChoiceType::class, array('label' => 'Billet journée ou demie-journée',
            'choices'  => array(
                'Journée' => true,
                'Demie-Journée (à partir de 14h)' => false,)
            ))
        ->add('reducedprice', null, array('label' => 'Tarif réduit (pour x, x, et x)'));
    }

    public function configureOptions(OptionsResolver $resolver)
{
    $resolver->setDefaults(array(
        'data_class' => Ticket::class,
    ));
}
}