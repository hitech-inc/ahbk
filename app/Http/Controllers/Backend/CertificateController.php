<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateCertificateRequest;
use App\Http\Requests\Backend\UpdateCertificateRequest;
use App\Repositories\Backend\CertificateRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class CertificateController extends AppBaseController
{
    /** @var  CertificateRepository */
    private $certificateRepository;

    public function __construct(CertificateRepository $certificateRepo)
    {
        $this->certificateRepository = $certificateRepo;
    }

    /**
     * Display a listing of the Certificate.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->certificateRepository->pushCriteria(new RequestCriteria($request));
        $certificates = $this->certificateRepository->all();

        return view('backend.certificates.index')
            ->with('certificates', $certificates);
    }

    /**
     * Show the form for creating a new Certificate.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.certificates.create');
    }

    /**
     * Store a newly created Certificate in storage.
     *
     * @param CreateCertificateRequest $request
     *
     * @return Response
     */
    public function store(CreateCertificateRequest $request)
    {
        $input = $request->all();

        $certificate = $this->certificateRepository->create($input);

        Flash::success('Certificate saved successfully.');

        return redirect(route('backend.certificates.index'));
    }

    /**
     * Display the specified Certificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            Flash::error('Certificate not found');

            return redirect(route('backend.certificates.index'));
        }

        return view('backend.certificates.show')->with('certificate', $certificate);
    }

    /**
     * Show the form for editing the specified Certificate.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            Flash::error('Certificate not found');

            return redirect(route('backend.certificates.index'));
        }

        return view('backend.certificates.edit')->with('certificate', $certificate);
    }

    /**
     * Update the specified Certificate in storage.
     *
     * @param  int              $id
     * @param UpdateCertificateRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCertificateRequest $request)
    {
        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            Flash::error('Certificate not found');

            return redirect(route('backend.certificates.index'));
        }

        $certificate = $this->certificateRepository->update($request->all(), $id);

        Flash::success('Certificate updated successfully.');

        return redirect(route('backend.certificates.index'));
    }

    /**
     * Remove the specified Certificate from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $certificate = $this->certificateRepository->findWithoutFail($id);

        if (empty($certificate)) {
            Flash::error('Certificate not found');

            return redirect(route('backend.certificates.index'));
        }

        $this->certificateRepository->delete($id);

        Flash::success('Certificate deleted successfully.');

        return redirect(route('backend.certificates.index'));
    }
}
