<?php

namespace App\Http\Controllers\Backend;

use App\Http\Requests\Backend\CreateGalleryRequest;
use App\Http\Requests\Backend\UpdateGalleryRequest;
use App\Repositories\Backend\GalleryRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

class GalleryController extends AppBaseController
{
    /** @var  GalleryRepository */
    private $galleryRepository;

    public function __construct(GalleryRepository $galleryRepo)
    {
        $this->galleryRepository = $galleryRepo;
    }

    /**
     * Display a listing of the Gallery.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->galleryRepository->pushCriteria(new RequestCriteria($request));
        $galleries = $this->galleryRepository->all();

        return view('backend.galleries.index')
            ->with('galleries', $galleries);
    }

    /**
     * Show the form for creating a new Gallery.
     *
     * @return Response
     */
    public function create()
    {
        return view('backend.galleries.create');
    }

    /**
     * Store a newly created Gallery in storage.
     *
     * @param CreateGalleryRequest $request
     *
     * @return Response
     */
    public function store(CreateGalleryRequest $request)
    {
        $input = $request->all();

        $gallery = $this->galleryRepository->create($input);

        Flash::success('Gallery saved successfully.');

        return redirect(route('backend.galleries.index'));
    }

    /**
     * Display the specified Gallery.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $gallery = $this->galleryRepository->findWithoutFail($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('backend.galleries.index'));
        }

        return view('backend.galleries.show')->with('gallery', $gallery);
    }

    /**
     * Show the form for editing the specified Gallery.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $gallery = $this->galleryRepository->findWithoutFail($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('backend.galleries.index'));
        }

        return view('backend.galleries.edit')->with('gallery', $gallery);
    }

    /**
     * Update the specified Gallery in storage.
     *
     * @param  int              $id
     * @param UpdateGalleryRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGalleryRequest $request)
    {
        $gallery = $this->galleryRepository->findWithoutFail($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('backend.galleries.index'));
        }

        $gallery = $this->galleryRepository->update($request->all(), $id);

        Flash::success('Gallery updated successfully.');

        return redirect(route('backend.galleries.index'));
    }

    /**
     * Remove the specified Gallery from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $gallery = $this->galleryRepository->findWithoutFail($id);

        if (empty($gallery)) {
            Flash::error('Gallery not found');

            return redirect(route('backend.galleries.index'));
        }

        $this->galleryRepository->delete($id);

        Flash::success('Gallery deleted successfully.');

        return redirect(route('backend.galleries.index'));
    }
}
