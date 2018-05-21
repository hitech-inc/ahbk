<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateBackgroundRequest;
use App\Http\Requests\Backend\UpdateBackgroundRequest;
use App\Repositories\Backend\BackgroundRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class BackgroundController extends AppBaseController
{
    /** @var  BackgroundRepository */
    private $backgroundRepository;

    public function __construct(BackgroundRepository $backgroundRepo)
    {
        $this->backgroundRepository = $backgroundRepo;
    }

    /**
     * Display a listing of the Background.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->backgroundRepository->pushCriteria(new RequestCriteria($request));
        $backgrounds = $this->backgroundRepository->all();

        return view('backend.backgrounds.index')
            ->with('backgrounds', $backgrounds);
    }

    /**
     * Show the form for creating a new Background.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.backgrounds.create');
    }

    /**
     * Store a newly created Background in storage.
     *
     * @param CreateBackgroundRequest $request
     *
     * @return Response
     */
    public function store(CreateBackgroundRequest $request)
    {
        $input = $request->all();

        $background = $this->backgroundRepository->create($input);

        Flash::success('Background saved successfully.');

        return redirect(route('backend.backgrounds.index'));
    }

    /**
     * Display the specified Background.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backend.backgrounds.index'));
        }

        return view('backend.backgrounds.show')->with('background', $background);
    }

    /**
     * Show the form for editing the specified Background.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backend.backgrounds.index'));
        }

        return view('backend.backgrounds.edit')->with('background', $background);
    }

    /**
     * Update the specified Background in storage.
     *
     * @param  int              $id
     * @param UpdateBackgroundRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateBackgroundRequest $request)
    {
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backend.backgrounds.index'));
        }

        $background = $this->backgroundRepository->update($request->all(), $id);

        Flash::success('Background updated successfully.');

        return redirect(route('backend.backgrounds.index'));
    }

    /**
     * Remove the specified Background from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $background = $this->backgroundRepository->findWithoutFail($id);

        if (empty($background)) {
            Flash::error('Background not found');

            return redirect(route('backend.backgrounds.index'));
        }

        $this->backgroundRepository->delete($id);

        Flash::success('Background deleted successfully.');

        return redirect(route('backend.backgrounds.index'));
    }
}
