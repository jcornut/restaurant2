<?php

namespace RestaurantBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use RestaurantBundle\Entity\Restaurant;
use RestaurantBundle\Form\RestaurantType;
use Symfony\Component\HttpFoundation\Request;

class RestaurantController extends Controller
{
    public function indexAction()
    {
        $restaurants = $this->getRepoRestaurant()->findAll();

        return $this->render('RestaurantBundle:Partials:restaurants.html.twig',
        array('restaurants' => $restaurants));
    }

    public function viewAction(Int $id)
    {
        $restaurant = $this->getRepoRestaurant()->findOneById($id);
        return $this->render('RestaurantBundle:Partials:restaurant.html.twig',
        array('restaurant' => $restaurant));
    }

    public function AddAction(Request $request)
    {
        $restaurant = new Restaurant();
        $form = $this->get('form.factory')->create(RestaurantType::class, $restaurant);

        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($restaurant);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Restaurant bien enregistrée.');

          return $this->redirectToRoute('restaurant_get', array('id' => $restaurant->getId()));
        }

        return $this->render('RestaurantBundle:Form:restaurantForm.html.twig', array(
          'form' => $form->createView(),
        ));
    }

    public function EditAction(Int $id, Request $request)
    {
        $restaurant = $this->getRepoRestaurant()->findOneById($id);
        $form = $this->get('form.factory')->create(RestaurantType::class, $restaurant);


        if ($request->isMethod('POST') && $form->handleRequest($request)->isValid()) {
          $em = $this->getDoctrine()->getManager();
          $em->persist($restaurant);
          $em->flush();

          $request->getSession()->getFlashBag()->add('notice', 'Restaurant bien modifié.');

          return $this->redirectToRoute('restaurant_get', array('id' => $restaurant->getId()));
        }

        return $this->render('RestaurantBundle:Form:restaurantForm.html.twig', array(
          'form' => $form->createView(),
        ));
    }

    public function DeleteAction(Int $id, Request $request)
    {
        $restaurant = $this->getRepoRestaurant()->findOneById($id);
        $em = $this->getDoctrine()->getManager();
        $em->remove($restaurant);
        $em->flush();
        $request->getSession()->getFlashBag()->add('notice', 'Restaurant bien supprimé.');
        return $this->redirectToRoute('restaurant_getAll');
    }

    public function getRepoRestaurant()
    {
        return $this->getDoctrine()->getRepository('RestaurantBundle:Restaurant');
    }
}
