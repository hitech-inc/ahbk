<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateTechnicalEquipmentRequest;
use App\Http\Requests\UpdateTechnicalEquipmentRequest;
use App\Repositories\TechnicalEquipmentRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class TechnicalEquipmentController extends AppBaseController
{
    /** @var  TechnicalEquipmentRepository */
    private $technicalEquipmentRepository;

    public function __construct(TechnicalEquipmentRepository $technicalEquipmentRepo)
    {
        $this->technicalEquipmentRepository = $technicalEquipmentRepo;
    }

    /**
     * Display a listing of the TechnicalEquipment.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->technicalEquipmentRepository->pushCriteria(new RequestCriteria($request));
        $technicalEquipments = $this->technicalEquipmentRepository->all();

        return view('backend.technical_equipments.index')
            ->with('technicalEquipments', $technicalEquipments);
    }

    /**
     * Show the form for creating a new TechnicalEquipment.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.technical_equipments.create');
    }

    /**
     * Store a newly created TechnicalEquipment in storage.
     *
     * @param CreateTechnicalEquipmentRequest $request
     *
     * @return Response
     */
    public function store(CreateTechnicalEquipmentRequest $request)
    {
        $input = $request->all();

        $technicalEquipment = $this->technicalEquipmentRepository->create($input);

        Flash::success('Technical Equipment saved successfully.');

        return redirect(route('technicalEquipments.index'));
    }

    /**
     * Display the specified TechnicalEquipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $technicalEquipment = $this->technicalEquipmentRepository->findWithoutFail($id);

        if (empty($technicalEquipment)) {
            Flash::error('Technical Equipment not found');

            return redirect(route('technicalEquipments.index'));
        }

        return view('backend.technical_equipments.show')->with('technicalEquipment', $technicalEquipment);
    }

    /**
     * Show the form for editing the specified TechnicalEquipment.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $technicalEquipment = $this->technicalEquipmentRepository->findWithoutFail($id);

        if (empty($technicalEquipment)) {
            Flash::error('Technical Equipment not found');

            return redirect(route('technicalEquipments.index'));
        }

        return view('backend.technical_equipments.edit')->with('technicalEquipment', $technicalEquipment);
    }

    /**
     * Update the specified TechnicalEquipment in storage.
     *
     * @param  int              $id
     * @param UpdateTechnicalEquipmentRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTechnicalEquipmentRequest $request)
    {
        $technicalEquipment = $this->technicalEquipmentRepository->findWithoutFail($id);

        if (empty($technicalEquipment)) {
            Flash::error('Technical Equipment not found');

            return redirect(route('technicalEquipments.index'));
        }

        $technicalEquipment = $this->technicalEquipmentRepository->update($request->all(), $id);

        Flash::success('Technical Equipment updated successfully.');

        return redirect(route('technicalEquipments.index'));
    }

    /**
     * Remove the specified TechnicalEquipment from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $technicalEquipment = $this->technicalEquipmentRepository->findWithoutFail($id);

        if (empty($technicalEquipment)) {
            Flash::error('Technical Equipment not found');

            return redirect(route('technicalEquipments.index'));
        }

        $this->technicalEquipmentRepository->delete($id);

        Flash::success('Technical Equipment deleted successfully.');

        return redirect(route('technicalEquipments.index'));
    }
}
