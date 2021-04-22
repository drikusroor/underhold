<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use Doctrine\ORM\EntityManager;
use App\Http\Controllers\Web\WebController;
use App\Entities\Supplier;
use App\Entities\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends WebController
{

    /**
     * @var EntityManager
     */
    public $em;

    /**
     *  @param EntityManager $entityManager
     */
    public function __construct(
        EntityManager $entityManager
    ) {
        $this->em = $entityManager;
    }

    private $supplierData = array(
        "title" => "Aanmelden als aannemer",
        "form" => array(
            "name" => array(
                "label" => "Bedrijfsnaam"
            )
        )
    );

    private $clientData = array(
        "title" => "Aanmelden",
        "form" => array(
            "name" => array(
                "label" => "Naam"
            )
        )
    );

    private function getTemplateData(Request $request)
    {
        if ($request->is('*signup/supplier*')) {
            return $this->supplierData;
        } else {
            return $this->clientData;
        }
    }

    /**
     * Returns all supppliers.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $data = $this->getTemplateData($request);

        return view('signup', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $body = $request->all();

        $supplierRepository = $this->em->getRepository('App\\Entities\\Supplier');
        $supplierExists = $supplierRepository->findOneBy(array('code' => $body['name']));

        if (!is_null($supplierExists)) {
            abort(400, 'Supplier already exists.');
        }

        $userRepository = $this->em->getRepository('App\\Entities\\User');
        $userExists = $userRepository->findOneBy(array('email' => $body['email']));

        if (!is_null($userExists)) {
            abort(400, 'User already exists.');
        }

        $supplier = new Supplier($body['name'], $body['name']);
        $this->em->persist($supplier);
        $this->em->flush();

        $hash = Hash::make($body['password']);
        $user = new User($body['name'], $body['email'], $hash);
        $user->setSupplier($supplier);

        $this->em->persist($user);
        $this->em->flush();

        $data = array("name" => $body['name'], "title" => "Aanmelding succesvol!");

        return view('signup-complete', $data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
